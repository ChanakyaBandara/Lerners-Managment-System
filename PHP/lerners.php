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

        ?>