<?php
include'database.php';
class home_Model{
	protected $database;
	public function __construct(){
		$this->database=new Database();
	}

	public function productlist(){
		$query="SELECT p.product_id,p.p_title,p.p_image,p.p_quantity,pr.price_id,pr.price from product p join price pr on p.product_id=pr.product_id where pr.status='active' order by pr.price desc, p.p_added_on	asc";
		try{
			$result=$this->database->fetchall($query);
			return $result;
		}
		catch(Exception $e){
			echo "something wrong".$e;
		}
	}

	public function brand(){
		$query="SELECT * from brand";
		try{
			$result=$this->database->fetchall($query);
			return $result;
		}
		catch(Exception $e){
			echo "something wrong".$e;
		}
	}
	public function filters(){
		$query="SELECT p.product_id,p.p_title,p.p_image,p.p_quantity,pr.price_id,pr.price from product p join price pr on p.product_id=pr.product_id WHERE p.p_title='$_POST[product]'||pr.price in('$_POST[fro]','$_POST[to]')||p.p_quantity between '$_POST[qtyfrom]' AND '$_POST[qtyto]' || p.brand_id='$_POST[brands]' and pr.status='active'";
		try{
			$result=$this->database->fetchall($query);
			return $result;
		}
		catch(Exception $e){
			echo "something wrong".$e;
		}
	}
	public function addtocart($total){
		$query="INSERT INTO tempcart (product_id,qty,price_id,total,uid) VALUES('$_POST[product_id]','$_POST[qty]','$_POST[p_id]','$total','$_SESSION[uid]')";
		$pid="SELECT product_id from tempcart where uid='$_SESSION[uid]'";

		$re=$this->database->fetchall($pid);
		
		foreach ($re as $key => $value) {
			if($re[$key]['product_id']===$_POST['product_id']){
				$_SESSION['success']="Product All ready exist in cart";
					//exit();
				echo $_POST['product_id'];
				echo $re[$key]['product_id'];
				exit();
				//header("location:./index.php?op=home");
			}
		
		}
		//echo $query;
		$_SESSION['success']="Product Added into Cart Successfully";
		return $this->database->insertone($query);
	}

	public function sortproduct($order){
		$query="SELECT p.product_id,p.p_title,p.p_image,p.p_quantity,pr.price_id,pr.price from product p join price pr on p.product_id=pr.product_id where pr.status='active' order by pr.price $order";
		//echo $query;
		try{
			$result=$this->database->fetchall($query);
			return $result;
		}
		catch(Exception $e){
			echo "something wrong".$e;
		}

	}
	public function cartitem(){
		$query="SELECT count(qty) from tempcart where uid=$_SESSION[uid]";
		//echo $query;
		return $this->database->fetch($query);
	}
}

?>