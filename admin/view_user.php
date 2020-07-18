<?php
	include 'includes/session.php';
$output = array('mylist' => '');

	$stmt = $conn->prepare("SELECT * From users");
		$stmt->execute();
		foreach ($stmt as $row) {
			$image = (!empty($row['photo'])) ? '../images/' . $row['photo'] : '../images/profile.jpg';
                        $status = ($row['status']) ? '<span class="label label-success">active</span>' : '<span class="label label-danger">not verified</span>';
                        $active = (!$row['status']) ? '<span class="pull-right"><a href="#activate" class="status" data-toggle="modal" data-id="' . $row['id'] . '"><i class="fa fa-check-square-o"></i></a></span>' : '';
			$output['mylist'] .= "
                   <tr>
                    <td>
                      <img src='" . $image . "' height='30px' class='img-circle' width='30px'>
                      <span class='pull-right'><a href='#edit_photo' class='photo' data-toggle='modal' data-id=" . $row['id'] . "><i class='fa fa-edit'></i></a></span>
                    </td>
                    <td>" . $row['email'] . "</td>
                    <td>" . $row['firstname'] . ' ' . $row['lastname'] . "</td>
                    <td>
                      " . $status . "
                      " . $active . "
                    </td>
                    <td>" . date('M d, Y', strtotime($row['created_on'])) . "</td>
                    <td>
                      <a href='cart.php?user=" . $row['id'] . "' style='color:white' ><button class='btn btn-success btn-flat btn-sm' id='quickview'><i class='fa fa-search'></i> Cart</button></a>
                      <button class='btn btn-success btn-sm edit btn-flat'  id='quickview' data-id=" . $row['id'] . "><i class='fa fa-edit'></i> Edit</button>
                      <button class='btn btn-danger btn-sm delete btn-flat'  data-id=" . $row['id'] . "><i class='fa fa-trash'></i> Delete</button>
                    </td>
                  </tr>
                        ";
	}
	

$pdo->close();
echo json_encode($output);

?>