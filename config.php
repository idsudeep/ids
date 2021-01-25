
<?php

function multiple_insert($table, $fields = array(), $values = array(), $appendix = false, $ret = false) {

$query = 'INSERT INTO';
$query .= ' `' . $this->escape($table) . "`";

if (is_array($fields)) {
    $query .= ' (';
    $num = 0;
    foreach ($fields as $key => $value) {
        $query .= ' `' . $value . '`';
        $num++;
        if ($num != count($fields)) {
            $query .= ',';
        }
    }
    $query .= ' ) VALUES ';

    foreach ($values as $key => $value) {
        $query .= '(';
        foreach ($value as $key => $value) {
            $query .= "'" . $value . "'" . ',';
        }
        $query = rtrim($query, ',');
        $query .= '),';
    }

    $query = rtrim($query, ',');

    if ($appendix) {
        $query .= ' ' . $appendix;
    }
    if ($ret) {
        return $query;
    }

    $this->sql    = $query;
    $this->result = mysqli_query($this->mysqli, $query);
    if (mysqli_error($this->mysqli) != '') {
        $this->_error(mysqli_error($this->mysqli));
        $this->result = null;
        return false;
    } else {
        return $this;
    }

}
}

function catch_query_error ($query , $self ="something mixed ")
{
	if($result = mysqli_query($query)){ return $result;
	 print_r($result);
	
	}

	
	else{ throw new Expection($self);}
}



/* mysql://bf05ca120624fb:181ac24a@us-cdbr-east-02.cleardb.com/heroku_4e956cc525a6de9?reconnect=true */
$servername ="localhost";
$username ="root";
$password="";
$dbconnect="update_data";


// create a connection with database 

$connect = mysqli_connect($servername,$username,$password,$dbconnect) or die();


// check connection with database

if (!$connect)
{
	die("connection failed:".mysqli_connect_error());
}


?>
