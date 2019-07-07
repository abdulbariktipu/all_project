<?php
class SimpleClass
{
    // property declaration
    public $var = 'Hello Simple Class';
 
    // method declaration
    public function displayVar() {
        echo $this->var;
    }
}
$obj=new SimpleClass;
$obj->displayVar(); 
/*
access class method using Object Variable $obj
 Result: Hello Simple Class
*/
?>