<?php
	include 'includes/session.php';

	$id = $_POST['id'];

	$conn = $pdo->open();

	$output = array('list'=>'');

	$stmt = $conn->prepare("SELECT * FROM details LEFT JOIN products ON products.id=details.product_id LEFT JOIN sales ON sales.id=details.sales_id WHERE details.sales_id=:id");
	$stmt->execute(['id'=>$id]);

	$total = 0;
	foreach($stmt as $row){
		$image = (!empty($row['photo'])) ? '../images/'.$row['photo'] : 'images/noimage.jpg';
		$output['transaction'] = $row['pay_id'];
		$output['date'] = date('M d, Y', strtotime($row['sales_date']));
		$subtotal = $row['price']*$row['quantity'];
		$total += $subtotal;
		$output['list'] .= "
			<tr class='prepend_items' >
							<td style=\"border:1px solid #663355;\"><a href='product.php?product=".$row['slug']."'><img src='".$image."'  width='80px' height='80px' class=\"img-rounded\"></a>    </td>

				<td style=\"border:1px solid #663355;\">".$row['name']."</td>
				<td style=\"border:1px solid #663355;\">".$row['quantity']."</td>
				<td style=\"border:1px solid #663355;\">&#36; ".number_format($subtotal, 2)."</td>
			</tr>
		";
	}
	
	$output['total'] = '<b>&#36; '.number_format($total, 2).'<b>';
	$pdo->close();
	echo json_encode($output);

?>