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
					
					<th colspan="12" style="background-color:  darkmagenta;color: white">
						<center>Product Cart</center>
					</th>
				</tr>
				<tr>
					<td>Action</td>
					<td>Image</td>
					<td>product Name</td>
					<td>Quantity</td>
					<td>price quantity</td>
					<td>total price</td>
				</tr>
				<tr>
					<form method="post">
					<?php 
					 $total=0;
					 if($result>0){
					foreach ($result as $key => $value) {

						?>
						<tr>
						<td><button><b><?php echo '<a href="index.php?op=delete&id='.$result[$key]['temp_id'].'">DELETE</a>'?></b></button></td>
							<td><?php print_r("<img src='./photo/".$result[$key]['p_image']."' style='max-height: 170px;' alt=".$result[$key]['p_image'].">");?></td>
							<td><?php print_r($result[$key]['p_title']);  ?></td>
							<td><select name="qty[]">
										<option><?php print_r($result[$key]['qty']); ?>	</option>
										<?php
										 $n=$result[$key]['p_quantity'];
											for($i=1;$i<=$n;$i++){
												?>
													<option><?php echo $i; ?></option>
												<?php
											}
											 ?></select>
											 <br>
								<?php print_r("Available Quantity   ".$result[$key]['p_quantity']);  ?></td>
							<td><?php print_r($result[$key]['price']);  ?></td>
							<td><label><?php print_r($result[$key]['total']);  ?></label></td>
						</tr>
								<?php  $total=$total+$result[$key]['total'] ?>
						<?php
							}
						}
						else{

							echo "<td clospan='12'>NO Item Available Into Cart </td>";
						}
					?>

				</tr>
				<tr>
					<td style="background-color:  darkmagenta;color: white" colspan="3">SUB TOTAL</td>
					<td style="color:  darkmagenta"><input type="submit" name="submit" value="UPDATE QUANTITY"> </td>
					<td></td>
					<td><?php echo $total; ?></td>
				</tr>
			</form>
			</table>
		</td>
	</tr>
</table>
</body>
</html>
