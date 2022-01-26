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

    public function update($ID, $AdminID, $name, $address, $phase, $ID) {
        $sql = "UPDATE tower_info SET ID=?, AdminID=?, Name=?, Address=?, Phase=? WHERE ID=?";

        if ($stmt = mysqli_prepare($this->link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssi", $param_AdminID, $param_name, $param_address, $param_phase, $param_id);

            // Set parameters
            $param_AdminID =$AdminID
            $param_name = $name;
            $param_address = $address;
            $param_salary = $salary;
            $param_ID = $id;

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
