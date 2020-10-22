<!-- Harvir Singh -->
<div class="navbar navbar-inverse navbar-static-top" role="navigation">
    <div class="container">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="products.php"><img class="logo" src="uploads/images/redtongue.png"></a>
            <a class="navbar-brand" href="products.php">Sticker Tongue</a>
        </div>

        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">

                <li <?php echo $page_title=="Products" ? "class='active'" : ""; ?>>
                    <a href="products.php" class="dropdown-toggle">Products</a>
                </li>
                <li <?php echo $page_title=="Contact Us" ? "class='active'" : ""; ?>>
                    <a href="contactform.php" class="dropdown-toggle">Contact</a>
                </li>

                <li <?php echo $page_title=="Contact Us" ? "class='active'" : ""; ?>>
                    <a href="googlemaps.php" class="dropdown-toggle">Location</a>
                </li>

                <li <?php echo $page_title=="Cart" ? "class='active'" : ""; ?> >
                    <a href="cart.php">
                      <?php

                      $cart_count=count($_SESSION['cart']);
                      ?>
                        Cart
                    </a>
                </li>
            </ul>

            <?php
            include_once "template2.php";
 ?>


            <?php
            if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['access_level']=='Customer'){
            ?>
            <ul class="nav navbar-nav navbar-right">
              <li <?php echo $page_title=="Edit Profile" ? "class='active'" : ""; ?>>
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                  <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                  &nbsp;&nbsp;<?php echo $_SESSION['firstname'];
                  ?>
                  &nbsp;&nbsp;<span class="caret"></span>
                </a>
                <ul class="dropdown-menu" role="menu">
                  <li <?php echo $page_title=="Log-in" ? "class='active'" : ""; ?>>
                                <a href="profile.php" class="dropdown-toggle">View Profile</a>
                            </li>
                  <li <?php echo $page_title=="Log-in" ? "class='active'" : ""; ?>>
                      <a href="logout.php" class="dropdown-toggle">Logout</a>
                  </li>
                </ul>
              </li>
            </ul>
            <?php
          } else {
            ?>
            <ul class="nav navbar-nav navbar-right">
              <li <?php echo $page_title=="Log-in" ? "class='active'" : ""; ?>>
                  <a href="login.php" class="dropdown-toggle">Login</a>
              </li>

              <li <?php echo $page_title=="Register" ? "class='active'" : ""; ?>>
                  <a href="register.php" class="dropdown-toggle">Register&nbsp;&nbsp;&nbsp;</a>
              </li>
            </ul>

            <?php
          }

            ?>

        </div>

    </div>
</div>
