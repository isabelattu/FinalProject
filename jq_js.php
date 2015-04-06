
<html><br />
	<head><br />
		<script language="JavaScript"><!--<br />
		function saveImage()
		{
			var position = JSON.stringify(allMousePos);
			author = prompt("Please type your name");

			$.ajax({
				type: 'post',
				url: 'http://localhost/folder/database.php', //<--Note http
				data: {author: author, position: position},
				success: function( data ) {
				console.log( data );
				}
			});
}
	</head>
</html>