<?php
class Database{
private $dbhost="localhost";
private $dbuser= "root";
private $dbpass= "";
    private $dbname= "testa";
    private $conn="";
    private $result=array();
    private $mysqli="";


    function __construct(){
        
        if(!$this->conn){
            $this->mysqli=new mysqli($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);
        }
        if($this->mysqli->connect_error){
            array_push($this->result,$this->mysqli->connect_error);      
        }
    }





        public function insert($table,$values=array()){
                if ($this->table_exist($table)){
                    $table_columns=implode(',', array_keys($values));
                    $table_values=implode("','", $values);
                    $sql= "INSERT INTO $table ($table_columns) VALUES ('$table_values')";
                    if($this->mysqli->query($sql)){
                        array_push($this->result,$this->mysqli->insert_id);
                        return true;
                    }
                    else{
                        array_push($this->result,$this->mysqli->error);
                        return false;
                    }
                }
        }


        private function table_exist($table){
            $sql = "SHOW TABLES FROM $this->dbname LIKE '$table'";
            $tableindb=$this->mysqli->query($sql);
            if($tableindb){
                if($tableindb->num_rows==1){
                    return true;
                }

            }else{
                return false;
            }
        }
        public function getresult(){
            $val=$this->result;
            $this->result=$val;
            return $val;
        }




    function __destruct(){
        if($this->conn){
          if($this->mysqli->close()){
        }
    }
}
}

$obj = new Database();
$obj->insert('student',['name'=>'Murtaza','roll_no'=>'25','address'=>'95nb']);
echo"Inserted result is";
print_r($obj->getresult());

?>