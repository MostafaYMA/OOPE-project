<?php
include_once 'Database.php';
  class tower
  {
    private $db;
    private $Name;
    private $Address;
    private $AdminID;
    private $ye;
    public function __construct() 
    {
        $this->db = new Database();
        $this->ye  = $this->db->connectToDB();
    }
    public function create($AdminID,$Name,$Address)
    {
      $this->AdminID = $AdminID;
      $this->Name = $Name;
      $this->Address = $Address;
      $stmt = $this->ye->prepare("INSERT INTO `tower info`( `AdminID`, `Name`, `Address`) VALUES (?,?,?)");
      $stmt->bind_param("iss",$this->AdminID, $this->Name, $this->Address);
      $stmt->execute();
    }
    public function read($id)
    {
      $kms = "SELECT * FROM `tower info` WHERE `ID` = $id"; 
      $stmt =$this->ye->query($kms);
      if ($stmt->num_rows > 0) 
      {
        // output data of each row
        while($pr = $stmt->fetch_assoc()) 
        {
          echo "id: " . $pr["ID"]. " - AdminID: " . $pr["AdminID"]. " - Name " . $pr["Name"]." - Address ".$pr["Address"] ."<br>";
        }
      } else 
        {
          echo "0 results";
        }
    }
    public function update($id,$AdminID,$Name,$Address)
    {
      $kms = "UPDATE `tower info` SET `AdminID`=?,`Name`=?,`Address`=? WHERE ID = $id";
      $stmt = $this->ye->prepare($kms);
      $stmt->bind_param("iss",$AdminID, $Name, $Address);
      $stmt->execute();
    }
    public function delete($id)
    { 
      $kms = "DELETE FROM `tower info` WHERE ID = $id";
      $stmt = $this->ye->prepare($kms);
      $stmt->execute();
    }
    
  }

?>
