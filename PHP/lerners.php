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

		$stmt = $conn->prepare("SELECT student.Fname, student.Lname, student.nic, student.email, student.mobile, student.address, student.age, student.dob, student.gender, package.PACKname, schedule.name  AS schedule FROM `student`,`student_lerners_package`,`lerners`,`package`,`student_schedule`,`schedule` WHERE student_lerners_package.SID=student.SID AND student_lerners_package.LID=lerners.LID AND student_lerners_package.PACKID=package.PACKID AND student_schedule.SID=student.SID AND student_schedule.SHID=schedule.SHID AND lerners.LID=".$_POST['viewStudents'].";");
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		echo json_encode($result);
	}

    
    if(isset($_POST['viewPayments'])) {
		$db = new DbConnect;
		$conn = $db->connect();

		$stmt = $conn->prepare("SELECT student.Fname, student.Lname, package.PACKname, package.price, payment.timestamp FROM `payment`,`student`,`lerners`,`package` WHERE payment.LID=lerners.LID AND payment.SID=student.SID AND payment.PACKID=package.PACKID AND lerners.LID=".$_POST['viewPayments'].";");
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

		$stmt = $conn->prepare("SELECT student.Fname,student.Lname,student.email,feedback.feedback,feedback.rating,feedback.timestamp FROM student_lerners_package,feedback,student WHERE student_lerners_package.SID=feedback.SID AND student.SID=feedback.SID AND student_lerners_package.LID=".$_POST['viewFeedBack'].";");
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

    // if(isset($_POST['lernersDashboard'])) {
    //     $db = new DbConnect;
    //     $conn = $db->connect();

    //     $adminDashboardObj = new \stdClass();

    //     $stmt = $conn->prepare("SELECT COUNT(SID) AS student_count FROM `student`");
    //     $stmt->execute();
    //     $studentCount_result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //     $adminDashboardObj->studentCount =$studentCount_result[0]['student_count'];

    //     $stmt = $conn->prepare("SELECT COUNT(LID) AS lerners_count FROM `lerners`");
    //     $stmt->execute();
    //     $lernersCount_result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //     $adminDashboardObj->lernersCount =$lernersCount_result[0]['lerners_count'];

    //     $stmt = $conn->prepare("SELECT COUNT(QID) AS question_bank_count FROM `question_bank`");
    //     $stmt->execute();
    //     $question_bankCount_result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //     $adminDashboardObj->question_bankCount =$question_bankCount_result[0]['question_bank_count'];

    //     $stmt = $conn->prepare("SELECT SUM(package.price)  AS tot_payment FROM `payment`,`package` WHERE `payment`.`PACKID`=`package`.`PACKID`");
    //     $stmt->execute();
    //     $tot_payment_result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //     $adminDashboardObj->tot_payment =$tot_payment_result[0]['tot_payment'];

    //     $stmt = $conn->prepare("SELECT * FROM `lerners` LIMIT 5;");
    //     $stmt->execute();
    //     $adminDashboardObj->lernersList = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //     $stmt = $conn->prepare("SELECT * FROM `student` LIMIT 5;");
    //     $stmt->execute();
    //     $adminDashboardObj->studentList = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //     echo json_encode($adminDashboardObj);
    // }


    if(isset($_POST['lernersDashboard'])) {
		$db = new DbConnect;
		$conn = $db->connect();

		$lernersDashboardObj = new \stdClass();

		$stmt = $conn->prepare("SELECT COUNT(SLPID) AS student_count FROM `student_lerners_package` WHERE LID=".$_POST['lernersDashboard'].";");
		$stmt->execute();
		$studentCount_result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$lernersDashboardObj->studentCount =$studentCount_result[0]['student_count'];

		$stmt = $conn->prepare("SELECT COUNT(PACKID) AS package_count FROM `package` WHERE LID =".$_POST['lernersDashboard'].";");
		$stmt->execute();
		$packageCount_result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$lernersDashboardObj->packageCount =$packageCount_result[0]['package_count'];

		$stmt = $conn->prepare("SELECT Count(schedule.SHID) AS schedule_count FROM `schedule`WHERE LID=".$_POST['lernersDashboard'].";");
		$stmt->execute();
		$schedule_result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$lernersDashboardObj->schedulecount =$schedule_result[0]['schedule_count'];

		$stmt = $conn->prepare("SELECT SUM(package.price)  AS package_payment FROM `payment`,`package` WHERE payment.PACKID=package.PACKID AND payment.LID=".$_POST['lernersDashboard'].";");
		$stmt->execute();
		$packagepayment_result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$lernersDashboardObj->packagepayment =$packagepayment_result[0]['package_payment'];

		$stmt = $conn->prepare("SELECT * FROM `package` WHERE LID=".$_POST['lernersDashboard']." LIMIT 5;");
		$stmt->execute();
		$lernersDashboardObj->PackageList = $stmt->fetchAll(PDO::FETCH_ASSOC);

		$stmt = $conn->prepare("SELECT * FROM `student_lerners_package`,`student` WHERE LID=".$_POST['lernersDashboard']." LIMIT 5;");
		$stmt->execute();
		$lernersDashboardObj->StudentList = $stmt->fetchAll(PDO::FETCH_ASSOC);

		echo json_encode($lernersDashboardObj);
	}


        ?>

