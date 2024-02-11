<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>HTML email template</title>
	<style>
		
		*{
			margin: 0;
			padding: 0;
			box-sizing: border-box;
		}

		body{
			font-family: sans-serif;
			min-height: 100vh;
		}

		.page{
			width: 768px;
			margin:  0 auto;
			font-size: 16px;
			color: #555555;
		}

		h1{
			background-color: #f4f4f4;
			padding: 20px;
			margin-top: 20px;
		}

		h2{
			padding: 20px;
		}

		p{
			padding: 10px 20px;
			line-height: 26px;
		}	

		h3{
			padding: 20px;
		}

		table{
			padding: 20px;
			width:  100%;
		}

		table tr{}
		table th{
			text-align: left;
			padding: 10px;
			background-color: #e4e4e4;
		}
		table td{
			border: thin solid #d4d4d4;
			padding: 10px;
		}

		footer{
			padding: 20px;
		}

		footer a{
			text-decoration: none;
			color: #155197;
		}
	</style>
</head>
<body>
	<div class="page">
		
			<h2>Hello <?php echo $collegename; ?></h2>

		<p>
			Your job post has been approved thank you for uploading
		</p>


	</div>
</body>
</html>