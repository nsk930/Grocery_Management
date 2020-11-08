
<nav class="navbar fixed-top navbar-light bg-white navbar-offcanvas">
<button class="navbar-toggler" type="button" id="navToggle"><span class="navbar-toggler-icon"></span> </button>

<a class="navbar-brand mr-auto ml-auto" href="#">Shopkeeper's Admin Pannel</a>



<div class="navbar-collapse offcanvas-collapse" >
<ul class="navbar-nav mr-auto ml-2">

<?php if (!isset($_SESSION['email'])) 
    { ?>
    <li class="nav-item">
    <a class="nav-link text-white font-weight-bold primary-color" href="login"><i class="far fa-user"></i> Login & Signup</a></li>
    <?php }
    else{?>
    <li class="nav-item">
 <a class="nav-link text-white font-weight-bold primary-color" href="logout"><i class="far fa-user"></i> Logout</a>
 </li>

 <li class="nav-item dropdown">
<a class="nav-link dropdown-toggle text-white" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Add Items</a>
<div class="dropdown-menu" aria-labelledby="dropdown01">
<?php 
       $sql = "SELECT * FROM storemanager WHERE email='$email'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
                $uid = $row['uid'];
                $sql1 = "SELECT * FROM store WHERE storemanagerid='$uid'";
                $result1 = $conn->query($sql1);
                if ($result1->num_rows > 0) {
                    while($rows = $result1->fetch_assoc())
                    {
                    $storeid = $rows['id'];
                    $storename= $rows['name'];
            ?>
<a class="dropdown-item" href="index.php?items=items&storeid=<?php echo $storeid;?>"><?php echo $storename;?></a>
                    <?php }
                }
            }?>
</div>
</li>
<div class="dropdown-divider"></div> 
<li class="nav-item">
<a class="nav-link text-white" href="index.php?buisness=buisness">Add your Buisness</a>
</li>
<?php
    }
    ?>
</ul>
</div>
<?php 
       $sql = "SELECT * FROM storemanager WHERE email='$email'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
                $uid = $row['uid'];
                $sql1 = "SELECT * FROM store WHERE storemanagerid='$uid'";
                $result1 = $conn->query($sql1);
                if ($result1->num_rows > 0) {
                    while($rows = $result1->fetch_assoc())
                    {
                    $storeid = $rows['id'];
                    $storename= $rows['name'];
                    echo $storeid;
                    }
                }
            }
                    ?>
<span class="navbar-text order-sm-6 d-none d-sm-block">
<?php if (!isset($_SESSION['email'])) 
    { ?>
          <a href="login" style="text-decoration:none;" >
              <span class="fa fa-sign-in-alt"></span> Login & Signup 
          </a>
    <?php }
    else{?>
     <a href="logout" style="text-decoration:none;" >
              <span class="fa fa-sign-in-alt"></span> Logout
          </a>
          <?php
    }
    ?>
      </span>
</nav>
