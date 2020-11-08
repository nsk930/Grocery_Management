<?php 
    error_reporting(0); 
$catid = $_GET['catid'];
$catid = test_input($_GET["catid"]);
$prodid = $_GET['prodid'];
$prodid = test_input($_GET["prodid"]);
$sql = "SELECT * FROM catagory where id=$catid";
$sql1 = "SELECT * FROM product where id=$prodid";
$result = $conn->query($sql);
$result1 = $conn->query($sql1);
if ($result->num_rows > 0 && $result1->num_rows > 0) {
    $row = $result->fetch_assoc();
    $rows = $result1->fetch_assoc();
$catagory = $row['name'];
$catid= $row['id'];
$item = $rows['name'];
$prodid= $rows['id'];
$unit = $rows['unit'];

}else{
    echo"<script>window.open('index','_self')</script>"; 
}
?>

<p class="mt-2 font-weight-light"><small> <a href="index">Home</a> > <a href="scat?sid=<?php echo $supid;?>"><?php echo $supcat;?></a> > <a href="subcat?subid=<?php echo $subid;?>"><?php echo $product;?></a> > <a href="subcat?subid=<?php echo $subid;?>&catid=<?php echo $catid;?>"><?php echo $catagory;?></a> > <?php echo $item;?> </small></p>
               <div class="row">
                <div class="col-sm-9 col-6"> 
            <?php    if ($result = $conn->query("SELECT * FROM items where prodid = $prodid")) {
                /* determine number of rows result set */
                $row_cnt = $result->num_rows;
                }?>
                    <h5 class="d-none d-sm-block">Shops having <?php echo $item;?> (<?php echo $row_cnt;?>)</h5>
                    <h6 class="d-block d-sm-none">Shops having <?php echo $item;?> (<?php echo $row_cnt;?>)</h6>
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
               $sql = "SELECT * FROM items where prodid = $prodid";
                                            $result = $conn->query($sql);
                                            if ($result->num_rows > 0) {
                                             while($rows = $result->fetch_assoc()) {
                                               $storeid=$rows['storeid'];
                                               $sql1 = "SELECT * FROM store where id = $storeid";
                                               $result1 = $conn->query($sql1);
                                               if ($result1->num_rows > 0) {
                                                $row = $result1->fetch_assoc();
                                                $storename=$row['name'];
                                                $image=$row['image'];
                                                $rate = $rows['rate'];
                                                $storeid = $row['id'];
                                        ?>
                   <div class="col-12 col-lg-3 col-md-3 mb-4">
                            <div class="card h-100">
                              <a href="shop?storeid=<?php echo $storeid;?>"><img class="card-img-top img-fluid h-100" src="assets/image/shops/<?php echo $image;?>" alt=""></a>
                              <div class="card-body">
                                <h5 class="card-title">
                                  <a href="shop?storeid=<?php echo $storeid;?>"><?php echo $storename;?></a>
                                </h5>
                                <h6>Rs. <?php echo $rate;?> (per <?php echo $unit;?>)</h6>
                                </div>
                              <div class="card-footer">
                                <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                              </div>
                            </div>
                     </div>
                   <?php 
                                             }
                                            }
                                          }
                                             ?>
                
          