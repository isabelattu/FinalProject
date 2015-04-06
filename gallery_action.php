
<?php
	include("gen.php");
	$cmd=get_datan("cmd");
	switch($cmd){
		case 1:
			//return all products
			get_art_details();
			break;
		case 2:
			new_order(); //users ordering an artpieces
			break;
		case 3:
			search_products();
			break;
		case 4:
			get_order_detail();
			break;
		case 5:
			get_product_count();
			break;
		case 6:
			get_related_products();
			break;
		case 7:
			delete_order();//deleting an already placed order
			break;
		case 8:
			checkout();
			break;
		case 9:
			cancel_order();
			break;
		case 10:
			get_order_status();
			break;
		default:
			echo "{";
			echo jsonn("result",0). ",";
			echo jsons("message","unknown command");
			echo "}";	
	}
	
		$oid=get_datan("image_name");
		$iname=get_datan("image_number");
		$inum=get_datan("oid");
	function get_art_details(){
		$id = get_datan("id");
		//$num_rec_per_page = get_datan("num_rec_per_page");
		//if ($page==0){
		//$page=1;
		//}
		//$start_from = ($page-1) * $num_rec_per_page;
		include_once("gallery.php");
		$p = new gallery();
		$p->get_art_details($id);
		$row=$p->fetch();
		if (!$row){
		echo "{";
		echo jsonn("result",0) .",";
		echo jsons("Message", "art not found");
		echo "}";
		return;
		}
		    echo "{";
			//echo jsonn("result",1) .",";
			echo '"event":';
			$s=Array();
			do{
			array_push($s, $row);
			$row=$p->fetch();
			}while($row);
			print_r(json_encode($s));
			echo "}";
			
			/**
				
			**/
	}
	
	function new_order(){
	//$cmd = $_REQUEST['cmd'];
	//if($cmd==1){
	$code = $_REQUEST['code'];
	$name = $_REQUEST['name'];
	$number = $_REQUEST['number'];
	$date = $_REQUEST['date'];
	$status='1';
	$email = $_REQUEST['email'];
	$iname = $_REQUEST['iname'];
	$inum =  $_REQUEST['inum'];
	$imid =  $_REQUEST['imid'];
		
		include_once("gallery.php");
		$p = new gallery();
		
		if(!$p->new_order($iname,$inum,$imid,$date,$name,$email,$status,$code,$number)){
        echo "{\"result\":0,\"message\":\"product cannot be added to cart}\"}";
        return;
		}
   echo "{\"result\":1,\"message\":\"order has been placed\"}";
		
	}
	
	function search_products(){
		$searchkey=get_data('searchkey');
		include_once("e-commerce.php");
		$p = new e_commerce();
		$p->search_product($searchkey);
		$row=$p->fetch();
		
		if (!$row){
		echo "{";
		echo jsonn("result",0) .",";
		echo jsons("Message", "products not found");
		echo "}";
		return;
		}
		echo "{";
			echo jsonn("result",1) .",";
			echo '"products":';
			$s=Array();
			do{
			array_push($s, $row);
			$row=$p->fetch();
			}while($row);
			print_r(json_encode($s));
			echo "}";
	}
	
	function get_order_detail(){
		//$oid=get_data('imid');
		include_once("gallery.php");
		$p = new gallery();
		$p->get_order_detail();
		$row=$p->fetch();
		if (!$row){
		echo "{";
		echo jsonn("result",0) .",";
		echo jsons("Message", "products not found");
		echo "}";
		return;
		}
		echo "{";
			//echo jsonn("result",1) .",";
			echo '"event":';
			$s=Array();
			do{
			array_push($s, $row);
			$row=$p->fetch();
			}while($row);
			print_r(json_encode($s));
			echo "}";
	
	}
	
	function get_product_count(){
		include_once("e-commerce.php");
		$p = new e_commerce();
		$p->get_product_count();
		$row=$p->fetch();
		if (!$row){
		echo "{";
		echo jsonn("result",0) .",";
		echo jsons("Message", "products cannot be counted");
		echo "}";
		return;
		}
		
		echo "{";
			echo jsonn("result",1) .",";
			echo '"count":{';
			echo jsons("total_row",$row['total_row']);
			echo "}";
		echo "}";
	}
	
	function get_related_products(){
		$p1category=get_data('p1category');
		$p2category=get_data('p2category');
		$p1name=get_data('p1name');
		$p2name=get_data('p2name');
		include_once("e-commerce.php");
		$p = new e_commerce();
		$p->get_related_products($p1category,$p2category,$p1name,$p2name);
		$row=$p->fetch();
		if (!$row){
		echo "{";
		echo jsonn("result",0) .",";
		echo jsons("Message", "products not found");
		echo "}";
		return;
		}
		echo "{";
			echo jsonn("result",1) .",";
			echo '"products":';
			$s=Array();
			do{
			array_push($s, $row);
			$row=$p->fetch();
			}while($row);
			print_r(json_encode($s));
			echo "}";
	}
	
	function delete_order(){
		$id=get_data('id');
		include_once("gallery.php");
		$p = new gallery();
		
		if(!$p->delete_order($id)){
        echo "{\"result\":0,\"message\":\"cart item cannot be removed\"}";
        return;
		}
	   echo "{\"result\":1,\"message\":\"cart item successfully removed\"}"; 
	}
	
	function cancel_order(){
		$cid = get_datan('cid');
		include_once("e-commerce.php");
		$p = new e_commerce();
		
		if(!$p->cancel_order($cid)){
        echo "{\"result\":0,\"message\":\"order cannot be cancelled\"}";
        return;
		}
	   echo "{\"result\":1,\"message\":\"order successfully cancelled\"}"; 
	}
	
	function checkout(){
		$status = "Confirmed";
		$cid=1;
		include_once("e-commerce.php");
		$p = new e_commerce();
		
		if(!$p->update_order_status($status,$cid)){
		 $url = "http://api.smsgh.com/v3/messages/send?"
		. "From=E-commerce"
		. "&To=%2B233249931596"
		. "&Content=Dear+customer+your+order+is+been+processed+thank+you"
		. "&ClientId=odfbifrp"
		. "&ClientSecret=rktegnml"
		. "&RegisteredDelivery=true";
		 // Fire the request and wait for the response
		 $response = file_get_contents($url) ;
		 var_dump($response);
        echo "{\"result\":0,\"message\":\"order status cannot be updated\"}";
        return;
		}
	   echo "{\"result\":1,\"message\":\"order successfully updated\"}"; 
	}
	
	function get_order_status(){
		$cid=get_data('cid');
		include_once("e-commerce.php");
		$p = new e_commerce();
		$status=$p->get_order_status($cid);
		$row = $p->fetch($status);
		if(!$row){
        echo "{\"result\":0,\"message\":\"status cannot be obtained\"}";
        return;
		}
	  echo "{";
			echo '"products":';
			$s=Array();
			do{
			array_push($s, $row);
			$row=$p->fetch();
			}while($row);
			print_r(json_encode($s));
			echo "}";
	}

?>