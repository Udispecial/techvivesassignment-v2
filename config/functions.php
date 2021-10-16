<?php

require_once("db_credentials.php");


function OpenCon()
{
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME) or die("Connect failed: %s\n" . $conn->error);

    return $conn;
}

function CloseCon($conn)
{
    $conn->close();
}

function xss($data)
{
    return htmlspecialchars($data);
}

function insertData($data, $table)
{
    global $db;

    $columns = " (" . implode(", ", array_keys($data)) . ")";

    $values = "(";

    // $sql = INSERT INTO Customers (CustomerName, ContactName, Address, City, PostalCode, Country)
    // VALUES ('Cardinal', 'Tom B. Erichsen', 'Skagen 21', 'Stavanger', '4006', 'Norway');
    foreach ($data as $key => $value) {
        $values .= "'" . xss($value) . "', ";
    }

    $values = rtrim($values, ", ");

    $values .= ")";

    $sql = "INSERT INTO " . $table . $columns . " VALUES " . $values;

    return $db->query($sql);
}


function selectAll($table, $limit = null)
{
    global $db;
    $sql = "SELECT * FROM {$table} order by id ";

    if (!is_null($limit)) {
        $sql .= " LIMIT {$limit} ";
    }

    $fetchedResult = $db->query($sql);
    return $fetchedResult;
}
