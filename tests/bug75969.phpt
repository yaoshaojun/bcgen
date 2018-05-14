--TEST--
Bug #75969: Assertion failure in live range DCE due to block pass misoptimization
--INI--
bcgen.optimization_level=-1
--FILE--
<?php

// This is required for the segfault
md5('foo');

class Extended_Class {};
$response = array(
    'a' => 'b'
);
new Extended_Class( array(
    'foo' => $response,
    'foo2' => 'bar2'
) );

?>
===DONE===
--EXPECT--
===DONE===
