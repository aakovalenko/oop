<?php


         $host = 'localhost';
         $dbname = 'login_system';
         $username = 'andrii';
         $password = '1';


         try {
             $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8",$username,$password);
             $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

         } catch (PDOException $e) {
             echo "Cron could not connect to database.\r\n";
             exit;
         }





