<html>
<head>
	<style type="text/css">
	body
	{
		margin: 0;
		padding: 0;
		background-color:#D6F5F5;
		text-align:center;
	}
	.top-bar
		{
			width: 100%;
			height: auto;
			text-align: center;
			background-color:#FFF;
			border-bottom: 1px solid #000;
			margin-bottom: 20px;
		}
	.inside-top-bar
		{
			margin-top: 5px;
			margin-bottom: 5px;
		}
	.link
		{
			font-size: 18px;
			text-decoration: none;
			background-color: #000;
			color: #FFF;
			padding: 5px;
		}
	.link:hover
		{
			background-color: #9688B2;
		}
	</style>
	
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-60962033-1', 'auto');
	  ga('send', 'pageview');

	</script>
</head>

<body>
	<div class="top-bar">
		<div class="inside-top-bar">
			<a href="http://www.eggslab.net"><img src="http://www.eggslab.net/wp-content/uploads/2015/03/eggslablogo.png" width="500px"></a>
			<br><br>
			<a href="http://www.eggslab.net/import-excel-file-data-in-mysql-database-using-php" class="link">&larr; Back to Article</a> | <a href="http://demos.eggslab.net/" class="link">More Demos &rarr;</a>
		</div>
	</div>
    <div style="border:1px dashed #333333; width:300px; margin:0 auto; padding:10px;">
    
	<form name="import" method="post" enctype="multipart/form-data">
    	<input type="file" name="file" /><br />
        <input type="submit" name="submit" value="Submit" />
    </form>
<?php
	include ("connection.php");
	
	if(isset($_POST["submit"]))
	{
		$file = $_FILES['file']['tmp_name'];
		$handle = fopen($file, "r");
		$c = 0;
		while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
		{
			$name = $filesop[0];
			$email = $filesop[1];
			
			$sql = mysql_query("INSERT INTO csv (name, email) VALUES ('$name','$email')");
			$c = $c + 1;
		}
		
			if($sql){
				echo "You database has imported successfully. You have inserted ". $c ." recoreds";
			}else{
				echo "Sorry! There is some problem.";
			}

	}
?>
    
    </div>
    <hr style="margin-top:300px;" />	
    
    <div align="center" style="font-size:18px;"><a href="http://www.eggslab.net">&copy; Eggs Lab</a></div>

</body>
</html>