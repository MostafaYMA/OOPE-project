<?php
include_once 'Database.php';
  class material
  {
    private $db;
    private $Name;
    private $Dimensions;
    private $Type;
    private $TotalD;
    private $UnitPrice;
    private $Costoergram;
    private $ye;
    public function __construct() 
    {
      $this->db = new Database();
      $this->ye  = $this->db->connectToDB();
    }
    public function create($Name,$Dimensions,$Type,$TotalD,$UnitPrice,$Costpergram)
    {
      $this->Name = $Name;
      $this->Dimensions = $Dimensions;
      $this->Type = $Type;
      $this->TotalD = $TotalD;
      $this->UnitPrice = $UnitPrice;
      $this->Costoergram = $Costpergram;
      $stmt = $this->ye->prepare("INSERT INTO `civil`( `Band Name`, `Dimensions`,`Type`, `Total Dimensions`,`Unit Price`,`Cost Per Gram`) VALUES (?,?,?,?,?,?)");
      $stmt->bind_param("siiiis",$this->Name, $this->Dimensions,$this->Type, $this->TotalD,$this->UnitPrice,$this->Costoergram);
      $stmt->execute();
    }
    public function read($id)
    {
      $kms = "SELECT * FROM `civil` WHERE `ID` = $id";
      $stmt =$this->ye->query($kms);
      if ($stmt->num_rows > 0) 
      {
        // output data of each row
        while($pr = $stmt->fetch_assoc()) 
        {
          echo "id: " . $pr["ID"]. " - Band Name: " . $pr["Band Name"]." - Dimensions ".$pr["Dimensions"] . "Type: " . $pr["Type"].   "Total Dimensions: " . $pr["Total Dimensions"]. "Unit Price: " . $pr["Unit Price"] . "Cost Per Gram: " . $pr["Cost Per Gram"].  "<br>";
        }
      } 
      else 
      {
          echo "0 results";
      }
    }
    public function update($id,$Name,$Dimensions,$Type,$TotalD,$UnitPrice,$Costpergram)
    {
      $kms = "UPDATE `material with measurements` SET `Band Name`=?,`Dimensions`=?, `Type`=?,`Total Dimensions`=?, `Unit Price`=? ,`Cost Per Gram`=? WHERE ID = $id";
      $stmt = $this->ye->prepare($kms);
      $stmt->bind_param("siiii",$this->Name, $this->Unitid, $this->Price, $this->Quantity, $this->Total);
      $stmt->execute();
    }
    public function delete($id)
    { 
      $kms = "DELETE FROM `civil` WHERE ID = $id";
      $stmt = $this->ye->prepare($kms);
      $stmt->execute();
    }
    
  }

?>
