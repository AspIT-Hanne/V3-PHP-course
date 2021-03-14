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

?>