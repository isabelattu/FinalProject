
<html>
	<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>jQuery Mobile: Theme Download</title>
	<link rel="stylesheet" href="themes/C.min.css" />
	<link rel="stylesheet" href="themes/C.css" />
	<link rel="stylesheet" type='text/css' href="themes/style.css" />
	<link rel="stylesheet" href="themes/jquery.mobile.icons.min.css" />
	<!--link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile.structure-1.4.5.min.css" />
	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"--></script>
	</head>
<script>
function syncAjax(u){
			var obj = $.ajax(
					{url:u,
					async: false
					}
				);
			return $.parseJSON(obj.responseText);

	}
	
      /*function myList(){
           
                var url = "js_php.php?cmd=2";
				var details = syncAjax(url);
				
				if (details.result==0){
					$("divStatus").text(r.message);
					return;
				}
				
				var i=0;
				
				for(i=0; i<details.event.length; i++){
				
				var list = document.getElementById('listview');
				var listItem = document.createElement('li');
				listItem.setAttribute('id','listitem');
				
				var mid = details.event[i].mid;
				var description = details.event[i].description;
				var date = details.event[i].date;
				var time = details.event[i].time;
				var contact = details.event[i].contact;
				var string = description+date+time+contact;
				
				listItem.innerHTML="<a href='#' onclick='myDetails("+mid+")'><h3>"+description+"</h3><p>"+date+"</p><p>"+time+"</p><p>"+contact+"</p></a>";
                list.appendChild(listItem);
				$("#listview").trigger('create');
				//( "#listview" ).listview("refresh")	
				//$( '#listview' ).listview().listview('refresh');
				
				$(list).listview().listview("refresh");
			}
	
        }*/
		
		//Test Code
		var meetingList = (function( $, undefined ) {
		var idk = {};
		
		idk.init = function() {
      //Refresh news when btnRefresh is clicked
       $( "#btnRefresh" ).live( "click", 
        function() {
        idk.getAndDisplayNews();
        });
	   
		 //When news updated, display items in list
		amplify.subscribe( "news.updated", 
		function( news ) {
        displayNews( news );
      });

	   
	   
	   }
			
</script>
 
	
	<body>
	
		<h1>IWOZHIERSOME</h1>
                 <div role="main" class="ui-content" data-position="fixed">
						<ul data-role="listview" id="listview">
								<li data-role="list-divider">

								</li>
						</ul>
                 </div>	

				<label	id="display"> 
					
				</label>
                <a	href="#" class="ui-btn"  id="btnRefresh" align = "center">Refresh</a>
	</body>
	
</html>
