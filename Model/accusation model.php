<?php
include_once 'Database.php';
  class material
  {
    private $db;
    private $Statement;
    private $Cash;
    private $Payment;
    private $Receipt;
    private $Collection;
    private $ye;
    public function __construct() 
    {
      $this->db = new Database();
      $this->ye  = $this->db->connectToDB();
    }
    public function create($Statement,$Cash,$Payment,$Receipt,$Collection)
    {
      $this->Statement = $Statement;
      $this->Cash = $Cash;
      $this->Payment = $Payment;
      $this->Receipt = $Receipt;
      $this->Collection = $Collection;
      $stmt = $this->ye->prepare("INSERT INTO `accusation`( `Statement`, `Cash amount`, `payed from`,`receipt number`,`Total`) VALUES (?,?,?,?,?)");
      $stmt->bind_param("siiii",$this->Name, $this->Unitid, $this->Price, $this->Quantity, $this->Total);
      $stmt->execute();
    }
    public function read($id)
    {
      $kms = "SELECT * FROM `material with measurements` WHERE `ID` = $id"; 
      $stmt =$this->ye->query($kms);
      if ($stmt->num_rows > 0) 
      {
        // output data of each row
        while($pr = $stmt->fetch_assoc()) 
        {
          echo "id: " . $pr["ID"]. " - Name " . $pr["Name"]." - Unitid ".$pr["Unitid"] . "Price: " . $pr["Price"].   "Quantity: " . $pr["Quantity"]. "Total: " . $pr["Total"].  "<br>";
        }
      } 
      else 
      {
          echo "0 results";
      }
    }
    public function update($id,$Name,$Unitid,$Price,$Quantity,$Total)
    {
      $kms = "UPDATE `material with measurements` SET `Name`=?,`Unitid`=?, `Price`=?,`Quantity`=?, `Total`=? WHERE ID = $id";
      $stmt = $this->ye->prepare($kms);
      $stmt->bind_param("siiii",$this->Name, $this->Unitid, $this->Price, $this->Quantity, $this->Total);
      $stmt->execute();
    }
    public function delete($id)
    { 
      $kms = "DELETE FROM `material with measurements` WHERE ID = $id";
      $stmt = $this->ye->prepare($kms);
      $stmt->execute();
    }
    
  }

?>
