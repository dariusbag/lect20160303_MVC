<?php
include 'pdo_connect.php';

foreach($connectPDO->query('SELECT * from users') as $row) {
   foreach($row as $key=>$value){
       echo $key .' - '. $value .'<br />';
   }
}
?>