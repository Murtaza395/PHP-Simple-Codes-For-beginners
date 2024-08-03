<?php
/*class base{
    public static $name ="Murtaza";
}

class derived extends base{
    public function show(){

    echo parent:: $name;
    }
}
$test = new derived();
$test->show();



public static function printname(){
    echo base::$name;
}
public function __construct($n){
self::$name =$n;
}

}
echo base::$name;
base::printname();
$obj = new base("wow");
$obj->printname();



class parents{
    protected static $name="mughal";
    public function show(){
        echo static::$name;
        echo self :: $name;
    }
}
class child extends parents{
        protected static $name="Murtaza";
    }
$obj = new child();
$obj->show();

interface Ali{
    function sum($a, $b);
}
interface Bilal {
     function multiply($c, $d);
}

class childclass implements Ali, Bilal{
public function sum($a, $b){
    echo $a + $b;
}
public function multiply($c, $d){
    echo $c * $d;
}
}
$obj = new childclass();
$obj->sum(10, 20);
echo"<br>";
$obj->multiply(30, 40);
?>
class base{
    static $name = "Murtaza";
    public static function show(){
        echo static :: $name;
        echo self::$name;
    }
}

class derived extends base{
    static $name="Mughal";
}
$obj = new derived();
$obj->show();



trait sum{
    public function sum($a,$b){
        echo $a+$b;
    }
    
}
trait multiply{
    public function multiply($a,$b){
        echo $a*$b;
    }
    
}
trait subtract{
    public function subtract($c,$d){
        echo $c-$d;
    }
}
class A{
    use sum,subtract;
}
class B{
    use sum;
}
class C extends A{
use multiply;
}

$obj=new A();

$obj=new B();
$obj=new C();
echo"<br>";
$obj->sum(10,29);
echo"<br>";
$obj->subtract(10,5);
echo"<br>";
$obj->multiply(10,29);






class School{
    public function getnames(student $names){
        foreach ($names->names() as $name){
            echo $name . "<br>";
        }
    }
}
class student{
    public function names(){
        return ['Murtaza', 'Bilal', 'Talha'];
    }
}
//for cheking type hinting.
class library{

}
$sch = new school();
$stu = new student();
$lib = new library();
$sch ->getnames($stu);




//get method

class student{
    private $name = ['Ali'=>'20','Bilal'=>'30','Arslan'=>'40'];
    function __get($key)
{
   if (array_key_exists($key,$this->name)){
   return $this->name[$key];}
else{
    return "This key is not defined";
}
}

}

$obj = new student();
echo $obj->Bilal;



//call method

class student{
private $first_name;
private $last_name;

private function setname($fname,$lname){
    $this->first_name=$fname;
    $this->last_name=$lname;
}
function __call($method, $args){
    if(method_exists($this, $method)){
        call_user_func_array([$this,$method],$args);
    }
    else{
        echo"This method does not exits";
    }
}
}


$obj = new student();
$obj->setname("Murtaza","Mughal");

"<pre>";
print_r($obj);
"</pre>";*/


?>