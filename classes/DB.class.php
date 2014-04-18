<?php

class DB {

    protected $db_name = 'csespn';
    protected $db_user = 'root';
    protected $db_pass = '';
    protected $db_host = 'localhost';

    function __construct() {
        $this->connect();
    }

    //open a connection to the database. Make sure this is called
    //on every page that needs to use the database.
    public function connect() {
        $connection = mysql_connect($this->db_host, $this->db_user, $this->db_pass);
        mysql_select_db($this->db_name);

        return true;
    }

    //takes a mysql row set and returns an associative array, where the keys
    //in the array are the column names in the row set. If singleRow is set to
    //true, then it will return a single row instead of an array of rows.
    public function processRowSet($rowSet, $singleRow = false) {
        $resultArray = array();
        while ($row = mysql_fetch_assoc($rowSet)) {
            array_push($resultArray, $row);
        }

        if ($singleRow === true)
            return $resultArray[0];

        return $resultArray;
    }

    //Select rows from the database.
    //returns a full row or rows from $table using $where as the where clause.
    //return value is an associative array with column names as keys.
    public function select($table, $where) {
        $sql = "SELECT * FROM $table WHERE $where";
        $result = mysql_query($sql);
        if (!$result) {            
            return false;
        }else{
            //if (mysql_num_rows($result) == 1) {
            //    return $this->processRowSet($result, true);
            //}
            return $this->processRowSet($result);
        }
    }

    //This is more complex select query
    public function select2($columns, $table, $where, $group_by, $order_by) {
        $group_by != "" ? $group_by = ' GROUP BY ' . $group_by : $group_by = "";
        $order_by != "" ? $order_by = ' ORDER BY ' . $order_by : $order_by = "";
        $sql = "SELECT $columns FROM $table WHERE $where $group_by $order_by";
        $result = mysql_query($sql);
        //if (mysql_num_rows($result) == 1)
        //    return $this->processRowSet($result, true);

        return $this->processRowSet($result);
    }

    //Updates a current row in the database.
    //takes an array of data, where the keys in the array are the column names
    //and the values are the data that will be inserted into those columns.
    //$table is the name of the table and $where is the sql where clause.
    public function update($data, $table, $where) {
        foreach ($data as $column => $value) {
            $sql = "UPDATE $table SET $column = $value WHERE $where";
            mysql_query($sql) or die(mysql_error());
        }
        return true;
    }

    //Inserts a new row into the database.
    //takes an array of data, where the keys in the array are the column names
    //and the values are the data that will be inserted into those columns.
    //$table is the name of the table.
    public function insert($data, $table) {

        $columns = "";
        $values = "";

        foreach ($data as $column => $value) {
            $columns .= ($columns == "") ? "" : ", ";
            $columns .= $column;
            $values .= ($values == "") ? "" : ", ";
            $values .= $value;
        }

        $sql = "insert into $table ($columns) values ($values)";
        
        mysql_query($sql) or die(mysql_error());

        //return the ID of the user in the database.
        return mysql_insert_id();
    }
    
    /**
     * 
     * @param type $table1 first table to join
     * @param type $table2 second table to join
     * @param type $table1Key key from first table to compare when joining
     * @param type $table2Key key from second table to compare when joining
     * @param type $where fiter teh results
     * @param type $return $return=0 -> return rows from both tables/ 1->return rows only from 1st table / 2-> return rows only from second table
     * @return boolean
     */
    public function innerJoin($table1,$table2,$table1Key,$table2Key,$where,$return=0){
        $sql = "SELECT * FROM $table1 INNER JOIN $table2 ON $table1.$table1Key=$table2.$table2Key WHERE $where";
        if($return==1){
            $sql = "SELECT $table1.* FROM $table1 INNER JOIN $table2 ON $table1.$table1Key=$table2.$table2Key WHERE $where";
        }else if($return==2){
            $sql = "SELECT $table2.* FROM $table1 INNER JOIN $table2 ON $table1.$table1Key=$table2.$table2Key WHERE $where";
        }
        
        $result = mysql_query($sql);
        if (!$result) {            
            return false;
        }else{
            //if (mysql_num_rows($result) == 1) {
            //    return $this->processRowSet($result, true);
            //}
            return $this->processRowSet($result);
        }
    }
    

}
