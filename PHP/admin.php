    
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

    


    ?>

