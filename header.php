
<head>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap" rel="stylesheet">
<script src= "hamburger.js">

</head>
<!-- Alert -->


<nav class="shadow-sm  sticky-top p-3" id="myNavbar">
    <div class="container  d-flex justify-content-between justify-content-center align-items-center  ">
        <div class="logo">
            <h4>NOteSHarE</h4>
        </div>

        <div class="navlist d-md-flex d-none" id="navbarToggleExternalContent border">
            <ul class=" d-flex justify-content-center align-items-center">
                <li><a href="#">Home</a></li>
                <li class="dropdown explore_dropdown"><a class="dropdown-toggle" href="#" id="navbardrop"
                        data-toggle="dropdown">Explore</a>
                    <div class="dropdown-menu">
                        <h6 class="dropdown-header">Explore By Category</h6>
                        <?php include_once "connection.php"; 
                                $sql = "SELECT * FROM category";
                                $res = mysqli_query($conn,$sql);
                            ?>
                                <?php if(mysqli_num_rows($res) > 0) :?> 
                                <?php  while($row = mysqli_fetch_assoc($res)) :?>
                                  
                                  <?php
                                    echo '
                                 
                                    <a class="dropdown-item" href="category.php?category='.$row['cat_name'].'">'.$row['cat_name'].'</a>
                               
                                    ';
                                    ?>
                                  
                                      <?php endwhile; ?>
                                    <?php endif; ?>
                      </div>
                </li>

                <li><a href="#about">About</a></li>

               
               
                <?php  if(isset($_SESSION['email'])): ?>
                <div id="profile" class="user_profile d-flex justify-content-center align-items-center dropdown">
                    <a class="dropdown-toggle" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="profiledrop" href='#'>
                        <?php echo strtoupper(substr($_SESSION['email'],0,1)) ; ?></a>
                    <div class="dropdown-menu" aria-labelledby="profiledrop">

                        
                        <a class="dropdown-item" href="userownprofile.php">Profile</a>
                        <a class="dropdown-item" href="logout.php">logout</a>

                    </div>

                </div>
                <?php else :?>
                <li> <a class="sign" data-toggle="modal" data-target="#myModal">Sign in</a></li>

                <?php endif; ?>
            </ul>
        </div>


        <div class="hamburger d-md-none d-sm-block">

            <img src="images/icon-hamburger.svg">

        </div>
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Login</h4>
                    </div>
                    <div class="modal-body">
                        <form action="login.php" method="post">
                            <div class="form-group">
                                <label for="email">Email address:</label>
                                <input type="email" class="form-control" placeholder="Enter email" id="email"
                                    name="email">
                            </div>
                            <div class="form-group">
                                <label for="pwd">Password:</label>
                                <input type="password" class="form-control" placeholder="Enter password" id="pwd"
                                    name="password">
                            </div>

                            Not a member?<a href="signup.php">Sign up</a><br>
                            <button type="submit" class="btn btn-primary" name="signin">signin</button>
                        </form>
                    </div>

                </div>

            </div>
        </div>


</nav>
