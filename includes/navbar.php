<script>
function lightbg_clr() {
	$('#qu').val("");
	$('#textbox-clr').text("");
 	$('#search-layer').css({"width":"auto","height":"auto"});
	$('#livesearch').css({"display":"none"});	
	$("#qu").focus();
 };
 
function fx(str)
{
var s1=document.getElementById("qu").value;
var xmlhttp;
if (str.length==0) {
    document.getElementById("livesearch").innerHTML="";
    document.getElementById("livesearch").style.border="0px";
	document.getElementById("search-layer").style.width="auto";
	document.getElementById("search-layer").style.height="auto";
	document.getElementById("livesearch").style.display="block";
	$('#textbox-clr').text("");
    return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("livesearch").innerHTML=xmlhttp.responseText;
	document.getElementById("search-layer").style.width="100%";
	document.getElementById("search-layer").style.height="100%";
	document.getElementById("livesearch").style.display="block";
	$('#textbox-clr').text("X");
    }
  }
xmlhttp.open("GET","call_ajax.php?n="+s1,true);
xmlhttp.send();	
}
</script>    
<!-- Navigation -->
<header>
<nav class="navbar navbar-expand-lg navbar-offcanvas navbar-dark fixed-top z-depth-2">
      <div class="container-fluid">
    <button class="navbar-toggler order-1 ml-0 text-white" type="button" id="navToggle">
              <i class="fas fa-bars"></i>
        </button>
        
        <a class="navbar-brand  text-white ml-0 order-2 order-sm-1" href="./index"><i class="fa fa-shopping-basket"></i> Grocery Mart</a>
        <div class="mt-2 ml-sm-4 mt-sm-0 col-sm-7 order-5 order-sm-2">
  <div class="srbox">
			<form action="searchresult.php" method="post">
			  <div class="bk">
          
                  <input onKeyUp="fx(this.value)" autocomplete="off" name="qu" id="qu" type="text" class="form-control" placeholder="Search for products, brands and more"/>  
                  <button type="submit" class="query-submit" tabindex="2" style="display:none"></button>
		    	<div id="livesearch"></div>    
          </div>
        </form>
          </div>
</div>
        <div class="navbar-collapse order-6 order-sm-3 offcanvas-collapse">
          <ul class="navbar-nav mr-auto">
          <?php if (!isset($_SESSION['email'])) 
    { ?>
              <li class="nav-item"><a href="login" class="nav-link font-weight-bold primary-color"><i class="far fa-user"></i> Login & Signup</a></li>
    <?php }else{?>
      <li class="nav-item"><a href="logout" class="nav-link font-weight-bold primary-color"><i class="far fa-user"></i> Logout</a></li>
    <?php } ?>
              <li class="nav-item ml-2"><a class="nav-link small" href="#"><i class="fas fa-address-card"></i> My Addresses</a></li>
              <li class="nav-item ml-2"><a class="nav-link small" href="#"><i class="fas fa-shopping-cart"></i> My Cart</a></li>
              <li class="nav-item ml-2"><a class="nav-link small" href="#"><i class="fas fa-percent"></i> My Offers</a></li>
              <li class="nav-item ml-2"><a class="nav-link small" href="myorder"><i class="fas fa-shopping-bag"></i> My Orders</a></li>
              <li class="nav-item ml-2"><a class="nav-link small" href="#"><i class="fas fa-user"></i> My Account</a></li>
              <li class="nav-item"><a class="nav-link font-weight-bold unique-color"><i class="fas fa-shopping-cart"></i> Catagory <i class="fas fa-chevron-down"></i></a></li>
              <li class="nav-item ml-2"><a class="nav-link small" href="scat?sid=5">Vegetables & Fruits</a></li>
              <li class="nav-item ml-2"><a class="nav-link small" href="scat?sid=9">Biscuits, Snacks & Chocolates</a></li>
              <li class="nav-item ml-2"><a class="nav-link small" href="scat?sid=7">Household Items</a></li>
              <li class="nav-item ml-2"><a class="nav-link small" href="scat?sid=12">Noodles, Sauces and Instant Food</a></li>
              <li class="nav-item ml-2"><a class="nav-link small" href="scat?sid=10">Beverages</a></li>
             <hr>
              <li class="nav-item ml-2"><a class="nav-link small" href="#">FAQ</a></li>
              <li class="nav-item ml-2"><a class="nav-link small" href="#">About us</a></li>
              <li class="nav-item ml-2"><a class="nav-link small" href="#">Terms and Conditions</a></li>
           
            
          </ul>
        </div>
        <span class="navbar-text dropdown d-none d-sm-block order-sm-4">
            <a class="nav-link dropdown-toggle text-white" id="navbarDropdownMenuLink" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">More</a>
            <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="#"><i class="fas fa-user"></i> My Account</a>
              <a class="dropdown-item" href="myorder"><i class="fas fa-shopping-bag"></i> My Orders</a>
              <a class="dropdown-item" href="#"><i class="fas fa-address-card"></i> My Addresses</a>
              <a class="dropdown-item" href="#">FAQ</a>
              <a class="dropdown-item" href="#">About us</a>
            </div>
          </span>
        <span class="navbar-text order-3 order-sm-5 d-none d-sm-block ml-5 ml-sm-auto mr-sm-4">
            <a href="cart" id="cart" class="text-white">
                <i class="fa-sm fa fa-cart-plus"></i> Cart <?php $i=0; if(!empty($_SESSION["cartitem"])) {?><span class="badge badge-pill badge-light"><?php
			foreach($_SESSION["cartitem"] as $k => $v) {$i++;} echo $i; ?></span><?php }?>
            </a>
        </span>
        <span class="navbar-text order-3 order-sm-4 d-block d-sm-none mr-1 ml-sm-auto">
            <a href="cart" id="cart"  class="text-white">
                <span class="fa-md fa fa-cart-plus"></span> 
            </a>
        </span>
  
        <!--<span class="navbar-text order-4 d-block d-sm-none small mr-3">
          <a href="#" style="text-decoration:none;" data-toggle="modal" data-target="#loginModal" id="login" class="text-white">
              <span class="fa fa-sm fa-sign-in-alt"></span> Login 
          </a>
      </span>-->
      <span class="navbar-text order-sm-6 d-none d-sm-block">
          <?php if (!isset($_SESSION['email'])) 
    { ?>
    <li class="nav-item">
    <a href="login" style="text-decoration:none;" id="login" class="text-white">
              <span class="fa fa-sign-in-alt"></span> Login & Signup 
          </a>  <?php }
    else{?>
    <li class="nav-item">
    <a href="logout" style="text-decoration:none;" id="login" class="text-white">
              <span class="far fa-user"></span> Logout
          </a>
 </li>
    <?php } ?>
      </span>
      </div>
    </nav>
    </header>
 