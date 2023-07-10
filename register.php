<?php
require_once('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration - PHP</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>

<div>
    <?php
        if(isset($_POST['submit'])) {

        $firstname      = $_POST['firstname'];
        $lastname       = $_POST['lastname'];
        $email          = $_POST['email'];
        $phonenumber    = $_POST['phonenumber'];
        $password       = $_POST['password'];

        $sql="INSERT INTO users (firstname, lastname, email, phonenumber, password ) VALUES (?,?,?,?,?)";
        $stmtinsert=$db->prepare($sql);
        $result=$stmtinsert->execute([$firstname, $lastname, $email, $phonenumber, $password]);
    } 
    ?>
</div>

<div>
    <form method="post" action="register.php">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <h1>Registraion</h1>
                    <p>Fill up the form correct values.</p>
                    <hr class="mb-3">
                    <label for = "firstname">Firstname: </label>
                    <input class="form-control" id = "firstname" type="text" name="firstname" required>

                    <label for = "lastname">Lastname: </label>
                    <input class="form-control" id = "lastname" type="text" name="lastname" required>

                    <label for = "email">Email: </label>
                    <input class="form-control" id = "email" type="email" name="email" required>

                    <label for = "phonenumber">Phone number: </label>
                    <input class="form-control" id = "phonenumber" type="tel" name="phonenumber" required>

                    <label for = "password">Password: </label>
                    <input class="form-control" id = "password" type="password" name="password" required>
                    <hr class="mb-3">

                    <input class="btn btn-primary" type="submit" name="submit" value="Sign Up">
                </div>
            </div>
        </div>
    </form>
</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script type="text/javascript">
        $(function(){
            $('#register').click(function(e){
                var valid = this.form.checkValidity();
                if(valid){
                    e.preventDefault();
                    alert('true');
                }else{
                    alert('false');
                }

                var firstname = $('#firstname').val();
                var lastname = $('#lastname').val();
                var email = $('#email').val();
                var phonenumber = $('#phonenumber').val();
                var password = $('#password').val();
            });
        });

            Swal.fire({
                title : 'Thankful',
                icon : 'success',
                theme : 'Dark',
                text : 'This is Registration Form',
                showCancelButton: true,
                focusConfirm: false
            })
    </script>
</body>
</html>