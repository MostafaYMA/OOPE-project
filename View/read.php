
<!DOCTYPE html>
<?php
include_once '../Controller/readController.php';
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>View tower</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
        <style type="text/css">
            .wrapper{
                width: 500px;
                margin: 0 auto;
            }
        </style>
    </head>
    <body>
        <div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <form action="../Controller/readController.php" method="post">

                            <div class="page-header">
                                <h1>View tower</h1>
                            </div> 
                            <div class="form-group">
                                <label>ID</label>
                                <p class="form-control-static"><?php echo $row["ID"]; ?></p>
                            </div>
                             <div class="form-group">
                                <label>AdminID</label>
                                <p class="form-control-static"><?php echo $row["AdminID"]; ?></p>
                            </div>
                            <div class="form-group">
                                <label>Name</label>
                                <p class="form-control-static"><?php echo $row["Name"]; ?></p>
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <p class="form-control-static"><?php echo $row["address"]; ?></p>
                            </div>
                            <div class="form-group">
                                <label>Phase</label>
                                <p class="form-control-static"><?php echo $row["Phase"]; ?></p>
                            </div>
                            <p><a href="../index.php" class="btn btn-primary">Back</a></p>
                        </form>
                    </div>
                </div>        
            </div>
        </div>
    </body>
</html>