<?php 
use NilPortugues\Sql\QueryBuilder\Builder\GenericBuilder;

$builder = new GenericBuilder(); 

$query = $builder->select()->setTable('user');    

echo $builder->write($query);   

?>