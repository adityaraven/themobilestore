<?php
$connect = mysqli_connect("localhost","root","","mobilestore");

$output2 = '';
	$sql2="SELECT * FROM products
	WHERE product_title LIKE '%".$_POST["search2"]."%'
	";


$result2 = mysqli_query($connect, $sql2);
if(mysqli_num_rows($result2) > 0)
{
	$output2 .= '<h4 align="center">Search Result</h4>';
	$output2 .= '<div class="table-responsive">
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
	while($row2 = mysqli_fetch_array($result2))
	{
		$output2 .= '
			<tr>
				<td>'.$row2["product_title"].'</td>
				<td>'.$row2["product_processor"].'</td>
				<td>'.$row2["product_camera"].'</td>
				<td>'.$row2["product_ram"].'</td>
				<td>'.$row2["product_rom"].'</td>
				<td>'.$row2["product_battery"].'</td>
				<td>'.$row2["product_screen_size"].'</td>
			</tr>
		';
	}
	echo $output2;
}
else
{
	echo 'Data Not Found';
}
?>