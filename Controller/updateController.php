<?php


// Include config file
// Define variables and initialize with empty values
$ID = $AdminID = $name = $address =  "";
$ID_err = $AdminID_err = $name_err = $address_err = "";

// Processing form data when form is submitted
if (isset($_POST["id"]) && !empty($_POST["id"])) {
    echo 'post';

    // Get hidden input value
    $ID = $_POST["id"];
    $AdminID = $_POST["AdminID"];

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

   

    // Check input errors before inserting in database
    if (empty($ID_err) && empty($AdminID_err) && empty($name_err) && empty($address_err)) {
        // Prepare an update statement
        include_once '../Model/updateClass.php';
        $updator = new updateClass();
        if ($updator->update($ID, $AdminID ,$name , $address)) {
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
