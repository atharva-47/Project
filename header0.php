<?php session_start(); ?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            <img src="img/Logo.png" alt="Logo" width="120" height="auto">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <?php if(isset($_SESSION['email'])){ ?>
                <li class="nav-item">
                    <a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart mr-1"></i>Cart</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="settings.php"><i class="fas fa-cog mr-1"></i>Settings</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt mr-1"></i>Logout</a>
                </li>
                <?php }else{ ?>
                <li class="nav-item">
                    <a class="nav-link" href="signup.php"><i class="fas fa-user-plus mr-1"></i>Sign Up</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php"><i class="fas fa-sign-in-alt mr-1"></i>Login</a>
                </li>
                <?php } ?>
            </ul>
            <form class="form-inline my-2 my-lg-0" action="products.php" method="GET">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search" name="query">
                    <div class="input-group-append">
                        <button class="btn btn-outline-light" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</nav>
