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

    if(isset($_POST['viewProfile'])) {
		$db = new DbConnect;
		$conn = $db->connect();

		$stmt = $conn->prepare("SELECT * FROM `student` WHERE SID=".$_POST['viewProfile'].";");
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		echo json_encode($result);
	}

    if(isset($_POST['viewLernProfile'])) {
		$db = new DbConnect;
		$conn = $db->connect();

		$stmt = $conn->prepare("SELECT lerners.name, lerners.reg_no, lerners.owner, lerners.email, lerners.location, lerners.mobile, lerners.rating FROM `lerners`,`student_lerners_package`,`student` WHERE  student_lerners_package.SID=student.SID AND student_lerners_package.LID=lerners.LID AND student.SID=".$_POST['viewLernProfile'].";");
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		echo json_encode($result);
	}

    if(isset($_POST['getQuestions'])) {
		$db = new DbConnect;
		$conn = $db->connect();

		$stmt = $conn->prepare("SELECT * FROM `question_bank` ORDER BY RAND() LIMIT 20;");
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		echo json_encode($result);
	}
