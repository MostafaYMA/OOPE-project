<?php
include_once 'Database.php';
connectToDB();
  class tower
  {
    $ID
    $AdminID
    $Name
    $Address

    public function create()
    {
      $db->prepare("INSERT INTO tower (Name,Address) VALUES (:name, :Address");

      $db->execute(
      array("name" => $Name, "Address" => $Address)
      );
    }
    public function read($id)
    {
    
    }
    public function update($id)
    {
    
    }
    public function delete($id)
    {
    
    }
    
  }

?>
