<?php

    $db = new MySQLi("localhost", "halu", "1234", "starupuif");

    if($db->connect_error)
    {
        echo $db->connect_error;
    }
    else
    {
        $result = $db->query("SELECT * FROM events");

        if($db->error)
        {
            echo $result->error;
        }
        else
        {
            while($rows = $result->fetch_assoc())
            {
                $eventrows[] = $rows;
            }
        }
    }
?>