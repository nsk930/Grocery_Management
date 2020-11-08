<?php
include('config.php');
$s1=$_REQUEST["n"];
$select_query="select * from product where name like '%".$s1."%'";
$sql=mysqli_query($db,$select_query);
$s="";
while($row = mysqli_fetch_assoc($sql))
{
	$s=$s."
	<a class='link-p-colr' href='subcat?subid=".$row['subid']."&catid=".$row['catagoryid']."&prodid=".$row['id']."'>
		<div class='live-outer'>
            	<div class='live-im'>
                	<img src='assets/image/product/".$row['image']."'/>
                </div>
                <div class='live-product-det'>
                	<div class='live-product-name'>
                    	<p>".$row['name']."</p>
                    </div>
                    <div class='live-product-price'>
						<div class='live-product-price-text'><p>Rs.".$row['mrp']."/.".$row['unit'].".</p></div>
                    </div>
                </div>
            </div>
	</a>
	"	;
}
echo $s;
?>