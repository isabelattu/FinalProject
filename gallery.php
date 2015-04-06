<?php
	include_once("adb.php");
	
	class gallery extends adb{
		function gallery(){
			adb::adb();
		}
	
		
		/**
		*get products
		*/
		function get_art_details($id){
			//write the SQL query and call $this->query()
			$query = "SELECT * FROM final_gallery_info_table where image_number=$id";
			return $this->query($query);
			}
			
		/**
		*get products count
		
		function get_product_count(){
			//write the SQL query and call $this->query()
			$query = "SELECT count(*) as total_row FROM product";
			return $this->query($query);
		}
		**/
		
		/**
		*search products
		
		function search_product($search_key){
			//write the SQL query and call $this->query()
			$query= "SELECT * from product where match(product_name,product_description) AGAINST ('$search_key')";
			return $this->query($query);
		}
		**/
		/**
		*add an order to cart
		*/
		function new_order($iname,$inum,$imid,$date,$name,$email,$status,$code,$number){
			$query = "insert into order_table(oid,image_name,image_id,order_date,buyer_name,email,order_status,buyer_code,buyer_contact) VALUES ($iname,$inum,$imid,$date,$name,$email,1,$code,$number)";
			if ($this->query($query)){
				return false;
		}
		else{
				return true;
		}
		}
		
		/**
		get all placed orders from order table
		**/
		
		function get_order_detail(){
			$query = "select * from `order_table`";
			return $this->query($query);
		}
		
		/**
		*get related product **/
		
		function get_related_products($category1,$category2,$p1name,$p2name){
			$query = "SELECT * FROM `product` WHERE product_name != '%".$p1name."%' and 
		product_name != '%".$p2name."%' and product_category like '%".$category1."%' or product_category like '%".$category2."%' ORDER BY RAND() LIMIT 3";
			return $this->query($query);
		}
		
		/**
		*Delete from cart
		*/
		function delete_order($id){
			$query = "DELETE FROM `order_table` WHERE image_id=$id";
			return $this->query($query);
		}
		
		/**
		*Delete order
		
		function cancel_order($cid){
			$query = "UPDATE `order` SET `status`='Cancelled' WHERE customer_id=$cid";
			return $this->query($query);
		}
		
		/**
		*change order status
		
		function update_order_status($status, $cid){
			$query = "UPDATE `order` SET `status`='$status' WHERE customer_id=$cid";
			if ($this->query($query)){
				return false;
		}
		else{
				return true;
		}
		}
		
		/**
		*get order status
		
		function get_order_status($cid){
			$query = "SELECT * FROM `order` where customer_id=$cid";
			if ($this->query($query)){
				return false;
		}
		else{
				return true;
		}
		}
		*/
	}
		
?>