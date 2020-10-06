<!DOCTYPE HTML>
<html>
    <head>
        <title>Add Customer</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
        <style type="text/css">
            .login-form {
                width: 340px;
                margin: 50px auto;
            }
            .login-form form {
                margin-bottom: 15px;
                background: #f7f7f7;
                box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
                padding: 30px;
            }
            .login-form h2 {
                margin: 0 0 15px;
            }
            .form-control, .btn {
                min-height: 38px;
                border-radius: 2px;
            }
            .btn {        
                font-size: 15px;
                font-weight: bold;
            }
        </style>
    </head>
<body>
    <div class="login-form">
    <form name="formlogin" method="post" action="add_customer_submit.php">
        <h2 class="text-center">Add Customer</h2>
        <div class="form-group">
            <input type="text" name="nama" class="form-control" placeholder="Nama">
        </div>
        <div class="form-group">
            <input type="text" name="nohp" class="form-control" placeholder="No HP"/>
        </div>
        <div class="form-group">
            <input type="text" name="email" class="form-control" placeholder="Email"/>
        </div>
        <div class="form-group">
        <input type="password" name="password" class="form-control" placeholder="Password"/>
        </div>
        <div class="form-group">
            <input type="text" name="alamat" class="form-control" placeholder="Alamat"/>
        </div>
        <!-- <div class="form-group">
            <label for="userfile">Upload profile photo (File allowed : jpg, jpeg, png or gif) :</label>
            <input type="file" name="userfile" id="userfile"/>
        </div> -->
        <div class="form-group">
            <button type="submit" name="Submit" class="btn btn-primary btn-block">Submit</button>
        </div>     
    </form>
    </div>
</body>
</html>