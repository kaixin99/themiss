<?php

//类定义
class MyClass
{
	//类常量
    const constant = 'constant value';
    
    //常量函数
    function showConstant() {
    	//这里是定义
        echo  self::constant . "\n";
    }
}

echo MyClass::constant . "\n";

$classname = "MyClass";
echo $classname::constant . "\n"; // PHP 5.3.0之后

$class = new MyClass();
$class->showConstant();

echo $class::constant."\n"; // PHP 5.3.0之后



?>