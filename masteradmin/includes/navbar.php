
<nav class="navbar fixed-top navbar-light bg-white navbar-offcanvas">
<button class="navbar-toggler" type="button" id="navToggle"><span class="navbar-toggler-icon"></span> </button>

<a class="navbar-brand mr-auto ml-auto" href="#">Master Admin Pannel</a>



<div class="navbar-collapse offcanvas-collapse" >
<ul class="navbar-nav mr-auto ml-2">
<li class="nav-item">
    <a class="nav-link text-white font-weight-bold primary-color" data-toggle="modal" data-target="#loginModal"><i class="far fa-user"></i> Login & Signup</a></li>
<li class="nav-item active">
<a class="nav-link text-white" href="index.php?product=product">Add Product</a>
</li>
<div class="dropdown-divider"></div> 
<li class="nav-item">
<a class="nav-link text-white" href="index.php?brand=brand">Add Brand</a>
</li>
<div class="dropdown-divider"></div> 
 <li class="nav-item">
<a class="nav-link text-white" href="index.php?shop=shop">Add Shop</a>
</li>
<div class="dropdown-divider"></div> 
<li class="nav-item">
<a class="nav-link text-white" href="index.php?street=street">Add Street</a>
</li>
<div class="dropdown-divider"></div> 
<li class="nav-item">
<a class="nav-link text-white" href="index.php?city=city">Add City</a>
</li>
<div class="dropdown-divider"></div> 
<li class="nav-item">
<a class="nav-link text-white" href="index.php?district=district">Add District</a>
</li>
<div class="dropdown-divider"></div> 
<li class="nav-item">
<a class="nav-link text-white" href="index.php?catagory=catagory">Add Catagory</a>
</li>
<div class="dropdown-divider"></div> 
<li class="nav-item">
<a class="nav-link text-white" href="index.php?supcatagory=supcatagory">Add Super Catagory</a>
</li>
<div class="dropdown-divider"></div> 
<li class="nav-item">
<a class="nav-link text-white" href="index.php?subcatagory=subcatagory">Add Sub Catagory</a>
</li>

</ul>
</div>
<span class="navbar-text order-sm-6 d-none d-sm-block">
          <a href="#" style="text-decoration:none;" data-toggle="modal" data-target="#loginModal" id="login">
              <span class="fa fa-sign-in-alt"></span> Login & Signup 
          </a>
      </span>
</nav>
<div id="loginModal" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg" role="content">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title">Login</h4>
                    <button type="button" class="close"  data-dismiss="modal">
                        &times;
                    </button>
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col-sm-4 d-none d-sm-block bg-primary ml-3 rounded-top">
                    <h5 style="color:floralwhite" class="p-2 mt-2">Login here to access your Orders, Whishlist and offers</h5>
                  </div>
                  <div class="col-sm">
                    <form>
                            
                                <div class="form-group">
                                    <label for="email" class="col-md-2 col-form-lebel">Email</label>
                                    <div class="col-md-10">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email">
            
                                    </div>
                                </div>
                            <div class="form-group">
                                <label for="Password" class="col-md-2 col-form-lebel">Password</label>
                                <div class="col-md-10">
                                    <input type="Password" class="form-control" id="Password" name="Password" placeholder="Password">
        
                                </div>
                          </div>
                                <div class="col-sm-auto">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox">
                                        <label class="form-check-label"> Remember me
                                        </label>
                                    </div>
                                </div>
                            
                            <div class="col-sm-10 mt-3">
                                <button type="submit" class="btn btn-primary btn-block">Log in</button>        
                            </div>

                            <div class="mb-0 mt-5 ml-3">New Here? <a href="#" data-toggle="modal" data-target="#signinModal" data-dismiss="modal">Create an account</a></div>
                            </div>
                     </form>
                    </div>
                    </div>
              </div>
           </div>
        </div>
        <div id="signinModal" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg" role="content">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Signup</h4>
                          <button type="button" class="close"  data-dismiss="modal">
                              &times;
                          </button>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                        <div class="col-sm-4 d-none d-sm-block bg-primary ml-3 rounded-top">
                          <h5 style="color:floralwhite" class="p-2 mt-2">Signup here Securely. We do not share your personal details with anyone.</h5>
                        </div>
                        <div class="col-sm">
                          <form>
                              <div class="form-group">
                                  <label for="firstname" class="col-md-2 col-form-lebel">Name</label>
                                  <div class="col-md-10">
                                      <input type="text" class="form-control" id="firstname" name="name" placeholder="Your Name">
          
                                  </div>
                              </div>
                              <div class="form-group">
                                      <label for="lastname" class="col-md-12 col-form-lebel">Mobile no.</label>
                                      <div class="col-md-10">
                                          <input type="text" class="form-control" id="mob" name="mob" placeholder="Mobile no.">
              
                                      </div>
                              </div>
                                      <div class="form-group">
                                          <label for="email" class="col-md-2 col-form-lebel">Email</label>
                                          <div class="col-md-10">
                                              <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                  
                                          </div>
                                      </div>
                                  <div class="form-group">
                                      <label for="Password" class="col-md-2 col-form-lebel">Password</label>
                                      <div class="col-md-10">
                                          <input type="Password" class="form-control" id="Password" name="Password" placeholder="Password">
              
                                      </div>
                                </div>
                                      <div class="col-sm-auto">
                                          <div class="form-check">
                                              <input class="form-check-input" type="checkbox">
                                              <label class="form-check-label"> Remember me
                                              </label>
                                          </div>
                                      </div>
                                  
                                  <div class="col-sm-10 mt-2">
                                      <button type="submit" class="btn btn-primary btn-block">Sign Up</button>        
                                  </div>
                                  <div class="mb-0 mt-3 ml-3">Already have an account? <a href="#" data-toggle="modal" data-target="#loginModal" data-dismiss="modal">Login Here</a></div>
                                </div>
                                 
                           </form>
                          </div>
                          </div>
                    </div>
                 </div>
              </div>
        </div>