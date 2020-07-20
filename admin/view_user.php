<?php
	include 'includes/session.php';
$output = array('mylist' => '');

	$stmt = $conn->prepare("SELECT * From users");
		$stmt->execute();
		foreach ($stmt as $row) {
			$image = (!empty($row['photo'])) ? '../images/' . $row['photo'] : '../images/noimage.jpg';
                       $status = ($row['status'] == 1) ? '<span class="label label-success">active</span>' : '<span class="label label-danger">not verified</span>';
                        $active = (!$row['status']) ? '<span class="pull-right" style="margin-left:20px"><a href="#activate" class="status" data-toggle="modal" data-id="' . $row['id'] . '"><i class="fa fa-edit"></i></a></span>' : '';
                        $admin = ($row['type'] == 1) ? ' <span title="admin" style="position:absolute;right:-10px;color:green"><i class="fa fa-check-circle" style=></i> </span>' : '';
 $tools = ($row['type'] == 1) ? 'N/A' : "<a href='cart.php?user=" . $row['id'] . "' style='color:white' ><button class='btn btn-success btn-flat btn-sm' id='quickview'><i class='fa fa-search'></i> Cart</button></a>
                      <button class='btn btn-success btn-sm edit btn-flat'  id='quickview' data-id=" . $row['id'] . "><i class='fa fa-edit'></i> Edit</button>
                      <button class='btn btn-danger btn-sm delete btn-flat'  data-id=" . $row['id'] . "><i class='fa fa-trash'></i> Delete</button>";

                      
                      if ($row['last_login'] > time()) {
                        $online_status = "online";
                        $color= "green";
                      }else{
                         $online_status = "Offline";
                      $color= "red"; 
                     }
                     
                       
			$output['mylist'] .= "
                   <tr>
                    <td>
                      <img src='" . $image . "' height='30px' class='img-circle' width='30px'>
                      <span class='pull-right'><a href='#edit_photo' class='photo' data-toggle='modal' data-id=" . $row['id'] . "><i class='fa fa-edit'></i></a></span>
                    </td>
                    <td style='position: relative;top: 0;left: 0;'>" . $row['email'] . "<span style='position: absolute;right: 10px;color:".$color."'><i class='fa fa-circle'></i>".$online_status."</span></td>
                    <td>" . $row['firstname'] . ' ' . $row['lastname'] . "</td>
                 <td  style='position:relative;right:0px'><h5>" .  $status. " " .  $active. " " .  $admin. "</h5>
                                                              
                                                        </td>
                    <td>" . date('M d, Y', strtotime($row['created_on'])) . "</td>
                    <td>
                     ".$tools."
                    </td>
                  </tr>
                        ";
	}
	

$pdo->close();
echo json_encode($output);

?>