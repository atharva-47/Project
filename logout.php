<?php
    session_start();
    session_unset();
    session_destroy();
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon" href="img/lifestyleStore.png" />
        <title>GrandLine Laptops</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
        
        <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
        
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        
        <link rel="stylesheet" href="css/style.css" type="text/css">

        <style>
       
        .navbar {
            background-color: #333; 
            border-radius: 0; 
            border: none; 
        }

        
        .navbar-nav > li > a {
            color: #fff; 
            font-size: 16px; 
        }

        
        .navbar-brand {
            color: #fff; 
            font-weight: bold; 
        }

        
        .navbar-toggle .icon-bar {
            background-color: #fff; 
        }

        
        .dropdown-menu {
            background-color: #333; 
        }

       
        .dropdown-menu > li > a {
            color: #fff; 
        }

        
        .navbar-form {
            margin-right: 15px; 
        }

       
        .navbar-form .form-control {
            border-color: #ccc; 
        }

        
        .navbar-form .btn-default {
            background-color: #333; 
            color: #fff; 
        }

        
        @media (max-width: 767px) {
            
            .navbar-nav {
                float: none;
                margin: 0;
                text-align: center;
            }

            
            .navbar-nav > li {
                display: inline-block;
            }

            
            .navbar-toggle {
                display: block;
            }
        }

        .sidebar {
            background-color: white;
            padding: 30px;
            width: 300px;
        }
    </style>
    </head>
    <body>
        <div>
            <?php
                require 'header.php';
            ?>
            <br>
            <div class="container">
                <div class="row">
                    <div class="col-xs-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading"></div>
                            <div class="panel-body">
                                <p>You have been logged out. <a href="login.php">Login again.</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer">
               <div class="container">
                <center>
                   <p>Copyright &copy <a href="https://sbsales.in">sbsales</a> Store. All Rights Reserved.</p>
                   <p>This website is developed by The Wolfpack</p>
               </center>
               </div>
           </footer>
        </div>
    </body>
</html>
