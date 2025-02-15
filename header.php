<nav class="navbar navbar-inverse navbar-top">
   <div class="container">
       <div class="navbar-header">
           <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
           </button>
           <a class="navbar-brand" href="index.php">
            <img src="img/Logo.png" alt="Logo" width="120" height="auto">
        </a>
       </div>
       <div class="collapse navbar-collapse" id="myNavbar">
           <ul class="nav navbar-nav navbar-right">
               <?php if(isset($_SESSION['email'])){ ?>
               <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
               <li><a href="settings.php"><span class="glyphicon glyphicon-cog"></span> Settings</a></li>
               <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
               <?php }else{ ?>
               <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
               <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
               <?php } ?>
           </ul>
           
           
           <div class="navbar-collapse collapse">
               <ul class="nav navbar-nav navbar-right">
                   <li class="dropdown">
                       <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-menu-hamburger"></span> Filters <span class="caret"></span></a>
                       <ul class="dropdown-menu" role="menu">
                           <li>
                               <div class="sidebar">
                                  
                                   <form method="get" action="">
                                       <label>Filter by Brand:</label><br>
                                       <input type="checkbox" name="brand[]" value="Dell" <?php if (isset($_GET['brand']) && in_array('Dell', $_GET['brand'])) echo 'checked'; ?>> Dell
                                       <input type="checkbox" name="brand[]" value="Acer" <?php if (isset($_GET['brand']) && in_array('Acer', $_GET['brand'])) echo 'checked'; ?>> Acer
                                       <input type="checkbox" name="brand[]" value="Lenovo" <?php if (isset($_GET['brand']) && in_array('Lenovo', $_GET['brand'])) echo 'checked'; ?>> Lenovo
                                       <br>
                                       <label>Sort By Price:</label>
                                       <select name="sort">
                                           <option value="price_asc" <?php if (isset($_GET['sort']) && $_GET['sort'] == 'price_asc') echo 'selected'; ?>>Low to High</option>
                                           <option value="price_desc" <?php if (isset($_GET['sort']) && $_GET['sort'] == 'price_desc') echo 'selected'; ?>>High to Low</option>
                                       </select>
                                       <br>
                                       
                                       <label>Filter by Category:</label><br>
                                        <input type="checkbox" name="Category[]" value="Gaming" <?php if (isset($_GET['Category']) && in_array('Gaming', $_GET['Category'])) echo 'checked'; ?>> Gaming
                                        <input type="checkbox" name="Category[]" value="Premium" <?php if (isset($_GET['Category']) && in_array('Premium', $_GET['Category'])) echo 'checked'; ?>> Premium
                                        <input type="checkbox" name="Category[]" value="Convertible" <?php if (isset($_GET['Category']) && in_array('Convertible', $_GET['Category'])) echo 'checked'; ?>> Convertible
                                        <input type="checkbox" name="Category[]" value="Mainstream" <?php if (isset($_GET['Category']) && in_array('Mainstream', $_GET['Category'])) echo 'checked'; ?>> Mainstream
                                        <br>
                                        
                                       <label>Graphics Card:</label><br>
                                       <input type="checkbox" name="gcard" value="1" <?php if (isset($_GET['gcard']) && $_GET['gcard'] == '1') echo 'checked'; ?>> With Graphics Card
                                       <input type="checkbox" name="gcard" value="0" <?php if (isset($_GET['gcard']) && $_GET['gcard'] == '0') echo 'checked'; ?>> Without Graphics Card
                                       <br>
                                       
                                       <label>RAM Size:</label><br>
                                        <input type="checkbox" name="ram_size[]" value="32GB" <?php if (isset($_GET['ram_size']) && in_array('32', $_GET['ram_size'])) echo 'checked'; ?>> 32GB
                                        <input type="checkbox" name="ram_size[]" value="16GB" <?php if (isset($_GET['ram_size']) && in_array('16', $_GET['ram_size'])) echo 'checked'; ?>> 16GB
                                        <input type="checkbox" name="ram_size[]" value="8GB" <?php if (isset($_GET['ram_size']) && in_array('8', $_GET['ram_size'])) echo 'checked'; ?>> 8GB
                                        <br>
                                        
                                        <label>Filter by RAM Type:</label><br>
                            
                            <input type="checkbox" name="ram_type[]" value="DDR4" <?php if (isset($_GET['ram_type']) && in_array('DDR4', $_GET['ram_type'])) echo 'checked'; ?>> DDR4
                            <input type="checkbox" name="ram_type[]" value="LPDDR4" <?php if (isset($_GET['ram_type']) && in_array('LPDDR4', $_GET['ram_type'])) echo 'checked'; ?>> LPDDR4
                            <input type="checkbox" name="ram_type[]" value="DDR5" <?php if (isset($_GET['ram_type']) && in_array('DDR5', $_GET['ram_type'])) echo 'checked'; ?>> DDR5
                            <input type="checkbox" name="ram_type[]" value="LPDDR5" <?php if (isset($_GET['ram_type']) && in_array('LPDDR5', $_GET['ram_type'])) echo 'checked'; ?>> LPDDR5

                            <br><br>


                                       <input type="submit" value="Apply Filter">
                                   </form>
                               </div>
                           </li>
                       </ul>
                   </li>
               </ul>
           </div>
           
           <form class="navbar-form navbar-right" action="products.php" method="GET">
               <div class="input-group">
                   <input type="text" class="form-control" placeholder="Search" name="query">
                   <div class="input-group-btn">
                       <button class="btn btn-default" type="submit">
                           <i class="glyphicon glyphicon-search"></i>
                       </button>
                   </div>
               </div>
           </form>
       </div>
   </div>
</nav>
