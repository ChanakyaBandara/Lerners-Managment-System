<?php
	
	if(isset($_POST['log-in'])){

		require 'dbconnect.php';
		
		$username = $_POST['uname'];
		$password = $_POST['pword'];

		if(empty($username) || empty($password)){

			echo'<script language="javascript">
						window.alert("Please fill the empty fields")
						window.location.href = "../index.html"
						</script>';
						exit();
		}else{

			$sql = "SELECT * FROM login WHERE username=\"" . $username . "\"";

			$db = new DbConnect;

			if(!$conn = $db->connect()){

				echo'<script language="javascript">
						window.alert("SQL ERROR. Please check the SQL code ")
						window.location.href = "../index.html"
						</script>';
						exit();
						
			}else{

				$stmt = $conn->prepare($sql);
				$stmt->execute();
				
				if($result = $stmt->fetchAll(PDO::FETCH_ASSOC)){
					
					$passveri;
					$ID;
					$Sts;

					foreach ($result as $rows) {
                        $passveri = $rows['password'];
                        $ID = $rows['UID'];
                        $Sts = $rows['type'];
                    }

					$pwdcheck = false;

					if (password_verify($password, $passveri)){
						$pwdcheck = true;
					}

					if($pwdcheck == false){
						echo'<script language="javascript">
						window.alert("You entered a Wrong Password !")
						window.location.href = "../index.html"
						</script>';
						exit();
						
					}else if($pwdcheck == true){
						$status = $Sts;

						switch ($status) {
							case '1':

								$SQLsub = "SELECT `AID`,`name` FROM `admin` WHERE UID = " . $ID . "";
								$stmt = $conn->prepare($SQLsub);
								$stmt->execute();

								if($result = $stmt->fetchAll(PDO::FETCH_ASSOC)){

									$AdmId;
									$AdmName;
								

									foreach ($result as $rows) {
	                                     $AdmId = $rows['AID'];
										 $AdmName = $rows['name'];
									
				                    }
                                    
                                    echo '<script language="javascript">
									localStorage.setItem("ID","'.$AdmId.'");
									localStorage.setItem("uname","'.$AdmName.'");
							
									window.location.href = "../admin_index.html"
									</script>';
									exit();
                                }

								break;

							case '2':
								
								$SQLsub = "SELECT LID,name FROM `lerners` WHERE UID = " . $ID . "";
								echo $SQLsub;
								$stmt = $conn->prepare($SQLsub);
								$stmt->execute();

								if($result = $stmt->fetchAll(PDO::FETCH_ASSOC)){

									$FName;
									$Lname;
									$DID;
									$Photo;

									foreach ($result as $rows) {
										$DID = $rows['LID'];
                                        $FName = $rows['name'];
									
				                    }
                                    
                                    echo '<script language="javascript">
                                    localStorage.setItem("did","'.$DID.'");
									localStorage.setItem("uname","'.$FName.'");

									
									window.location.href = "../learners_index.html"
									</script>';
									exit();
                                }
								
								break;
								case '3':
								
									$SQLsub = "SELECT SID,Fname,Lname FROM `student` WHERE UID = " . $ID . "";
									echo $SQLsub;
									$stmt = $conn->prepare($SQLsub);
									$stmt->execute();
	
									if($result = $stmt->fetchAll(PDO::FETCH_ASSOC)){
	
										$FName;
										$Lname;
										$DID;
										$Photo;
	
										foreach ($result as $rows) {
											$DID = $rows['SID'];
											$FName = $rows['Fname'];
											$Lname = $rows['Lname'];
										
										}
										
										echo '<script language="javascript">
										localStorage.setItem("did","'.$DID.'");
										localStorage.setItem("uname","'.$FName.'");
										localStorage.setItem("Lname","'.$Lname.'");
	
										
										window.location.href = "../learners_index.html"
										</script>';
										exit();
									}
									
									break;
	
							default:
								echo'<script language="javascript">
								window.alert("Error")
								window.location.href = "../index.html"
								</script>';
								exit();
								break;
						}
				
					}else{
						echo'<script language="javascript">
						window.alert("You entered a Wrong Password !")
						window.location.href = "../index.html"
						</script>';
						exit();
						
					}

				}else{
					echo'<script language="javascript">
						window.alert("Username incorrect! Please check the username and try again..")
						window.location.href = "../index.html"
						</script>';
						exit();
				}
			}
		}
	}else{

		echo'<script language="javascript">
		window.alert("Wrong connection")
		window.location.href = "../index.html"
		</script>';
		exit();

	}
	
?>