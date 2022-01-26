
<?php

// Process delete operation after confirmation
if (isset($_POST["ID"]) && !empty($_POST["id"])) {
    $id == $_POST["id"];
    // Prepare a delete statement
    include_once '../Model/DeleteClass.php';
    $delete = new DeleteClass();
    if ($delete->delete($id)) {
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
