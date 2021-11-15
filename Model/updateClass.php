<?php

include_once 'Database.php';

class updateClass {

    //put your code here
    private $db;

    public function __construct() {
        echo 'created';
        $this->db = new Database();
        $this->link = $this->db->connectToDB();
    }

    public function update($ID, $AdminID, $name, $address, $id) {
        $sql = "UPDATE employees SET ID=?, AdminID=?, name=?, address=?, WHERE id=?";

        if ($stmt = mysqli_prepare($this->link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssi",$param_ID, $param_AdminID, $param_name, $param_address,$param_id);

            // Set parameters
            $param_ID = $ID;
            $param_AdminID = $AdminID;
            $param_name = $name;
            $param_address = $address;
            $param_id = $id;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Records updated successfully. Redirect to landing page
                return true;
            } else {
                return false;
            }
        }
         // Close statement
        mysqli_stmt_close($stmt);

        // Close connection
        mysqli_close($link);
        return false;
    }

}
