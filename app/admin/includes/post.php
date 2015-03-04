<?php include_once "dbconf.php"; ?>


<?php
    $pk = $_GET['pk'];
    $name = $_GET['name'];
    $value = $_GET['value'];
  if(!empty($value)) {
      
    mysql_query("UPDATE products SET $name='$value' WHERE productcode='$pk'");
    } else {
         header('HTTP 400 Bad Request', true, 400);
        echo "This field is required!";
    }
?>