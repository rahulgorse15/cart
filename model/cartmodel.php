<?php
include'database.php';
class cart_Model{
		public	$database;
	public function __construct(){
			$this->database=new Database();
	}
	public function cartdata(){
		$query="SELECT t.temp_id,t.price_id,t.product_id,t.qty,t.total,t.uid,p.product_id,p.p_title,p.p_image,p_quantity,pr.price_id,pr.price from tempcart t join product p on t.product_id=p.product_id join price pr on t.price_id =pr.price_id where t.uid='$_SESSION[uid]'";
		//echo $query;
		return $this->database->fetchall($query);
			}

			public function delete($id){
				$query="DELETE FROM tempcart WHERE temp_id='$id'";
				$_SESSION['success']="Product deleteed from Cart Successfully";
				return $this->database->insertone($query);
			}
			public function cartitem(){
		$query="SELECT count(qty) from tempcart where uid=$_SESSION[uid]";
		//echo $query;
		return $this->database->fetch($query);
	}
	public function update_cart($total,$qty,$temp_id){
		$query="UPDATE tempcart SET qty='$qty',total='$total' where temp_id='$temp_id'";
		//echo $query;
		if($this->database->insertone($query)){
			return $_SESSION['success']="Cart Value Updated Successfully";
		}
	}
}

?>