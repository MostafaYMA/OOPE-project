<?php

include_once 'Database.php';

class CreateClass {

    private $db;

    public function __construct() {
        echo 'created';
        $this->db = new Database();
        $this->link = $this->db->connectToDB();
    }

    public function insertRecord($ID, $AdminID, $name, $address, $phase) {
        $sql = "INSERT INTO tower_info (ID, AdminID, Name, Address, Phase) VALUES (?, ?, ?, ?, ?)";
        if ($stmt = mysqli_prepare($this->link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss",$para_ID, $para_AdminID, $param_name, $param_address, $param_phase);

            // Set parameters
            $param_ID = $ID;
            $param_AdminID = $AdminID
            $param_name = $name;
            $param_address = $address;
            $param_phase = $phase;

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
