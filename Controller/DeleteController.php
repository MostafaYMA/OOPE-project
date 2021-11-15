
<?php

// Process delete operation after confirmation
if (isset($_POST["id"]) && !empty($_POST["id"])) {
    $ID == $_POST["id"];
    // Prepare a delete statement
    include_once '../Model/DeleteClass.php';
    $delete = new DeleteClass();
    if ($delete->delete($ID)) {
        header("location: ../index.php");
    } else {
        echo "Something went wrong. Please try again later.";
    }
} else {
    // Check existence of id parameter
    if (empty(trim($_GET["id"]))) {
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>
