<?php

class Database{
    private $dbname ="tests";
    private $username ="root";
    private $password = "";
    private $dbhost = "localhost";
    private $conn ="";
    private $mysqli ="";
    private $results=array();

    public function __construct(){
        if (!$this->conn){
            $this->mysqli =new mysqli($this->dbhost, $this->username,$this->password,$this->dbname);
            if ($this->mysqli->connect_error){
                array_push($this->results, $this->mysqli->connect_error);
            }

        }
    }

    public function insert($table, $values=array()){
        if ($this->table_exist($table)){
            $table_columns=implode(',', array_keys($values));
            $table_value=implode("','", $values);
         $sql ="INSERT INTO $table ($table_columns) VALUES ('$table_value')";
         if ($this->mysqli->query($sql)){
            array_push($this->results, $this->mysqli->insert_id);
            return true;
         }
         else{
            array_push($this->results,$this->mysqli->error);
            return false;
         }
        }
        else{
        return false;
    }
    }


    public function update($table , $valu=array(),$where=null){
        if($this->table_exist($table)){
          $args =array();
            foreach($valu as $key=>$value){
                $args[] ="$key='$value'";
            }
            $sql="Update $table SET " . implode(',',$args);

        if($where !=null){
            $sql .= " WHERE $where ";
        }
        else{
            echo"id is null";
        }
        if($this->mysqli->query($sql)){
            array_push($this->results,$this->mysqli->affected_rows);
        }
        else{
            array_push($this->results,$this->mysqli->error);
        }
    }
    else{
        echo"table does not exist";
    }
}




        public function Delete($table,$where=null){
            if($this->table_exist($table)){
                $sql="DELETE FROM $table";

                if ($where != null){
                    $sql .=" WHERE $where";
                }
                else{
                    echo "id is null";
                }
                
                if($this->mysqli->query($sql)){
                    array_push($this->results,$this->mysqli->affected_rows);
                }
                else{
                    array_push($this->results,$this->mysqli->error);
                }
            }
        }
    private function table_exist($table){
        //$sql="SELECT * FROM '$table'";
        $sql="SHOW TABLES FROM $this->dbname LIKE '$table'";
        $tableindb = $this->mysqli->query($sql);
        if ($tableindb){
            if ($tableindb->num_rows==1){
                return true;
            }
            else{
                array_push($this->results, $table."Does not exist");
                return false;
            }
        }
    }

    public function getresult(){
        $val = $this->results;
        $this->results = array();
        return $val;
    }

    public function __destruct(){
        if ($this->conn){
            if($this->mysqli->close())
            {
            $this->conn=false;
            }

        }

    }
    }
    ?>


<?php
   // $obj = new Database();
    // $obj->insert('student',['name'=>'Murtaza','roll_number'=>'25','address'=>'995nb']);
   // $obj->update('student',['name'=>'Mughal','roll_number'=>'45','address'=>'9995nb'],'id="1"');
   //$obj->Delete('student','id="1"');
      // echo "Delete result is : ";
      // print_r($obj->getresult());
?>




