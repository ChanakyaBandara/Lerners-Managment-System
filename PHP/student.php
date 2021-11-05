<?php 
	require 'dbconnect.php';

	function creat_user($nic,$Password,$type){
        $db = new DbConnect;
        $hashed = password_hash($Password,PASSWORD_BCRYPT);
        $sql = "INSERT INTO  `login`( `username`, `password`, `type`) VALUES ('$nic','$hashed','$type')";

        if(!$conn = $db->connect()){
            echo "SQL Error";
            exit();
        }
        else {
            $conn->exec($sql);
            $last_id = $conn->lastInsertId();
            return $last_id;
        }
    }




	if(isset($_POST['addStudent'])) {
		$studRegTxtFname = $_POST['studRegTxtFname'];
		$studRegTxtLname = $_POST['studRegTxtLname'];
        $studRegTxtNIC = $_POST['studRegTxtNIC'];
        $studRegTxtEmail = $_POST['studRegTxtEmail'];
		$studRegSelGender = $_POST['studRegSelGender'];
		$studRegTxtAddress = $_POST['studRegTxtAddress'];
		$studRegTelPhone = $_POST['studRegTelPhone'];
        $studRegNumAge = $_POST['studRegNumAge'];
		$studRegDateBirth = $_POST['studRegDateBirth'];
        $Password = "123456789";


        $LID = creat_user($studRegTxtEmail,$Password,3);
        $db = new DbConnect;
        $sql = "INSERT INTO `student`(`Fname`, `Lname`, `nic`, `email`, `mobile`, `address`, `age`, `dob`, `gender`, `UID`) VALUES  ('$studRegTxtFname','$studRegTxtLname','$studRegTxtNIC','$studRegTxtEmail','$studRegTelPhone','$studRegTxtAddress','$studRegNumAge','$studRegDateBirth','$studRegSelGender','$LID')";

        if(!$conn = $db->connect()){
            echo "SQL Error";
            exit();
        }
        else {
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            echo '<script language="javascript">
			alert("Succesfully Registerd!");
			window.location.href = "../index.html"
			</script>';
			exit();
        }
    }

        ?>