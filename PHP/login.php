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

			$sql = "SELECT * FROM login WHERE Email=\"" . $username . "\"";

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
                        $passveri = $rows['Password'];
                        $ID = $rows['LID'];
                        $Sts = $rows['Type'];
                    }

					$pwdcheck = false;

					if ($password == $passveri){
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

								$SQLsub = "SELECT `Fname`,`Lname`,`nic`,`photo` FROM `admin` WHERE LID = " . $ID . "";
								$stmt = $conn->prepare($SQLsub);
								$stmt->execute();

								if($result = $stmt->fetchAll(PDO::FETCH_ASSOC)){

									$AdmName;
									$NicNo;
									$Photo;

									foreach ($result as $rows) {
	                                     $AdmName = $rows['Fname'];
										 $NicNo = $rows['nic'];
										 $Photo = $rows['photo'];
				                    }
                                    
                                    echo '<script language="javascript">
									localStorage.setItem("admname","'.$AdmName.'");
									localStorage.setItem("nicno","'.$NicNo.'");
									localStorage.setItem("photo","'.$Photo.'");
									window.location.href = "../adm_index.html"
									</script>';
									exit();
                                }

								break;

							case '2':
								
								$SQLsub = "SELECT DID,Fname,Lname,photo FROM `doctor` WHERE LID = " . $ID . "";
								echo $SQLsub;
								$stmt = $conn->prepare($SQLsub);
								$stmt->execute();

								if($result = $stmt->fetchAll(PDO::FETCH_ASSOC)){

									$FName;
									$Lname;
									$DID;
									$Photo;

									foreach ($result as $rows) {
										$DID = $rows['DID'];
                                        $FName = $rows['Fname'];
										$LName = $rows['Lname'];
										$Photo = $rows['photo'];
				                    }
                                    
                                    echo '<script language="javascript">
                                    localStorage.setItem("did","'.$DID.'");
									localStorage.setItem("fname","'.$FName.'");
									localStorage.setItem("lname","'.$LName.'");
									localStorage.setItem("photo","'.$Photo.'");
									window.location.href = "../doc_clinic_new.html"
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