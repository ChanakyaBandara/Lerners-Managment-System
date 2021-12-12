    
    <?php 
	require 'dbconnect.php';
    
    if(isset($_POST['viewLearners'])) {
		$db = new DbConnect;
		$conn = $db->connect();

		$stmt = $conn->prepare("SELECT * FROM `lerners`;");
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		echo json_encode($result);
	}

    if(isset($_POST['viewStudents'])) {
		$db = new DbConnect;
		$conn = $db->connect();

		$stmt = $conn->prepare("SELECT * FROM `student`;");
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		echo json_encode($result);
	}
    
    if(isset($_POST['viewPayments'])) {
		$db = new DbConnect;
		$conn = $db->connect();

		$stmt = $conn->prepare("SELECT payment.PID, lerners.name, student.Fname, package.PACKname, package.price, `timestamp` FROM `payment`,`package`,`student`,`lerners` WHERE payment.LID=lerners.LID AND payment.SID=student.SID AND payment.PACKID=package.PACKID;");
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		echo json_encode($result);
	}

	if(isset($_POST['viewExamResults'])) {
		$db = new DbConnect;
		$conn = $db->connect();

		$stmt = $conn->prepare("SELECT exam.EID, exam.result, exam.timestamp, lerners.name, student.Fname, student.Lname FROM exam,student_lerners_package,student,lerners WHERE exam.SID=student.SID AND exam.SID=student_lerners_package.SID  AND student_lerners_package.LID = lerners.LID");
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		echo json_encode($result);
	}

	if(isset($_POST['adminDashboard'])) {
		$db = new DbConnect;
		$conn = $db->connect();

		$adminDashboardObj = new \stdClass();

		$stmt = $conn->prepare("SELECT COUNT(SID) AS student_count FROM `student`");
		$stmt->execute();
		$studentCount_result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$adminDashboardObj->studentCount =$studentCount_result[0]['student_count'];

		$stmt = $conn->prepare("SELECT COUNT(LID) AS lerners_count FROM `lerners`");
		$stmt->execute();
		$lernersCount_result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$adminDashboardObj->lernersCount =$lernersCount_result[0]['lerners_count'];

		$stmt = $conn->prepare("SELECT COUNT(QID) AS question_bank_count FROM `question_bank`");
		$stmt->execute();
		$question_bankCount_result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$adminDashboardObj->question_bankCount =$question_bankCount_result[0]['question_bank_count'];

		$stmt = $conn->prepare("SELECT SUM(package.price)  AS tot_payment FROM `payment`,`package` WHERE `payment`.`PACKID`=`package`.`PACKID`");
		$stmt->execute();
		$tot_payment_result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$adminDashboardObj->tot_payment =$tot_payment_result[0]['tot_payment'];

		$stmt = $conn->prepare("SELECT * FROM `lerners` LIMIT 5;");
		$stmt->execute();
		$adminDashboardObj->lernersList = $stmt->fetchAll(PDO::FETCH_ASSOC);

		$stmt = $conn->prepare("SELECT * FROM `student` LIMIT 5;");
		$stmt->execute();
		$adminDashboardObj->studentList = $stmt->fetchAll(PDO::FETCH_ASSOC);

		echo json_encode($adminDashboardObj);
	}

    
	

    ?>

