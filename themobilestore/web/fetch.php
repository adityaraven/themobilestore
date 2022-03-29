<?php
$connect = mysqli_connect("localhost","root","","mobilestore");
$output = '';

	
	$sql="SELECT * FROM products
	WHERE product_title LIKE '%".$_POST["search"]."%'
	";


$result = mysqli_query($connect, $sql);
if(mysqli_num_rows($result) > 0)
{
	$output .= '<h4 align="center">Search Result</h4>';
	$output .= '<div class="table-responsive">
					<table class="table table bordered">
						<tr>
							<th>Product Name</th>
							<th>Processor</th>
							<th>Camera</th>
							<th>RAM</th>
							<th>ROM</th>
							<th>Battery</th>
							<th>Screen Size</th>
						</tr>';
	while($row = mysqli_fetch_array($result))
	{
		$output .= '
			<tr>
				<td>'.$row["product_title"].'</td>
				<td>'.$row["product_processor"].'</td>
				<td>'.$row["product_camera"].'</td>
				<td>'.$row["product_ram"].'</td>
				<td>'.$row["product_rom"].'</td>
				<td>'.$row["product_battery"].'</td>
				<td>'.$row["product_screen_size"].'</td>
			</tr>
		';
	}
	echo $output;
}
else
{
	echo 'Data Not Found';
}

?>
	