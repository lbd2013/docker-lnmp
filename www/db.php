<?php
/*
try{
 $con =new PDO("mysql:host=mysql;dbname=test","root","123456");
 echo"ok...";

}catch(PDOException $e){

  echo $e->getMessage();
}
*/

  $con = new mysqli("mysql","root","123456");

  if($con->connect_error){
      die("connect fail".$con->connect_error);
  }else{
      $result = $con->query('select user from mysql.user;');
      if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
              var_dump($row);
          }
      } else {
          echo "0 results";
      }
      echo "connect success!";
  }

