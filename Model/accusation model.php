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
      $stmt = $this->ye->prepare("INSERT INTO `accusation`( `Statement`, `Cash amount`, `payed from`, `receipt number`, `Collection`) VALUES (?,?,?,?,?)");
      $stmt->bind_param("iisis",$this->Statement, $this->Cash, $this->Payment, $this->Receipt, $this->Collection);
      $stmt->execute();
    }
    public function read($id)
    {
      $kms = "SELECT * FROM `accusation` WHERE `ID` = $id"; 
      $stmt =$this->ye->query($kms);
      if ($stmt->num_rows > 0) 
      {
        // output data of each row
        while($pr = $stmt->fetch_assoc()) 
        {
          echo "id: " . $pr["ID"]. " - Statement: " . $pr["Statement"]." - Cash: ".$pr["Cash"] . "Payment: " . $pr["Payment"].   "Receipt: " . $pr["Receipt"]. "Collection: " . $pr["Collection"].  "<br>";
        }
      } 
      else 
      {
          echo "0 results";
      }
    }
    public function update($Statement,$Cash,$Payment,$Receipt,$Collection)
    {
      $kms = "UPDATE `accusation` SET `Statement`=?,`Cash amount`=?,`payed from`=?,`receipt number`=?,`Collection`=? WHERE ID = $id";
      $stmt = $this->ye->prepare($kms);
      $stmt->bind_param("iisis",$this->Statement, $this->Cash, $this->Payment, $this->Receipt, $this->Collection);
      $stmt->execute();
    }
    public function delete($id)
    { 
      $kms = "DELETE FROM `accusation` WHERE ID = $id";
      $stmt = $this->ye->prepare($kms);
      $stmt->execute();
    }
    
  }

?>
