<?php
	function getVariable($v, $def) 
    {
        $var = $def;
        if (isset($_POST[$v]))
            $var = $_POST[$v];
        else if (isset($_GET[$v]))
            $var = $_GET[$v];
        return $var;
    }

    function cmpName($f1, $f2)
    {
    	return strcmp($f1['name'], $f2['name']);
    }

    function cmpSize($f1, $f2)
    {
    	if($f1['size'] > $f2['size'])
    		return 1;
    	else if($f1['size'] < $f2['size'])
    		return -1;
    	return 0;
    }

    function cmpDate($f1, $f2)
    {
    	if($f1['date'] > $f2['date'])
    		return 1;
    	else if($f1['date'] < $f2['date'])
    		return -1;
    	return 0;
    }
?>