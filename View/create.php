

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Create Tower</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
        <style type="text/css">
            .wrapper{
                width: 500px;
                margin: 0 auto;
            }
        </style>
    </head>
    <body>
        <h1>Admin</h1>
        <div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-header">
                            <h2>Create Tower</h2>
                        </div>
                        <p>Please fill this form and submit to add Tower record to the database.</p>
                        <form action="../Controller/CreateController.php" method="post">
                            <div class="form-group <?php echo (!empty($ID_err)) ? 'has-error' : ''; ?>">
                                <label>ID</label>
                                <input type="text" name="ID" class="form-control" value="<?php echo $ID; ?>">
                                <span class="help-block"><?php echo $ID_err; ?></span>
                            </div>
                            <div class="form-group <?php echo (!empty($AdminID_err)) ? 'has-error' : ''; ?>">
                                <label>Admin ID</label>
                                <input type="text" name="AdminID" class="form-control" value="<?php echo $AdminID; ?>">
                                <span class="help-block"><?php echo $AdminID_err; ?></span>
                            </div>
                           <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                                <span class="help-block"><?php echo $name_err; ?></span>
                            </div>
                            <div class="form-group <?php echo (!empty($address_err)) ? 'has-error' : ''; ?>">
                                <label>Address</label>
                                <textarea name="address" class="form-control"><?php echo $address; ?></textarea>
                                <span class="help-block"><?php echo $address_err; ?></span>
                            </div>
                            
                            <input type="submit" class="btn btn-primary" value="Submit">
                            <a href="../index.php" class="btn btn-default">Cancel</a>
                        </form>
                    </div>
                </div>        
            </div>
        </div>
    </body>
</html>