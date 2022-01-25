<?php
session_start();
include_once('db_con.php');
if(isset($_POST['UserID']) && isset($_POST['password'])) {
  function validate($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
$UserID = validate($_POST['UserID']);
$password = validate($_POST['password']);
if(empty($UserID)){
  header("Location: index.php?error=User Id is required");
  exit();
}else if (empty($pass)){
  header("Location: index.php?error=password is required");
  exit();
}
$sql = "SELECT * FROM users WHERE UserID='$UserID' AND password='$password'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) === 1){
  $row = mysqli_fetch_assoc($result);
  if($row['UserID'] === $UserID && $row['password'] === $password) {
    $_SESSION['UserID'] = $row['UserID'];
    $_SESSION['name'] = $row['Name'];
    header("Location: home.php");
    exit();
  }else {
            header("Location: index.php?error=Incorrect User ID or password");
    exit();
  }
}else{
			header("Location: index.php?error=Incorect User name or password");
	        exit();
		}

}else{
       header("Location: index.php");
  exit();
}
    
