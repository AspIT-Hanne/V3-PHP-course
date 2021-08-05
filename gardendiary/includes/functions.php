<?php
    function newLine_blanks($string)
    {

        $string = ucwords($string);

        if(strpos($string, " "))
        {
            return str_replace(" ", "<br>", $string);
        }
        else
        {
            return $string;
        }
    }

    function setValue($field)
    {
        if(empty($_POST[$field]))
        {
            return "NULL";
        }
        else
        {
            return $_POST[$field];
        }
    }

?>