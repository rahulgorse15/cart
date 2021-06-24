<?php
include'./model/cartmodel.php';
class cart_Controller{
	public $cartmodel;
public function __construct(){
$this->cartmodel=new cart_Model();
}
public function handler(){
	$result=$this->cartmodel->cartdata();

	$_SESSION['cartitem']=$this->cartmodel->cartitem();

	include'./view/cartview.php';

	if(!empty($_POST['submit'])){
	$tot;
		for($i=0;$i<count($_POST['qty']);$i++){
			$tot[]=($_POST['qty'][$i])*($result[$i]['price']);
		}
		foreach ($tot as $key => $value) {
			//print_r("total".$value."<br>key=".$key);
			//print_r("total=".$tot[$key]."qty=".$_POST['qty'][$key]."temp_id=".$result[$key]['temp_id']."<br>");
			$this->cartmodel->update_cart($tot[$key],$_POST['qty'][$key],$result[$key]['temp_id']);
		}
		// echo "size".count($_POST['qty']);
		// print_r("value".$_POST['qty'][0]);
		// print_r($result[$key]['price']);
	}
	
}
public function delete(){

	$result=$this->cartmodel->delete($_GET['id']);
	header("location:./index.php?op=cartdetails");

}
}
?>