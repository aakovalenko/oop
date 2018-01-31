<?php
 class DB
 {
     protected static $conn;

     private function __construct()
     {
         try {
             self::$conn = new PDO('mysql:charset=utf8mb4;host=localhost;port=3306;dbname=login_system','andrii','1');
             self::$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION_);
             self::$conn->setAttribute(PDO::ATTR_PERSISTENT,false);
         } catch (PDOException $e) {
             echo "Cron could not connect to database.\r\n";
             exit;
         }
     }

     public static function getConnection() {
         //if this instance was not been started, start it
         if (!self::$conn) {
             new DB();
         }
         //Return the writeable db connection
         return self::$conn;
     }


 }