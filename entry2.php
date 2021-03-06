<!DOCTYPE HTML>
<html>
	<!--JavaScript Code to scan the various qrcodes-->
    <head>
        <title>nativeDroid - Theme for jQuery Mobile</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		
		<!-- FontAwesome - http://fortawesome.github.io/Font-Awesome/ -->
        <link rel="stylesheet" href="css/font-awesome.min.css" />

		<!-- jQueryMobileCSS - original without styling -->
		<!--link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.css" /-->

		<!-- nativeDroid core CSS -->
        <link rel="stylesheet" href="css/jquerymobile.nativedroid.css" />

		<!-- nativeDroid: Light/Dark -->
        <link rel="stylesheet" href="css/jquerymobile.nativedroid.dark.css"  id='jQMnDTheme' />

		<!-- nativeDroid: Color Schemes -->
        <link rel="stylesheet" href="css/jquerymobile.nativedroid.color.blue.css" id='jQMnDColor' />

		<!-- jQuery / jQueryMobile Scripts -->					
		<!--script src="http://code.jquery.com/jquery-1.9.1.min.js"></script-->
        <!--script src="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.js"></script-->

		<!-- Extras for: Cards.html -->
	    <!--script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script-->
    </head>
	
	
	<script>
	


</script>
    <body>

	<div id='map-canvas'></div>
        
    <div data-role="page" data-theme='b'>


        <div data-role="header" data-position="fixed" data-tap-toggle="false" data-theme='b'>
            <a href="index.html" data-ajax="false"><i class='fa fa-bars'></i></a>
            <h1>Start Navigation</h1>
        </div>
		
		 <div data-role="collapsible-set" data-theme="b" data-content-theme="b">
            <div data-role="collapsible">
            </div>
        
        <div data-role="content">   

			
			<ul data-nativedroid-plugin='cards'>
			
			</ul>  
	        
        </div>
	<!--a  data-rel="popup" data-position-to="window" data-role="button" id="button" data-inline="true" data-transition="pop"><i class='lIcon fa fa-external-link'></i>SCAN</a-->
	<form align="center" border="white">
	<!--label align="center">Image Number:</label>
     <input type="text" id="number" value="" data-clear-btn="false" placeholder="...Enter image number here..."-->
	 <!--TextBos Style -->
	 <INPUT type="button" value="Click Me" id="done" onclick = "call()">
	 <INPUT type="button" value="Click Me" id="done" onclick = "call()">
	<!--button id="go" type="button" onclick="myfunc()"> Go! </button-->
	</form>
    </div>
    
    <script src="js/nativedroid.script.js"></script>
	<script src="js/sth.js"></script>
    </body>
</html>
