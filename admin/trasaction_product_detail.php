<?php
include 'includes/session.php';

$id = $_POST['id'];

$conn = $pdo->open();

$output = array('list' => '');

$stmt = $conn->prepare("SELECT * FROM details LEFT JOIN products ON products.id=details.product_id LEFT JOIN sales ON sales.id=details.sales_id WHERE details.product_id=:id");
$stmt->execute(['id' => $id]);

$total = 0;
foreach ($stmt as $row) {
    $image = (!empty($row['photo'])) ? '../images/' . $row['photo'] : 'images/noimage.jpg';
    $output['transaction'] = $row['pay_id'];
    $output['date'] = date('M d, Y', strtotime($row['sales_date']));
    $subtotal = $row['price'] * $row['quantity'];
    $total += $subtotal;
    $output['list'] .= "
			<tr class='prepend_items' >
							<td ><a href='product.php?product=" . $row['slug'] . "'><img src='" . $image . "'  width='80px' height='80px' class=\"img-rounded\"></a>    </td>

				<td >" . $row['name'] . "</td>
				<td >" . $row['quantity'] . "</td>
				<td >₹ " . number_format($subtotal, 2) . "</td>
			</tr>
		";
}

$output['total'] = '<b>₹ ' . number_format($total, 2) . '<b>';
$pdo->close();
echo json_encode($output);
