<p class="mt-2 font-weight-light"><small> <a href="index">Home</a> > <a href="scat?sid=<?php echo $supid;?>"><?php echo $supcat;?></a> > <?php echo $product;?> </small></p>
               <div class="row">
                <div class="col-sm-9 col-6"> 
            <?php    if ($result = $conn->query("SELECT DISTINCT i.prodid FROM items i INNER JOIN product p ON p.id=i.prodid where subid=$subid")) {
                /* determine number of rows result set */
                $row_cnt = $result->num_rows;
                }?>
                    <h5 class="d-none d-sm-block"><?php echo $product;?> (<?php echo $row_cnt;?>)</h5>
                    <h6 class="d-block d-sm-none"><?php echo $product;?> (<?php echo $row_cnt;?>)</h6>
                </div> 
                <div class="ml-auto col w-25 mr-sm-3 mr-0">
                    <select class="custom-select">
                        <option value="1">Popularity</option>
                        <option value="2">Price - Low to High</option>
                        <option value="3">Price - How to Low</option>
                        <option value="3">A-Z</option>

                    </select>
                </div>
               </div>
               <hr>
               <div class="row">
               <?php 
               $sql = "SELECT * FROM product where subid = $subid";
                                            $result = $conn->query($sql);
                                            if ($result->num_rows > 0) {
                                             while($rows = $result->fetch_assoc()) {
                                               $productid = $rows['id'];
                                              $sql1 = "SELECT * FROM items where prodid = $productid";
                                              $result1 = $conn->query($sql1);
                                              if ($result1->num_rows > 0) {

                                        ?>
                    <div class="col-12 col-md-3 mb-2">
                            <div class="card h-100">
                              <a href="subcat?subid=<?php echo $subid;?>&catid=<?php echo $rows['catagoryid'];?>&prodid=<?php echo $rows['id'];?>"><img class="card-img-top img-fluid p-sm-2 w-50 offset-3 mt-3" src="assets/image/product/<?php echo $rows['image'];?>" alt=""></a>
                              <div class="card-body">
                                <h5 class="card-title">
                                  <p class="text-center"><?php echo $rows['name'];?></p>
                                </h5>
                                <p class="text-center small">Market Price: Rs. <?php echo $rows['mrp'];?> (per <?php echo $rows['unit'];?>)</p>
                              </div>
                                <table class="table table-striped ml-0">
                                  <tr>   
                                  <td class="font-weight-bold text-center"><h5>Best Offer</h5></td>
                                  <td><h5><span class="badge badge-danger">50% OFF</span></h5></td> 
                                  </tr>
                                  <tr>   
                                  <td class="font-weight-bold text-center" colspan="2"> <a href="subcat?subid=<?php echo $subid;?>&catid=<?php echo $rows['catagoryid'];?>&prodid=<?php echo $rows['id'];?>" type="button" class="btn btn-outline-primary btn-block waves-effect">Browse Shops</a></td> 
                                  </tr>
                                 
                                </table>
                              
                             
                            </div>
                     </div>
                                              <?php }
                                             }
                                            }
                                             ?>
                
          