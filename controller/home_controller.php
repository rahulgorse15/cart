<?php
include'./model/home_model.php';
class home_Controller{
	public $model;
	public function __construct(){
		$this->model=new home_Model();
	}
	public function handler(){
			$result=$this->model->productlist();
			$brand=$this->model->brand();
			//print_r($brand);
			$_SESSION['cartitem']=$this->model->cartitem();

			include'./view/product_list.php';
			if($_POST['SEARCH']){
				$this->filter();
			}
			else if(!empty($_POST['addtocart'])){
				empty($_POST['addtocart']);
				//unset();
				$this->cart();
			}
			 if ($_POST['sort']) {
				$this->sort();
			}
	}

	public function filter(){
   		$result=$this->model->filters();

   			include'./view/product_list.php';		 
	}
	public function cart(){
		//echo "add".$_POST['addtocart'];
		$total=$_POST['qty']*$_POST['price'];
		$_POST['addtocart']=null;
		$result=$this->model->addtocart($total);
		// if($result>0){
		// 	include'./index.php?op=home';
		// }
	}
	public function sort(){
		//echo $_POST['sorted'];
		$order;
		if($_POST['sorted']=="Price Low to High"){
			$order="desc";
		}
		else{
			$order="asc";
		}
		$result=$this->model->sortproduct($order);
		include'./view/product_list.php';
	}
}

?>