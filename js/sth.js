	function syncAjax(u){
				var obj=$.ajax(
					{url:u,
					 async:false
					 }
					 );
				return (obj.responseText);
				console.log(obj.responseText);
			}
	

//Function to fetch art info
var code;
var url1;
var url2;
var r1;
var ur1;
var ur2;
var iname ;
var inum ;
var imid ;
var i=0;
var part;
var data;

function call(){
  
//window.alert("You have been Marked Present");
//$("#done").click(function(){

 code = $("#number").val();

// var u  = "js_php.php?cmd=2&id=1";
 url1 = "http://localhost/slider/gallery_action.php?cmd=1&id="+code;

 
  r1 = syncAjax(url1);
   
   
  


  

    part = " " + r1.event[i].image_name + "\n " + r1.event[i].image_number+ "\n " +r1.event[i].qrcode+"\n"+r1.event[i].order+ "\n"+r1.event[i].description;
   $('<li>'+ part + '</li>').appendTo($(".inner"));
   alert(part);

 data = r1.event[i].description;
 iname=r1.event[i].image_name;
inum= r1.event[i].image_number;
imid= r1.event[i].gid;
   //var test = document.getElementById("textnow");
   
   //var li = document.createElement(
   //document.getElementById("textnew").value = data.toString();
   var para = document.createElement("P");                       // Create a <p> element
   var t = document.createTextNode(part);       // Create a text node
   para.appendChild(t);                                          // Append the text to <p>
   document.body.appendChild(para);                                         // Append the text to <p>
   //document.getElementById("myDIV").appendChild(para); 
   //$("#textnow").html(part);
 //this.disabled = true;
   		
		
 //alert(r1);
 
   
  ur = "http://localhost/slider/realinfo.html?name=" + encodeURIComponent(data);
  document.location.href = ur;
 // window.open("realinfo.html","_self");



 //location.reload();
    
}


function order(){
//window.alert(u);
	alert("Thank u for ordering");
	var name = $("#name").val();
	var number = $("#number").val();
	var email = $("#email").val();
	//alert (name+" "+number+" "+email);
	var code = Math.floor((Math.random() * 100) + 1);
	var date = new Date();
	var order = "1";
	
	im_name = window.iname;
	im_num = window.inum;
	im_id = window.imid;
	
	var link = "http://localhost/slider/gallery_action.php?cmd=2&code="+code+"&name="+name+"&number="+number+"&date="+date+"&email="+email+"&iname="+im_name+"&inum="+im_num+"&imid="+im_id+"&status="+order;
	var r2 = syncAjax(link);
				alert("The details of the image you ordered are " + r2+"."+"  The order has been saved. Thank You");


}

function Delete(){
    //window.alert(u);
    var id = 23;
	
	
	var delu = "http://localhost/slider/gallery_action.php?cmd=7&id="+id;
				var u = syncAjax(delu);
				//alert(r2);
				alert("item has been removed");
				
				//call2();
				
				location.reload();
}

function voice(){
	
//$.mobile.changePage('realinfo.html',{data:{arg1:id}});
var ur3 = "http://localhost/slider/demo.html?newid=" + encodeURIComponent(id);
  document.location.href = ur3;
  
}

function list(){
	var b=0;

 var a = "http://localhost/slider/gallery_action.php?cmd=4";
 
  u = syncAjax(a);
 alert(u);
 
 var obj;
 for (var i = 0, length = event.length; i < length; i++) {
 for (obj in event[i]) {
    alert(obj.toString());

}
alert(obj.toString());
}

  /*var part2 = " " + u.event[b].image_name + "\n " + u.event[b].image_id+ "\n " +u.event[b].order_date+"\n"+u.event[b].buyer_name+ "\n"+u.event[b].email+ u.event[b].order_status+"\n"+u.event[b].buyer_code+ "\n"+u.event[b].buyer_contact;
  $('<li>'+ part2 + '</li>').appendTo($(".inner"));*/
   
   
   //Trying to display results on the list page
   $("#display").html(u.toString());

  
  //document.getElementById("demo").innerHTML = u;
    }


function getParameterByName(name){
		  name = name.replace(/[\[]/,"\\\[").replace(/[\]]/,"\\\]");
		  var regexS = "[\\?&]"+name+"=([^&#]*)";
		  var regex = new RegExp( regexS );
		  var results = regex.exec( window.location.href );
		  if( results == null )
			return "Nothing here";
		  else
			return decodeURIComponent(results[1].replace(/\+/g, " "));
		}
		
		
	function testpage(){
		var id2 = getParameterByName("newid");
		alert(id2);
       //console.log(id2);
	    document.getElementById("text").value=id2;
	  
		}	
		
	