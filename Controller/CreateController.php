<?php
include_once "config.php";
// Define variables and initialize with empty values
$ID = $AdminID = $name = $address =  "";
$ID_err = $AdminID_err = $name_err = $address_err =  "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input_ID = ($_POST["ID"]);
    if(empty($input_ID)){
    $ID_err = "Please enter an ID";
} else {
     $ID_err = $input_ID;
}
    $input_AdminID = ($_POST["AdminID"]);
     if(empty($input_AdminID)){
    $AdminID_err = "Please enter an Admin ID";
} else {
     $AdminID_err = $input_AdminID;
}

    // Validate name
    $input_name = trim($_POST["name"]);
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

 

    // Check input errors before inserting in database
    if (empty($ID_err) && empty($AdminID_err) && empty($name_err) && empty($address_err) ) {
        // Prepare an insert statement
        include_once '../Model/CreateClass.php';
        $creator = new CreateClass();
        if ($creator->insertRecord($ID,$AdminID,$name, $address)) {
            header("location: ../index.php");
        } else {
            echo "Something went wrong. Please try again later.";
        }
    }

    // Close connection
}
?>