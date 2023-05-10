<?php 
    // Generic class to connect to DB and provide CRUD functionality
    
    class DbOperations
    {
        private $host = "localhost";
        private $user = "root";
        private $pword = "";
        private $db = "plantebasen";
        
        public $connection;

        // Create database connection in the constructor. To create a new DbOperations object you first have to construct the connection to the database
        public function __construct()
        {
            // @new is used to suppress default error messages
            $this->connection = @new MySQLi($this->host, $this->user, $this->pword, $this->db);

            // If database connection fails
            if($this->connection->connect_error) 
            {   
                // Kill current script and add error-message
                die("Connection to database failed: ". $this->connection->connect_error);
            }
            else
            {
                return $this->connection;
            }
        }

        // Method to retrieve all data from one table
        public function getAllData($table)
        {
            return $this->getData($table);
        }

        // Method to retrieve one post from one table based on the post ID
        public function getDataByID($table, $ID)
        {
            if ($this->tableExists($table))
            {
                // Create WHERE-statement by retrieving the ID-field of this table and putting it into a string with the ID that has been passed to the function - eg (WHERE) PID = '13'
                $sqlWhere = $this->getTableID($table) . " = '" . $ID . "'";

                // Call function to retrieve data from table with the where-statement that only retrieves data with the requested ID
                $dataResult = $this->getData($table, "*", null, $sqlWhere);

                // getData-method returns multidimensional associative array, but caller only expects one result, so return only one dimension of the array by returning only the data on the first line
                return $dataResult[0];
            }
        }

        public function getSortedData($table, $sortBy)
        {
            if ($this->tableExists($table))
            {
                // Call function to retrieve data from table with the "ORDER BY" statement that sorts the data by the desired field
                $dataResult = $this->getData($table, "*", null, null, $sortBy);

                // getData-method returns multidimensional associative array, but caller only expects one result, so return only one dimension of the array by returning only the data on the first line
                return $dataResult[0];
            }
        }

        // Method to create new post/insert data into MySQL table. $data=array() argument creates an empty array as default value if no array argument is passed to the method
        public function insertData($table, $data=array())
        {
            // Check if table exists in database
            if ($this->tableExists($table))
            {
                // Create INSERT statement by extracting the array-indexes and use them as fields and array-values and use them as values. This requires that the HTML form-fields have the same names as the MySQL table-fields
                $fields = implode(',',array_keys($data));
                // Values have to be in quotations marks. Add quotation mark in beginning and end and use '.' as splitter so all values will be in quotation marks. Example: 'name'.'type'.'height' etc.
                $values = "'" . implode("','",$data) . "'";
                
                // Gather variables from above in the INSERT statement
                $sqlInsert = "INSERT INTO {$table} ({$fields}) VALUE ({$values})";

                // If insert succeeds return true else return false
                if($this->connection->query($sqlInsert))
                {
                    return true;
                }
                else
                {
                    return false;
                }
            }
            else
            {
                return false;
            }
        }

        // Method to update already values of already existing posts in table (see line 52 for explanation on $data=array())
        public function updateData($table, $ID, $data=array())
        {
            // Check if table exists in database
            if($this->tableExists($table))
            {
                // Create array $newValues so it can be used in the foreach loop
                $newValues = array();

                // Create WHERE statement (see line 41 for explanation)
                $sqlWhere = $this->getTableID($table) . " = '" . $ID . "'";
    
                // Run through $_POST data to set them up in the right format - eg. name = "Rose" and placed in an array with each set of key and value on their own index in the array - eg. $newValues[0] => name = "Rose"
                foreach($data as $key=>$value)
                {
                    $newValues[] = $key . ' = "' .$value . '"';
                }

                // Convert array to string, separating each value with comma (,) - eg. name = "Rose", type = "Flower" etc.
                $newValueString = implode(',' ,$newValues);

                // Create UPDATE statement with $_POST data and current ID
                $sqlUpdate = "UPDATE {$table} SET {$newValueString} WHERE {$sqlWhere}";
                
                // Run SQL-query. If it succeds return true otherwise print error-message and return false
                if($this->connection->query($sqlUpdate))
                {
                    return true;
                }
                else
                {
                    echo $this->connection->error;
                    return false;
                }
            }
            else
            {
                // If table does not exist
                return false;
            }
        }

        // Method to delete current post from table 
        public function deleteData($table, $ID)
        {
            // Check if table exists in database
            if($this->tableExists($table))
            {
                // Create WHERE statement (see line 41 for explanation)
                $sqlWhere = $this->getTableID($table) . " = '" . $ID . "'";

                // Create DELETE statement
                $sqlDelete = "DELETE FROM {$table} WHERE {$sqlWhere}";
                
                // Run SQL-query. If it succeds return true otherwise print error-message and return false
                if($this->connection->query($sqlDelete))
                {
                    return true;
                }
                else
                {
                    echo $this->connection->error;
                    return false;
                }
            }
            else
            {
                // If table does not exist
                return false;
            }
        }

        // Method to retrieve newest/highest ID in table. Used to display newest post in table when creating new posts
        public function getNewestID($table)
        {
            // Check if table exists in database
            if ($this->tableExists($table))
            {
                // Get the name of the column that contains IDs in this table
                $tableID = $this->getTableID($table);

                // Get data and order them descending by ID
                $allData = $this->getData($table, "*", null, null, "{$tableID} DESC");

                // Because they are ordered descending by ID the newest post is the first post in the returned dataset and the ID fieldname was retrieved earlier
                return $allData[0][$tableID];
            }
        }

        // Generic private function to retrieve data from table. Can only be called from within the class and not from other php-pages
        private function getData($table, $rows = '*', $join = null, $where = null, $order = null, $limit = null)
        {
            $selectQuery = "";
            // Check if table exists in database
            if ($this->tableExists($table))
            {
                // Create base SQL SELECT statement
                $selectQuery = "SELECT {$rows} FROM {$table}";

                // If JOIN is provided add it to SQL statement
                if ($join != null)
                {
                    $selectQuery .= " JOIN {$join}";
                }

                // If WHERE is provided add it to SQL statement
                if ($where != null)
                {
                    $selectQuery .= " WHERE {$where}";
                }

                // If ORDER is provided add it to SQL statement
                if ($order != null)
                {
                    $selectQuery .= " ORDER BY {$order}";
                }

                // If LIMIT is provided add it to SQL statement
                if ($limit != null)
                {
                    $selectQuery .= " LIMIT {$limit}";
                }

                // Fetch data from table based on SQL statement
                $result = $this->connection->query($selectQuery);

                // If SQL statement provided an error print the error
                if ($this->connection->error)
                {
                    echo $this->connection->error;
                }
                else
                {
                    // If SQL statement returned data
                    if ($result->num_rows > 0)
                    {
                        // Take each post from database and transfer to associative array $row for as long as there are database posts
                        while($row = $result->fetch_assoc())
                        {
                            // Transfer the row array to multidimensional associative array $dataResult
                            // First product will be on $dataResult[0], second product on $dataResult[1]
                            $dataResult[] = $row;
                        }
                        
                        return $dataResult;
                    }
                    else
                    {
                        // Kill current script and add error-message
                        die("No data was found");
                    }
                }
            }
            else
            {
                // Kill current script and add error-message
                die("Table does not exist in database");
            }
            
        }

        private function getTableID($table)
        {
            // Get all fields/columns from table to find out what the name of the ID-field is (always the first field in a table)
            $result = $this->connection->query("SHOW COLUMNS FROM {$table}");

            // Get the first row of retrieved columns and put it in associative array. This array will contain all information about this first field: name of field, datatype, autoincrement etc. Print_r this array and compare to table-view from phpmyadmin
            $dbFields = $result->fetch_row();

            // Create SQL WHERE statement: (WHERE) ID FIELDNAME = $ID (argument passed to method)
            return $dbFields[0];
        }

        // Return true if table exists in database and false if it doesn't
        private function tableExists($table)
        {
            // Get all table names from database
            $result = $this->connection->query("SHOW TABLES");

            // Put retrieved table names in associative array with table names on index 0
            $dbTables = $result->fetch_all();

            // If the requested table exists in column 0 of the associative array of tables
            if(in_array($table, array_column($dbTables, 0)))
            {
                return true;
            }
            else
            {
                return false;
            }
        }

    }
?>