--TEST--
Test class static members
--SKIPIF--
<?php
  if (version_compare(PHP_VERSION, '5.0.0', '<')) die("skip PHP 5 or later is required");
  $dir = dirname(__FILE__).'/';
  require($dir.'test-helper.php');
  make_bytecode($dir.'a35-class_static.phpt', $dir.'a35-class_static.phb');
?>
--FILE--
<?php
include("a35-class_static.phb");
unlink(dirname(__FILE__).'/a35-class_static.phb');
exit;
--CODE--
error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT);

class Foo {
  static $my_static = 'foo';
  static function aStatMethod() {
    echo "aStatMethod this:";
    var_dump($this);
  }
}


echo "var=", Foo::$my_static, "\n";
try {
Foo::aStatMethod();
}
catch(Error $e) {
    echo "\nFatal error: ", $e->getMessage(), " on line ", $e->getLine(), "\n";
}
$obj = new Foo();
var_dump($obj->my_static);
try {
$obj->aStatMethod();
}
catch(Error $e) {
    echo "\nFatal error: ", $e->getMessage(),  " on line ", $e->getLine(), "\n";
}
--EXPECT--
var=foo
aStatMethod this:
Fatal error: Using $this when not in object context on line 8
NULL
aStatMethod this:
Fatal error: Using $this when not in object context on line 8