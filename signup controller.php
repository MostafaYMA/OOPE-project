<?php
// Define variables and initialize with empty values
$fname = $lname = $email= $password = "";
$fname_err = $lname_err =  $email_err = $password_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate the first name
    $input_fname = trim($_POST["fname"]);
    if (empty($input_fname)) {
        $fname_err = "Please enter the first name.";
    } elseif (!filter_var($input_fname, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {
        $fname_err = "Please enter a valid name.";
    } else {
        $fname = $input_fname;
    }

     // Validate the last name
     $input_fname = trim($_POST["lname"]);
     if (empty($input_lname)) {
         $fname_err = "Please enter the last name.";
     } elseif (!filter_var($input_lname, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {
         $lname_err = "Please enter a valid name.";
     } else {
         $lname = $input_lname;
     }

    // Validate email
    $input_email = trim($_POST["email"]);
    if (empty($input_email)) {
        $email_err = "Please enter an email.";
    } else {
        $email = $input_email;
    }

    // Validate password
    $input_pass = trim($_POST["password"]);
    if (empty($input_pass)) {
        $password_err = "Please enter a password.";
    } else {
        $password = $input_password;
    }

    // Check input errors before inserting in database
    if (empty($fname_err) && empty($lname_err) && empty($email_err) && empty($password_err)) {
        // Prepare an insert statement
        include_once '../CreateClass.php';
        $creator = new CreateClass();
        if ($creator->insertRecord($fname, $lname,$email, $password)) {
            header("location: ../index.php");
        } else {
            echo "Something went wrong. Please try again later.";
        }
    }

    // Close connection
}
?>