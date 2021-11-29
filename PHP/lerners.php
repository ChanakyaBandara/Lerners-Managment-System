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


	if(isset($_POST['addLearners'])) {
		$LearnRegTxtName = $_POST['LearnRegTxtName'];
		$LearnRegNumRegNo = $_POST['LearnRegNumRegNo'];
        $LearnRegTxtOwner = $_POST['LearnRegTxtOwner'];
        $LearnRegTxtEmail = $_POST['LearnRegTxtEmail'];
		$LearnRegTxtLoc = $_POST['LearnRegTxtLoc'];
		$LearnTelTxtPhone = $_POST['LearnTelTxtPhone'];
	
        $Password = "123456789";


        $LID = creat_user($LearnRegTxtEmail,$Password,2);
        $db = new DbConnect;
        $sql = "INSERT INTO `lerners`(`name`, `reg_no`, `owner`, `email`, `location`, `mobile`, `UID`) VALUES  ('$LearnRegTxtName','$LearnRegNumRegNo','$LearnRegTxtOwner','$LearnRegTxtEmail','$LearnRegTxtLoc','$LearnTelTxtPhone','$LID')";

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

    if(isset($_POST['addPackage'])) {
		$LerPackTxtName = $_POST['LerPackTxtName'];
		$LerPackTxtDesc = $_POST['LerPackTxtDesc'];
        $LerPackDropDur = $_POST['LerPackDropDur'];
        $LerPackNumCost = $_POST['LerPackNumCost'];
        $LerPackNumID = $_POST['LerPackNumID']; 

        $db = new DbConnect;
        $sql = "INSERT INTO `package`(`LID`, `PACKname`, `desciption`, `duration`, `price`) VALUES  ('$LerPackNumID','$LerPackTxtName','$LerPackTxtDesc','$LerPackDropDur','$LerPackNumCost')";

        if(!$conn = $db->connect()){
            echo "SQL Error";
            exit();
        }
        else {
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            echo '<script language="javascript">
			alert("Package Added Succesfully !");
			window.location.href = "../learners_packages.html"
			</script>';
			exit();
        }
    }
    if(isset($_POST['addQuestion'])) {
		$lerQbnktxtQues = $_POST['lerQbnktxtQues'];
		$lerQbnktxtAns1 = $_POST['lerQbnktxtAns1'];
        $lerQbnktxtAns2 = $_POST['lerQbnktxtAns2'];
        $lerQbnktxtAns3 = $_POST['lerQbnktxtAns3'];
        $lerQbnktxtAns4 = $_POST['lerQbnktxtAns4']; 
        $lerQbnktxtCortAns = $_POST['lerQbnktxtCortAns'];
        $lerQbnktxtID = $_POST['lerQbnktxtID'];  

        $db = new DbConnect;
        $sql = "INSERT INTO `question_bank`(`content`, `answer_1`, `answer_2`, `answer_3`, `answer_4`, `correct_answer`, `LID`) VALUES  ('$lerQbnktxtQues','$lerQbnktxtAns1','$lerQbnktxtAns2','$lerQbnktxtAns3','$lerQbnktxtAns4','$lerQbnktxtCortAns','$lerQbnktxtID')";

        if(!$conn = $db->connect()){
            echo "SQL Error";
            exit();
        }
        else {
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            echo '<script language="javascript">
			alert("Question Added Succesfully !");
			window.location.href = "../learners_question_book.html"
			</script>';
			exit();
        }
    }
    
    if(isset($_POST['addSchedule'])) {
		$lernSchedtxtName = $_POST['lernSchedtxtName'];
		$lernScheddropDay = $_POST['lernScheddropDay'];
        $lernScheddropDur = $_POST['lernScheddropDur'];
        $lernSchedtxtID = $_POST['lernSchedtxtID'];
 

        $db = new DbConnect;
        $sql = "INSERT INTO `schedule`(`LID`, `name`, `day`, `duration`) VALUES  ('$lernSchedtxtID','$lernSchedtxtName','$lernScheddropDay','$lernScheddropDur')";

        if(!$conn = $db->connect()){
            echo "SQL Error";
            exit();
        }
        else {
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            echo '<script language="javascript">
			alert("Schedule Added Succesfully !");
			window.location.href = "../learners_schedule.html"
			</script>';
			exit();
        }
    }

    if(isset($_POST['viewQuestions'])) {
		$db = new DbConnect;
		$conn = $db->connect();

		$stmt = $conn->prepare("SELECT * FROM `question_bank` WHERE LID=".$_POST['viewQuestions'].";");
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		echo json_encode($result);
	}

    if(isset($_POST['viewPackages'])) {
		$db = new DbConnect;
		$conn = $db->connect();

		$stmt = $conn->prepare("SELECT * FROM `package` WHERE LID=".$_POST['viewPackages'].";");
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		echo json_encode($result);
	}

    if(isset($_POST['viewProfile'])) {
		$db = new DbConnect;
		$conn = $db->connect();

		$stmt = $conn->prepare("SELECT * FROM `lerners` WHERE LID=".$_POST['viewProfile'].";");
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		echo json_encode($result);
	}
    if(isset($_POST['viewStudents'])) {
		$db = new DbConnect;
		$conn = $db->connect();

		$stmt = $conn->prepare("SELECT student.Fname, student.Lname, student.nic, student.email, student.mobile, student.address, student.age, student.dob, student.gender FROM `student`,`student_lerners_package`,`lerners` WHERE student_lerners_package.SID=student.SID AND student_lerners_package.LID=lerners.LID AND  lerners.LID=".$_POST['viewStudents'].";");
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		echo json_encode($result);
	}

    
    if(isset($_POST['viewPayments'])) {
		$db = new DbConnect;
		$conn = $db->connect();

		$stmt = $conn->prepare("SELECT student.Fname, student.Lname, package.PACKname, payment.timestamp FROM `payment`,`student`,`lerners`,`package` WHERE payment.LID=lerners.LID AND payment.SID=student.SID AND payment.PACKID=package.PACKID AND lerners.LID=".$_POST['viewPayments'].";");
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
        echo json_encode($result);
	}

    if(isset($_POST['viewSchedule'])) {
		$db = new DbConnect;
		$conn = $db->connect();

		$stmt = $conn->prepare("SELECT * FROM `schedule` WHERE LID =".$_POST['viewSchedule'].";");
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
        echo json_encode($result);
	}
    
    if(isset($_POST['viewFeedBack'])) {
		$db = new DbConnect;
		$conn = $db->connect();

		$stmt = $conn->prepare("SELECT * FROM student_lerners_package,feedback WHERE student_lerners_package.SID=feedback.SID AND student_lerners_package.LID=".$_POST['viewFeedBack'].";");
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		echo json_encode($result);
	}

    if(isset($_POST['viewExamResults'])) {
		$db = new DbConnect;
		$conn = $db->connect();

		$stmt = $conn->prepare("SELECT exam.EID, student.Fname, student.Lname, exam.result, exam.timestamp FROM exam,student_lerners_package,student WHERE exam.SID=student.SID AND exam.SID=student_lerners_package.SID  AND student_lerners_package.LID=".$_POST['viewExamResults'].";");
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		echo json_encode($result);
	}


        ?>

