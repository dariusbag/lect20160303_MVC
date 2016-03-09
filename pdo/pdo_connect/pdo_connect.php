<?php
try {
    $connectPDO = new PDO('mysql:host=localhost;dbname=darius;charset=utf8', 'root', '');
    $connectPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

// $connectPDO = null;
?>
