<?php
// Define variables and initialize with empty values
$ID = $AdminID = $name = $address = $phase = "";
$ID_err = $AdminID_err = $name_err = $address_err = $phase_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate name
    $input_name = trim($_POST["Name"]);
    if (empty($input_name)) {
        $name_err = "Please enter a name.";
    } elseif (!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {
        $name_err = "Please enter a valid name.";
    } else {
        $name = $input_name;
    }

    // Validate address
    $input_address = trim($_POST["address"]);
    if (empty($input_address)) {
        $address_err = "Please enter an address.";
    } else {
        $address = $input_address;
    }

    // Validate phase
    $input_salary = trim($_POST["phase"]);
    if (empty($input_phase)) {
        $salary_err = "Please enter phase.";
    } elseif (!ctype_digit($input_phase)) {
        $salary_err = "Please enter 1-3.";
    } else {
        $phase = $input_phase;
    }

    // Check input errors before inserting in database
    if (empty($name_err) && empty($address_err) && empty($phase_err)) {
        // Prepare an insert statement
        include_once '../Model/CreateClass.php';
        $creator = new CreateClass();
        if ($creator->insertRecord($ID, $AdminID, $name, $address, $phase)) {
            header("location: ../index.php");
        } else {
            echo "Something went wrong. Please try again later.";
        }
    }

    // Close connection
}
?>