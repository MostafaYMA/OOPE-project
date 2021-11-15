<?php
// Define variables and initialize with empty values
$towername = $towerID = $startdate = $phase = $supervisor = $address = $payment = "";
$name_err = $startdate_err = $payment_err =$address_err = $towerID_err =  "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    {
    // Validate towername
    $input_name = trim($_POST["towername"]);
    if (empty($input_name)) {
        $name_err = "Please enter a name.";
    } 
    elseif (!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {
        $name_err = "Please enter a valid name.";
    } 
    else {
        $towername = $input_name;
    }

    // Validate towerID
    $input_towerID = trim($_POST["ID"]);
    if (empty($input_towerID)) {
        $towerID_err = "Please enter the tower ID.";
    } 
    elseif (!ctype_digit($input_towerID)) 
    {
        $towerID_err = "Please enter a positive integer value.";
    } 
    else 
    {
        $towerID = $input_towerID;
    }

    // Validate startdate
    $input_startdate = trim($_POST["begin"]);
    if (empty($input_startdate)) {
        $startdate_err = "Please enter a startdate.";
    } else {
        $startdate = $input_startdate;
    }
    
    // Validate payment
    $input_payment = trim($_POST["payment"]);
    if (empty($input_payment)) {
        $payment_err = "Please enter the payment.";
    } elseif (!ctype_digit($input_payment)) {
        $payment_err = "Please enter a positive integer value.";
    } else {
        $payment = $input_payment;
    }

    // Validate towerphase
    $input_phase = trim($_POST["tower_type"]);
        
    $phase = $input_phase;
    }

    // Validate address
    $input_address = trim($_POST["address"]);
    if (empty($input_payment)) 
    {
        $address_err = "Please enter an address.";
    } 
    else {
        $address = $input_address;
    }

    

    
    // Validate payment
    $input_payment = trim($_POST["payment"]);
    if (empty($input_payment)) {
        $payment_err = "Please enter the payment.";
    } elseif (!ctype_digit($input_payment)) {
        $payment_err = "Please enter a positive integer value.";
    } else {
        $payment = $input_payment;
    }

    // Check input errors before inserting in database
    if (empty($name_err) && empty($address_err) && empty($startdate_err) && empty($payment_err) && empty($towerID_err)) {
        // Prepare an insert statement
        include_once './CreateClass.php';
        $creator = new CreateClass();
        if ($creator->insertRecord($towerID,$name, $address, $startdate,$payment)) {
            header("location: ../View/Demo/Home/Home.html");
        } else {
            echo "Something went wrong. Please try again later.";
        }
    }

    // Close connection
}
?>