<?php
namespace takwimu;
use \PDO as PDO;
/*
##########################################
user
id - integer,autoincrement
name - text
phone_number - varchar(20)
country_id - integer
##########################################
role
id - integer,autoincrement
name - text
#########################################
permission
id - integer,autoincrement
name - text
#########################################
role_permission
id - integer,autoincrement
role_id - integer (fk : role_table)
permission_id - integer (fk : permission table)
user_id : integer,autoincrement(fk : user table)
############################################
*/
class Datah{
  //properties
  const DB_HOST = '127.0.0.1';
  const DB_NAME = 'testor';
  const DB_USER = 'testor';
  const DB_PASS = 'testor';

  private $host;
  private $dbname;
  private $user;
  private $pass;
  private $pdo;
  private $isConn;

  public function __construct
  (
    $host = self::DB_HOST,
    $dbname = self::DB_NAME,
    $username = self::DB_USER,
    $password = self::DB_PASS
  )
  {
    //Init
    // assigning the host, database name, username and password
    //maybe a form for this??
    $this->host = $host;
    $this->dbname = $dbname;
    $this->user = $username;
    $this->pass = $password;

    //acquire a connection
    try{
      $this->pdo = new PDO("mysql:host={$this->host};dbname={$this->dbname}",$this->user,$this->pass);
    }
    catch(PDOException $e){
      echo $e->getMessage();
    }
  }
  /**
   * Get all records in a table
   * @param  string $table
   * @return array
   */
  //@TODO : Include conditions
  public function getAll(string $table){

      //Get the connection object
      //write the query
      $sql = "SELECT * FROM {$table}";
      $statement = $this->pdo->prepare($sql);
      $statement->execute();
  }

  //@TODO : Delete based on an id:
  public function delete(string $item, string $table){
  $delsql = "DELETE $item FROM {$table}";
  $statement = $this->pdo->prepare($delsql);
  $statement->execute();
}
  //@TODO Insert a bunch of values to a table
  public function insert(string $name,int $number, int $country_id,string $table )// inserting name, number and country id
  {
    $inssql = "INSERT INTO $table(name, phone_number, country_id)
VALUES ( $name,$numer, $country_id)";
$statement = $this->pdo->prepare($inssql);
$statement->execute();


  }
    //@TODO : Update a bunch of values based on a condition
    public update(){



    }
  //@TODO : Parameter binding
}


?>
