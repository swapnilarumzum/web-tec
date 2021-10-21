<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Home</title>
</head>
<body>
	<h1>Home</h1>
	<h4>Digital Wallet</h4>
	<ol>
		<li><a href="Home.php">Home</li>
		<li><a href="Add_Beneficiary.php">Add Beneficiary</a></li>
		<li><a href="Transaction_History.php">Transaction History</a></li>
	</ol>
	
	





	<form action="Home.php" method="POST">
	<h4><b>Fund transfer</b></h4>
	<label>Select Category</lable>
		<select name="Category">
			<option value="Select a value">Select a value</option>
			<option value="Mobile Recharge">Mobile Recharge</option>
			<option value="Send Money">Send Money</option>
		</select>
		<br><br>
		<label>To</lable>
		<select name ="To">
			<option value="Select a value">Select a value</option>
			<option value="    "></option>
			<option value="     "></option>
			

		</select>
		<br><br>
		<label>Amount</lable>
		<input type="number" id="quantity" min="50">
		<br><br>

		<input type="submit" name="submit">


	</form>
	<?php 
		if ($_SERVER["REQUEST_METHOD"] == "POST"){

			$category=$_POST['Category'];
			$to = $_POST['To'];

			$handle=fopen("History.json", a);
			$history =array('Category'=> $category,'to'=>$to);
			$encode=json_encode($history);
			$whistory=fwrite($handle, $encode."\n");

		}


	?>

</body>
</html>