<?php
include 'includes/session.php';

$id = $_POST['id'];

$conn = $pdo->open();

$output = array('list' => '');

$stmt = $conn->prepare("SELECT * FROM details LEFT JOIN products ON products.id=details.product_id LEFT JOIN sales ON sales.id=details.sales_id WHERE details.sales_id=:id");
$stmt->execute(['id' => $id]);

$total = 0;
foreach ($stmt as $row) {
    $image = (!empty($row['photo'])) ? 'images/' . $row['photo'] : 'images/noimage.jpg';
    $output['transaction'] = $row['pay_id'];
    $output['date'] = date('M d, Y', strtotime($row['sales_date']));
    $subtotal = $row['price'] * $row['quantity'];
    $total += $subtotal;
    $order = $total * ($row['old_price'] - $row['price']) /  100;
    $order1 = $total - $order;
    $delivery = 15.00;
    $delivery1 = $order1 + $delivery;
    $output['list'] .= "
<tr class='prepend_items'>
<td ><a href='product.php?product=" . $row['slug'] . "'><img src='" . $image . "' class=\"img\" width='100px'  class=\"img-rounded\" style=\"border-radius:10px;box-shadow: 0px 8px 60px -10px rgba(13, 128, 39, 0.6);\"></a> </td>
<td ><a href='product.php?product=" . $row['slug'] . "' style=\"color:white\">" . $row['name'] . "</a> </td>
<td >" . $row['quantity'] . "</td>
<td >
<h5 style=\"font-weight:700\">Product Price: &#36; " . number_format($row['price'], 2) . " * " . $row['quantity'] . " = &#36; " . number_format($subtotal, 2) . "</span> <br>
<h5 style=\"font-weight:700\">Bag Discount: <span class=\"pull-right\">&#36; " . number_format($order, 2) . "</h5>
<h5 style=\"font-weight:700\">Bag Total :<span class=\"pull-right\">&#36; " . number_format($order1, 2) . "</h5>
<h5 style=\"font-weight:700\">Delivery Charge: <span class=\"pull-right\">&#36; " . number_format($delivery, 2) . "</h5>
<hr style=\"border:1px solid #ddd\">
</tr>
";
}

$output['total'] = '<span style="color:white;letter-spacing:1px"><b>&#36; ' . number_format($delivery1, 2) . '<b></span>';
$pdo->close();
echo json_encode($output);
