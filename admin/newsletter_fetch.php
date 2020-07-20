<?php
                        $output = array();
$conn = $pdo->open();
                                        try {
                                            $stmt = $conn->prepare("SELECT * FROM newsletter");
                                            $stmt->execute();
                                            foreach ($stmt as $row) {
                                    $status = ($row['status'] == 1) ? ' <span title="verified" style="color:green"><i class="fa fa-check-circle" style=></i> </span>' : '';
                            $output .= "
                    <tr>
                    <td>" . $row['id'] . "</td>
                    <td>" . $row['email_id'] . " ".$status."</td>
                    <td>
                         <button class='btn btn-danger btn-sm delete btn-flat'  data-id='" . $row['id'] . "'><i class='fa fa-trash'></i> Delete</button>
                    </td>

                    ";
                                            }
                                        } catch (PDOException $e) {
                                            echo $e->getMessage();
                                        }
                                        $pdo->close();
                           echo json_encode($output);             