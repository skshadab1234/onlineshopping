						<?php
						include 'includes/session.php';
						$conn = $pdo->open();

						$output = array('error' => false);
							$email_shadab=$_POST['email_shadab'];
						$password_shadab=$_POST['password_shadab'];
						$firstname_shadab=$_POST['firstname_shadab'];
						$lastname_shadab=$_POST['lastname_shadab'];
						$address_shadab=$_POST['address_shadab'];
						$contact_shadab=$_POST['contact_shadab'];


						if (isset($_POST['firstname_shadab'])  && isset($_POST['lastname_shadab']) && isset($_POST['email_shadab']) && isset($_POST['password_shadab'])  && isset($_POST['address_shadab'])  && isset($_POST['contact_shadab'] ) ){
							

							$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM users WHERE email=:email");
							$stmt->execute(['email' => $email_shadab]);
							$row = $stmt->fetch();

							if ($row['numrows'] > 0) {
								$output['message'] = 'Email already taken';
							} else {
								$password = password_hash($password_shadab, PASSWORD_DEFAULT);
								// $filename = $_FILES['photo']['name'];
								$now = date('Y-m-d');
								// if (!empty($filename)) {
								// 	move_uploaded_file($_FILES['photo']['tmp_name'], '../images/' . $filename);
								// }
								try {
									$stmt = $conn->prepare("INSERT INTO users (email, password, firstname, lastname, address, contact_info,  status, created_on) VALUES (:email, :password, :firstname, :lastname, :address, :contact, :status, :created_on)");
									$stmt->execute(['email' => $email_shadab, 'password' => $password, 'firstname' => $firstname_shadab, 'lastname' => $lastname_shadab, 'address' => $address_shadab, 'contact' => $contact_shadab,  'status' => 1, 'created_on' => $now]);
									$output['message'] = 'User added successfully';
								} catch (PDOException $e) {
									$output['message'] = $e->getMessage();
								}
							}

							$pdo->close();
						} else {
							$output['message'] = 'Fill up user form first';
						}

						$pdo->close();
						echo json_encode($output);
						?>