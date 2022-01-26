<?php


// Include config file
// Define variables and initialize with empty values
$ID = $AdminID = $name = $address = $phase = "";
$ID_err= $AdminID_err = $name_err = $address_err = $phase_err = "";

// Processing form data when form is submitted
if (isset($_POST["id"]) && !empty($_POST["id"])) {
    echo 'post';

    // Get hidden input value
    $id = $_POST["id"];

    // Validate name
    $input_name = trim($_POST["name"]);
    if (empty($input_name)) {
        $name_err = "Please enter a name.";
    } elseif (!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {
        $name_err = "Please enter a valid name.";
    } else {
        $name = $input_name;
    }

    // Validate address address
    $input_address = trim($_POST["address"]);
    if (empty($input_address)) {
        $address_err = "Please enter an address.";
    } else {
        $address = $input_address;
    }

    // Validate phase
    $input_phase = trim($_POST["phase"]);
    if (empty($input_phase)) {
        $phase_err = "Please enter the phase.";
    } elseif (!ctype_digit($input_phase)) {
        $phase_err = "Please enter 1-3.";
    } else {
        $phase = $input_phase;
    }

    // Check input errors before inserting in database
    if (empty($ID_err) && empty($AdminID_err) && empty($name_err) && empty($address_err) && empty($phase_err)) {
        // Prepare an update statement
        include_once '../Model/updateClass.php';
        $updator = new updateClass();
        if ($updator->update($AdminID, $name, $address, $phase, $id)) {
            header("location: ../index.php");
        } else {
            echo "Something went wrong. Please try again later.";
        }
        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($link);
} else {

    // Check existence of id parameter before processing further
    if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
        // Get URL parameter
        $id = trim($_GET["id"]);
        include_once '../Model/ReadClass.php';
        $reader = new ReadClass();
        if ($row = $reader->readOneRecord($id)) {
            $ID = $row["ID"];
            $AdminID = $row["AdminID"];
            $name = $row["Name"];
            $address = $row["Address"];
            $phase = $row["Phase"];
        }
        else {
                    echo "Something went wrong. Please try again later.";

        }
    } else {
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>
