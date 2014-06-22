<?php

class DB {

   

	/*protected $db_name = 'csespn';
    protected $db_user = 'root';
    protected $db_pass = 'Jewelcase';
    protected $db_host = 'localhost';*/
	
    function __construct() {
        $this->connect();
    }

    //open a connection to the database. Make sure this is called
    //on every page that needs to use the database.
    public function connect() {
        $connection = mysqli_connect($this->db_host, $this->db_user, $this->db_pass, $this->db_name) or die("Error " . mysqli_error($connection));;
        //mysqli_select_db($connection,$this->db_name);

        return true;
    }

	public function getConnection(){
	
		$connection = mysqli_connect($this->db_host, $this->db_user, $this->db_pass, $this->db_name) or die("Error " . mysqli_error($connection));;
		return $connection;
		}
    //takes a mysql row set and returns an associative array, where the keys
    //in the array are the column names in the row set. If singleRow is set to
    //true, then it will return a single row instead of an array of rows.
    public function processRowSet($rowSet, $singleRow = false) {
        $resultArray = array();
        while ($row = mysqli_fetch_assoc($rowSet)) {
            array_push($resultArray, $row);
        }

        if ($singleRow === true)
            return $resultArray[0];

        return $resultArray;
    }
	

	public function stringify($value) {
		if(isset($value) && !is_null($value) && !empty($value)) {
			return "'".mysqli_real_escape_string($this->getConnection(), $value)."'";
		} else {
			return "NULL";
		}		
	}	

    //Select rows from the database.
    //returns a full row or rows from $table using $where as the where clause.
    //return value is an associative array with column names as keys.
    public function select($table, $where) {
        
		
		$sql = "SELECT * FROM $table WHERE $where";
        $result = mysqli_query($this->getConnection(),$sql);
		if(!$result) {
			die(mysqli_error($this->getConnection()));
		}  else {
			return $this->processRowSet($result);
		}
        
    }

    //This is more complex select query
    public function select2($columns, $table, $where, $group_by, $order_by) {
       
		$group_by != "" ? $group_by = ' GROUP BY ' . $group_by : $group_by = "";
        $order_by != "" ? $order_by = ' ORDER BY ' . $order_by : $order_by = "";
        $sql = "SELECT $columns FROM $table WHERE $where $group_by $order_by";

        //echo $sql;
        $result = mysqli_query($this->getConnection(),$sql);
        //if (mysql_num_rows($result) == 1)
        //    return $this->processRowSet($result, true);

		if(!$result) {
			die(mysqli_error($this->getConnection()));
		}  else {
			return $this->processRowSet($result);
		}
        
    }

    /**
     * Function to execute a custom sql command
     * 
     * @param type $sql
     */
    public function execute($sql) {
	    
        mysqli_query($this->getConnection(), $sql) or die(mysqli_error($this->getConnection()));
    }

    /*
     * Function to execute a custom sql command and get the results
     */
    public function query($sql){
		
		$result = mysqli_query($this->getConnection(), $sql) or die(mysqli_error($this->getConnection()));
        return $this->processRowSet($result);
    }
    
    
    //Updates a current row in the database.
    //takes an array of data, where the keys in the array are the column names
    //and the values are the data that will be inserted into those columns.
    //$table is the name of the table and $where is the sql where clause.
    public function update($data, $table, $where) {
        
		foreach ($data as $column => $value) {
            $sql = "UPDATE $table SET $column = $value WHERE $where";
            mysqli_query($this->getConnection(),$sql) or die($sql." : ".mysqli_error($this->getConnection()));
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
        $conn = $this->getConnection();
        mysqli_query($conn,$sql) or die($sql." : ".mysqli_error($conn));

        //return the ID of the user in the database.
        return mysqli_insert_id($conn);
    }

    /**
     * Function to delete a row
     * 
     * @param string $ids
     * @param string $table
     */
    public function delete($ids, $table) {
        
		
		
		$commaList = implode(', ', $ids);
        $sql = "delete from  $table where id in ($commaList)";
        $result = mysqli_query($this->getConnection(),$sql);
        return $result;
    }
    
    public function deleteWhere($table, $where) {
        
		
		
		$sql = "delete from $table where $where";
        $result = mysqli_query($this->getConnection(),$sql);
        return $result;
    }

    /**
     * 
     * @param type $table1 left table to join
     * @param type $table2 right table to join
     * @param type $table1 Index field from left table to compare when joining
     * @param type $table2 Index field from right table to compare when joining
     * @param type $where filter results
     * @param type $results 1->rows only from left table // 2-> rows only from table 2
     * @return boolean
     */
    public function innerJoinOrderBy($table1, $table2, $table1Index, $table2Index, $where, $order_by,$results = 0) {
       
		
		
	   $sql = "SELECT * FROM $table1 INNER JOIN $table2 ON $table1.$table1Index=$table2.$table2Index WHERE $where ORDER BY ".$order_by;
        if ($results == 1) {
            $sql = "SELECT $table1.* FROM $table1 INNER JOIN $table2 ON $table1.$table1Index=$table2.$table2Index WHERE $where ORDER BY ".$order_by;
        } else if ($results == 2) {
            $sql = "SELECT $table2.* FROM $table1 INNER JOIN $table2 ON $table1.$table1Index=$table2.$table2Index WHERE $where ORDER BY ".$order_by;
        }
        $result = mysqli_query($this->getConnection(),$sql) ;
        if (!$result) {
            return false;
        } else {
            //if (mysql_num_rows($result) == 1) {
            //    return $this->processRowSet($result, true);
            //}
            return $this->processRowSet($result);
        }
    }
    public function innerJoin($table1, $table2, $table1Index, $table2Index, $where,$results = 0) {
        
		
		$sql = "SELECT * FROM $table1 INNER JOIN $table2 ON $table1.$table1Index=$table2.$table2Index WHERE $where";
        if ($results == 1) {
            $sql = "SELECT $table1.* FROM $table1 INNER JOIN $table2 ON $table1.$table1Index=$table2.$table2Index WHERE $where";
        } else if ($results == 2) {
            $sql = "SELECT $table2.* FROM $table1 INNER JOIN $table2 ON $table1.$table1Index=$table2.$table2Index WHERE $where";
        }
        $result = mysqli_query($this->getConnection(),$sql);
        if (!$result) {
            return false;
        } else {
            //if (mysql_num_rows($result) == 1) {
            //    return $this->processRowSet($result, true);
            //}
            return $this->processRowSet($result);
        }
    }
    
    
    /**
     * Function to get results from a natural join of two tables
     * 
     * @param string $columns
     * @param string $table1
     * @param string $table2
     * @param string $where
     */
    public function naturalJoin($columns,$table1,$table2,$where){	
		$sql = "SELECT $columns  FROM $table1 LEFT JOIN $table2 WHERE $where";
        $result = mysqli_query($this->getConnection(),$sql);
        if (!$result) {
            return false;
        } else {
            //if (mysql_num_rows($result) == 1) {
            //    return $this->processRowSet($result, true);
            //}
            return $this->processRowSet($result);
        }
    }
    
    public function leftJoin($columns,$table1,$table2,$where,$leftCol, $rightCol){		
		$sql = "SELECT $columns  FROM $table1 LEFT JOIN $table2 ON $table1.$leftCol= $table2.$rightCol WHERE $where";
        
        $result = mysqli_query($this->getConnection(),$sql);
        if (!$result) {
            return false;
        } else {
            //if (mysql_num_rows($result) == 1) {
            //    return $this->processRowSet($result, true);
            //}
            return $this->processRowSet($result);
        }
    }
}
