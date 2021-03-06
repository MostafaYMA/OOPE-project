<?php

include_once 'Database.php';

class DeleteClass {

    //put your code here
    private $db;

    public function __construct() {
        echo 'created';
        $this->db = new Database();
        $this->link = $this->db->connectToDB();
    }

    public function delete($id) {
        $sql = "DELETE FROM tower_info WHERE ID = ?";
        if ($stmt = mysqli_prepare($this->link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_ID);

            // Set parameters
            $param_ID = trim($_POST["ID"]);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Records deleted successfully. Redirect to landing page
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
