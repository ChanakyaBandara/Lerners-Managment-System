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

	function creat_student_lerners_package($SID,$LID,$PID){
        $db = new DbConnect;
        $sql = "INSERT INTO `student_lerners_package`(`SID`, `LID`, `PACKID`) VALUES ('$SID','$LID','$PID')";

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

		$studSelectedLernersId = $_POST['studSelectedLernersId'];
		$studSelectedPackageId = $_POST['studSelectedPackageId'];

        $LID = creat_user($studRegTxtEmail,$Password,3);
        $db = new DbConnect;
        $sql = "INSERT INTO `student`(`Fname`, `Lname`, `nic`, `email`, `mobile`, `address`, `age`, `dob`, `gender`, `UID`) VALUES  ('$studRegTxtFname','$studRegTxtLname','$studRegTxtNIC','$studRegTxtEmail','$studRegTelPhone','$studRegTxtAddress','$studRegNumAge','$studRegDateBirth','$studRegSelGender','$LID')";

        if(!$conn = $db->connect()){
            echo "SQL Error";
            exit();
        }
        else {
            $conn->exec($sql);
            $last_id = $conn->lastInsertId();
			creat_student_lerners_package($last_id,$studSelectedLernersId,$studSelectedPackageId);
            echo '<script language="javascript">
			alert("Succesfully Registerd!");
			window.location.href = "../index.html"
			</script>';
			exit();
        }
    }


	if(isset($_POST['addFeedback'])) {
		$LerPackNumID = $_POST['LerPackNumID'];
		$studFeedback = $_POST['studFeedback'];
        $studRating = $_POST['studRating'];


       
        $db = new DbConnect;
        $sql = "INSERT INTO `feedback`( `SID`, `feedback`, `rating`) VALUES  ('$LerPackNumID','$studFeedback','$studRating')";

        if(!$conn = $db->connect()){
            echo "SQL Error";
            exit();
        }
        else {
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            echo '<script language="javascript">
			alert("Feedback Submited Succesfully!");
			window.location.href = "../student_add_feedback.html"
			</script>';
			exit();
        }
    }
    
    if(isset($_POST['addPayment'])) {
		$studPackageLid = $_POST['studPackageLid'];
		$studentID = $_POST['studentID'];
        $studPackageId = $_POST['studPackageId'];

        $db = new DbConnect;
        $sql = "INSERT INTO `payment`(`LID`, `SID`, `PACKID`) VALUES  ('$studPackageLid','$studentID','$studPackageId')";

        if(!$conn = $db->connect()){
            echo "SQL Error";
            exit();
        }
        else {
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            echo '<script language="javascript">
			alert("Payment Complete Succesfully!");
			window.location.href = "../student_payment.html"
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
    if(isset($_POST['viewFeedBack'])) {
		$db = new DbConnect;
		$conn = $db->connect();

		$stmt = $conn->prepare("SELECT * FROM `feedback` WHERE SID=".$_POST['viewFeedBack'].";");
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		echo json_encode($result);
	}
    if(isset($_POST['getPackage'])) {
		$db = new DbConnect;
		$conn = $db->connect();

		$stmt = $conn->prepare("SELECT * FROM package,student_lerners_package WHERE student_lerners_package.PACKID=package.PACKID AND student_lerners_package.SID=".$_POST['getPackage'].";");
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		echo json_encode($result);
	}

    if(isset($_POST['viewPayments'])) {
		$db = new DbConnect;
		$conn = $db->connect();

		$stmt = $conn->prepare("SELECT * FROM payment,package WHERE payment.PACKID=package.PACKID AND payment.SID=".$_POST['viewPayments'].";");
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		echo json_encode($result);
	}
    if(isset($_POST['viewSchedule'])) {
		$db = new DbConnect;
		$conn = $db->connect();

		$stmt = $conn->prepare("SELECT * FROM student_schedule,schedule WHERE student_schedule.SHID=schedule.SHID AND student_schedule.SID=".$_POST['viewSchedule'].";");
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

    if(isset($_POST['saveExam'])) {
		$examObj = json_decode($_POST['saveExam']);
		
		$contentSql="INSERT INTO `exam_content`(`EID`, `QID`, `answer`) VALUES ";
		$ContentArry = $examObj->Content;
		
		$db = new DbConnect;
        $sql = "INSERT INTO `exam`(`SID`, `result`) VALUES (".$examObj->SID.",".$examObj->Result.");";
        if(!$conn = $db->connect()){
            echo "SQL Error";
            exit();
        }
        else {
            $conn->exec($sql);
  			$last_id = $conn->lastInsertId();
			foreach ($ContentArry as $contentValue) {
			$contentSql .= "(".$last_id.",".$contentValue[0].",".$contentValue[1]."),";
			}
			$contentSql = substr_replace($contentSql,";",-1);
			$conn->exec($contentSql);
            echo "{result:1}";
			exit();
        }
	}

	if(isset($_POST['viewExamResults'])) {
		$db = new DbConnect;
		$conn = $db->connect();

		$stmt = $conn->prepare("SELECT exam.EID, exam.result, exam.timestamp FROM exam,student_lerners_package WHERE exam.SID=student_lerners_package.SID  AND exam.SID=".$_POST['viewExamResults'].";");
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		echo json_encode($result);
	}
