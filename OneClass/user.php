<?php
/*namespaces have 2 primary uses;
  avoid name colissions
  to have a a way of aliasing and shortening refs

*/
namespace watu;
class Usar extends Datah {
  //allow users to manipulate data
  const HOST = '10.20.113.55';
  const NAME = '91383';
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
  

}

}
?>
