<?php
/*
 * PDO Database Class
 * Connect to database
 * Create prepared statements
 * Bind values
 * Return rows and results
 */
 class Database {

     private $host = DB_HOST;
     private $dbname = DB_NAME;
     private $dbuser = DB_USER;
     private $dbpass = DB_PASS;

     private $dbh;
     private $stmt;
     private $error;

     public function __construct()
         {
         // Set DSN
         $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->dbname;
         $options = array(
           PDO::ATTR_PERSISTENT => true,
           PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
           PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
         );

         // Create PDO instance
         try
             {
             $this->dbh = new PDO($dsn, $this->dbuser, $this->dbpass, $options);
             }
         catch(PDOException $e)
             {
             $this->error = $e->getMessage();
             echo $this->error;
             }
         }

     // prepare statement with query
     public function query($sql)
         {
         $this->stmt = $this->dbh->prepare($sql);
         }

     // bind values
     public function bind($param, $value, $type = null)
         {
         // set the value type if not set
         if(is_null($type))
             {
             switch(true)
                 {
                 case is_int($value):
                  $type = PDO::PARAM_INT;
                  break;
                 case is_bool($value):
                  $type = PDO::PARAM_BOOL;
                  break;
                 case is_null($value):
                  $type = PDO::PARAM_NULL;
                  break;
                 default:
                  $type = PDO::PARAM_STR;
                 }
             }

         $this->stmt->bindValue($param, $value, $type);
         }

     // execute prepared statement
     public function execute()
         {
         return $this->stmt->execute();
         }

      public function insert_id()
         {
         return $this->dbh->lastInsertId();
         }

     // get result set as array of objects
     public function result_set()
         {
         $this->execute();
         return $this->stmt->fetchAll();
         }

     public function result_single()
         {
         $this->execute();
         return $this->stmt->fetch();
         }

     public function row_count()
         {
         return $this->stmt->rowCount();
         }

 } // end of class
