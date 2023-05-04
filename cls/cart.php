<?php
/*
 * Shopping Cart - Manipulate the item of a shopping cart using AJAX
 *
 * @category    E-Commerce
 * @package     AJAX
 * @author      Ashraf Gheith <nurazije@gmail.com>
 * @license     http://www.php.net/license/2_02.txt   The PHP License
 * @link        http://www.phpclasses.org/browse/package/3188.html
 */
 // require __dir__.'/../config.php';
 class cart{
	private $dbConnection;
	
	function __construct(){
		$this->dbConnection = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
	}
	
	function __destruct(){
		$this->dbConnection->close();
	}
	
	public function getProducts(){
		$arr = array();
		$dbConnection = $this->dbConnection;
		$dbConnection->query( "SET NAMES 'UTF8'" );
		$statement = $dbConnection->prepare("select id, name, descr, price, in_stock from products");
		$statement->execute();
		$statement->bind_result( $id, $name, $descr, $price, $in_stock);
		while ($statement->fetch()){
			$line = new stdClass;
			$line->id = $id; 
			$line->name = $name; 
			$line->price = $price;
			$line->descr = $descr;
			$line->in_stock = $in_stock;
			$arr[] = $line;
		}
		$statement->close();
		return $arr;
	}
	
	public function addToCart(){
		$id = intval($_GET["id"]);
		if($id > 0){
			if($_SESSION['cart'] != ""){
				$cart = json_decode($_SESSION['cart'], true);
				$found = false;
				for($i=0;$i<count($cart);$i++){
					if($cart[$i]["product"] == $id){
						$cart[$i]["count"] = $cart[$i]["count"]+1;
						$found = true;
						break;
					}
				}
				if(!$found){
					$line = new stdClass;
					$line->product = $id; 
					$line->count = 1;
					$cart[] = $line;
				}
				$_SESSION['cart'] = json_encode($cart);
			}else{
				$line = new stdClass;
				$line->product = $id; 
				$line->count = 1;
				$cart[] = $line;
				$_SESSION['cart'] = json_encode($cart);
			}
		}
	}
	
	public function removeFromCart(){
		$id = intval($_GET["id"]);
		if($id > 0){
			if($_SESSION['cart'] != ""){
				$cart = json_decode($_SESSION['cart'], true);
				for($i=0;$i<count($cart);$i++){
					if($cart[$i]["product"] == $id){
						$cart[$i]["count"] = $cart[$i]["count"]-1;
						if($cart[$i]["count"] < 1){
							unset($cart[$i]);
						}
						break;
					}
				}
				$cart = array_values($cart);
				$_SESSION['cart'] = json_encode($cart);
			}
		}
	}
	
	public function emptyCart(){
		$_SESSION['cart'] = "";
	}
	
	public function getCart(){
		$cartArray = array();
		if (isset($_SESSION['cart'])) 
		if($_SESSION['cart'] != ""){
			$cart = json_decode($_SESSION['cart'], true);
			for($i=0;$i<count($cart);$i++){
				$lines = $this->getProductData($cart[$i]["product"]);
				$line = new stdClass;
				$line->id = $cart[$i]["product"];
				$line->count = $cart[$i]["count"];
				$line->name = $lines->name;
				$line->total = ($lines->price*$cart[$i]["count"]);
				$cartArray[] = $line;
			}
		}
		return $cartArray;
	}
	
	public function getProductData($id){
		$dbConnection = $this->dbConnection;
		$dbConnection->query( "SET NAMES 'UTF8'" );
		$statement = $dbConnection->prepare("select name, descr, price, in_stock from products where id = ? limit 1");
		$statement->bind_param( 'i', $id);
		$statement->execute();
		$statement->bind_result( $name, $descr, $price, $in_stock);
		$statement->fetch();
		$line = new stdClass;
		$line->id = $id; 
		$line->name = $name; 
		$line->price = $price;
		$line->descr = $descr;
		$line->in_stock = $in_stock;
		$statement->close();
		return $line;
	}
 }
 ?>