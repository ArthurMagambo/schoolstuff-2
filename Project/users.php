<?php
//probably use this upon login and the dtabase class for Thanos level admins(The really powerful ones)

class users extends Database {
  //allow users to manipulate data
  const HOST = '10.20.113.55';
  const NAME = '91383_oop';//will be changed later
  const USER = '91383';
  const PASS = '91383';
  //variables
  private $host;
  private $dbname;
  private $user;
  private $pass;
  private $pdo;//storing the pdo argument for the connection
  private $isConn;

  //constructor with the argument list
public function __construct(
  $host = self::HOST,
  $dbname = self::NAME,
  $username = self::USER,
  $password = self::PASS
  )
{
  $this->host = $host;
  $this->dbname = $dbname;
  $this->user = $username;
  $this->pass = $password;

      //connecting to the database
      try{
        $this->pdo = new PDO("mysql:host={$this->host};dbname={$this->dbname}",$this->user,$this->pass);
      }
      catch(PDOException $e){
        echo $e->getMessage();
      }
    }
//all needed method are inheritedd from the Database class
//check if all methods needed exist in parent class
parent::getAll(string $table);
parent::delete(string $item, string $table);
parent::insert(string $name,int $number, int $country_id,string $table );
parent::update($name,$pnumber,$countryID);
}
//calling stuff to test


}
?>
