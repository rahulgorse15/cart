<?php
include'header.php';

?>
<!DOCTYPE html>
<html>
<head>
	<title>product list</title>
</head>
<body>
	<br>
<table border="1" style="border-color:  darkmagenta" width="100%">
	<tr>
		<td colspan="4">
			<?php
				include'home.php';
			?>
		</td>
		<td colspan="8">
			<table border="1" width="100%">
				<tr>
					<form method="post">
					<th colspan="12" style="background-color:  darkmagenta;color: white">
						<center>Product Filter</center>
					</th>
				</tr>
				<tr>
					
						<td colspan="2">Product</td>
						<td colspan="2"><input type="text" placeholder="product name" name="product"></td>
						<td colspan="2">Price Range</td>
						<td colspan="2"><input type="text" name="fro" placeholder="price from"></td>
						<td colspan="2"><input type="text" name="to" placeholder="price from"></td>
						
					
				</tr>
				<tr>
					
						<td colspan="2">Product Brand</td>
						<td colspan="2">

							<select name="brands">
								<option>Select</option>
								<?php
									foreach ($brand as $key => $value) {
										?>
										
										<option><?php print_r($brand[$key]['brand_name']); ?></option>

										<?php

									}

								?>

							</select>
						</td>
						<td colspan="2">Product Quentity</td>
						<td colspan="2"><input type="text" name="qtyfrom" placeholder="qty from"></td>
						<td colspan="2"><input type="text" name="qtyto" placeholder="qty from"></td>
				</tr>
				<tr colspan="5">
					<td colspan="12">
						<center>
							<input type="submit" name="SEARCH">
							<input type="reset" name="RESET"></td>
						</center>
									
					</td>
					
				</tr>
					</form>
			</table>
			<br>
			<table width="100%">
				<tr>
					<th colspan="4" style="color:  darkmagenta"> 
						<center> Product List</center>
					</th>
					<th style="padding-left: 0%">
						<form method="post">
						<span  style="color:  darkmagenta">	SORT 
						
						<select name="sorted">
							<option>Price Low to High</option>
							<option>Price High to Low</option>
						</select>
						<input type="submit" name="sort">
						
						</span>
						</form>
					</th>
				</tr>
				<tr>
					<td>
						<table>
							<tr>
							<br>
							<?php if($result>0){
								foreach ($result as $key => $value) {
									?><td>&nbsp;&nbsp;&nbsp;</td>
									<td  style="border: 1px solid black ; width: 50% ; padding: 5px" hight="200px">
										<form method="post">
										<div>
											<?php print_r("<img src='./photo/".$result[$key]['p_image']."' style='max-height: 170px; width:200px' alt=".$result[$key]['p_image'].">");?>
										</div>
										<div><?php print_r($result[$key]['p_title']) ?></div>
											<div>Available Quantity: <?php print_r($result[$key]['p_quantity']) ?></div>
										<div>select Quantity
											<select name="qty">
											<?php $n=$result[$key]['p_quantity'];
											for($i=1;$i<=$n;$i++){
												?>
													<option><?php echo $i; ?></option>
												<?php
											}
											 ?></select></div>
											<input type="hidden" name="price" value=<?php print_r($result[$key]['price']) ?>>
										<input type="hidden" name="product_id" value=<?php print_r($result[$key]['product_id']) ?>>
											<input type="hidden" name="p_id" value=<?php print_r($result[$key]['price_id']) ?>>
									
										<div><?php print_r("₹".$result[$key]['price']) ?></div>
										<div>
											<input type="submit" value="ADD TO CART" name="addtocart">
										</div>
										
										
										
										
										</form>
									</td>

									<?php
								}
							}
							else {
								echo "No Record Available";
							}
							?>
						</tr>
						</table>
						<br>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
</body>
</html>