// defining interface for the classes
<?php
public interface Crud//Ill use this later. Most classes will use it
{
  function update();//to be fragmented to allow for specialized updating
                    //maybe a form could work with this update query??
  function delete();
  function insert();
  function create();
  function getAll();
}
public class Database implements Crud//class to handle all data (ish)
{
  //connection dtails
  const DB_HOST = '10.20.113.55';
  const DB_NAME = '91383_oop';//will be changed later on
  const DB_USER = '91383';
  const DB_PASS = '91383';
  private $host;
  private $dbname;
  private $user;
  private $pass;
  private $pdo;
  private $isConn;
  //the constructor
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
    //maybe a form for this?? To allow the user to input their own connection details
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
//this uses execute notation
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
  public function insert(string $name,int $phonenumber, int $country_id,string $table )// inserting name, number and country id
  {
    $inssql = "INSERT INTO {$table}(name, phone_number, country_id)
VALUES ( $name,$phonenumber, $country_id)";
$statement = $this->pdo->prepare($inssql);
$statement->execute();
  }
    //@TODO : updates the User Table    public updateUser($name,$pnumber,$countryID){//TBD
    //  $table = "User"
public function update()
{
      $update = "UPDATE User
SET name = $name,
phone_number = $pnumber,
country_id =$countryID
WHERE name == $name; "
$statement = $this->pdo->prepare($update);
$statement->execute();
    }
}
?>
