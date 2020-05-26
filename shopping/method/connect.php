<?php
  //關閉所有錯誤報告
  error_reporting(0);
  $host = 'localhost';
  $user = 'abc12355';
  $passwd = 'abc12355';
  $database = 'shopping';
  $connect = new mysqli($host, $user, $passwd, $database);
    
  /*if ($connect->connect_error) {
    die("連線失敗: " . $connect->connect_error);
  }
  echo "連線成功";*/
  $connect->query("SET NAMES 'utf8'");
?>