<?php

include_once 'Database.php';

class CreateClass {

    private $db;

    public function __construct() {
        echo 'created';
        $this->db = new Database();
        $this->link = $this->db->connectToDB();
    }

    public function insertTower($ID, $AdminID, $name, $address) {
        $sql = "INSERT INTO Tower (ID, AdminID, Name, Address) VALUES (?, ?, ?, ?)";
        if ($stmt = mysqli_prepare($this->link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "iiss", $param_ID, $param_AdminID, $param_Name, $param_Address);

            // Set parameters
            $param_ID = $ID;
            $param_AdminID = $AdminID
            $param_Name = $name;
            $param_Address = $address;
            

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Records created successfully. Redirect to landing page
                return true;
            } else {
                return false;
            }
        }
        echo 'outside if';

        // Close statement
        mysqli_stmt_close($stmt);
        mysqli_close($this->link);
        return false;
    }

}
