<?php
include_once 'Database.php';
  class tower
  {
    private $db;
    function __construct($ID,$AdminID,$Name,$Address) 
    {
        $this->db = new Database();
        $this->conn = $this->db->connectToDB();
        $this->ID = $ID;
        $this->AdminID = $AdminID;
        $this->Name = $Name;
        $this->Address = $Address;
    }
    public function create()
    {
      $stmt = $this->db->conn->prepare("INSERT INTO tower (Name,Address) VALUES (:name, :Address");
      $this->db->conn->execute(array("name" => $this->Name, "Address" => $this->Address));
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
