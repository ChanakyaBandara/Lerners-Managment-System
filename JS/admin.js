$(document).ready(function () {
  
    $.ajax({
      url: "PHP/admin.php",
      method: "post",
      data: "viewLearners=" + 5,
    }).done(function (result) {
      console.log(result);
      result = JSON.parse(result);
      //console.log(result);
      $("#adminViewLearnersTBL").empty();
      $("#adminViewLearnersTBL").append(
        //`ph_ID`, `Ph_name`, `Ph_reg`, `LID`, `location`, `phone`
        "<thead><th>Registration Id</th><th>Name</th><th>Owner</th><th>Email</th><th>Location</th><th>Contact No</th><th>Rating</th></thead>"
      );
      result.forEach(function (result) {
        $("#adminViewLearnersTBL").append(
          "<tr><td>" +
          result.reg_no +
          "</td><td>" +
          result.name +
          "</td><td>" +
          result.owner +
          "</td><td>" +
          result.email +
          "</td><td>" +
          result.location +
          "</td><td>" +
          result.mobile +
          "</td><td>" +
          result.rating +
          "</td></tr>"
        );
      });
      $("#adminViewLearnersTBL").append("</tbody>");
    });
  });

  $(document).ready(function () {
  
    $.ajax({
      url: "PHP/admin.php",
      method: "post",
      data: "viewStudents=" + 5,
    }).done(function (result) {
      console.log(result);
      result = JSON.parse(result);
      //console.log(result);
      $("#adminViewStudentsTBL").empty();
      $("#adminViewStudentsTBL").append(
        //`ph_ID`, `Ph_name`, `Ph_reg`, `LID`, `location`, `phone`
        "<thead><th>First name</th><th>Last Name</th><th>NIC</th><th>Email</th><th>Mobile</th><th>Address</th><th>Age</th><th>Date of Birth</th><th>Gender</th></thead>"
      );
      result.forEach(function (result) {
        $("#adminViewStudentsTBL").append(
          "<tr><td>" +
          result.Fname +
          "</td><td>" +
          result.Lname	 +
          "</td><td>" +
          result.nic +
          "</td><td>" +
          result.email	 +
          "</td><td>" +
          result.mobile +
          "</td><td>" +
          result.address +
          "</td><td>" +
          result.age +
          "</td><td>" +
          result.dob +
          "</td><td>" +
          result.gender +
          "</td></tr>"
        );
      });
      $("#adminViewStudentsTBL").append("</tbody>");
    });
  });

  $(document).ready(function () {
  
    $.ajax({
      url: "PHP/admin.php",
      method: "post",
      data: "viewPayments=" + 5,
    }).done(function (result) {
      console.log(result);
      result = JSON.parse(result);
      //console.log(result);
      $("#adminViewPaymentsTBL").empty();
      $("#adminViewPaymentsTBL").append(
        //`ph_ID`, `Ph_name`, `Ph_reg`, `LID`, `location`, `phone`
        "<thead><th>Invoice ID</th><th>Learners Name</th><th>Student Name</th><th>PakageName</th><th>Amount</th>><th>Time</th></thead>"
      );
      result.forEach(function (result) {
        $("#adminViewPaymentsTBL").append(
          "<tr><td>" +
          result.PID +
          "</td><td>" +
          result.name	 +
          "</td><td>" +
          result.Fname +
          "</td><td>" +
          result.PACKname	 +
          "</td><td>" +
          result.price +
          "</td><td>" +
          result.timestamp +
          "</td></tr>"
        );
      });
      $("#adminViewPaymentsTBL").append("</tbody>");
    });
  });


  $(document).ready(function () {
  
    $.ajax({
      url: "PHP/admin.php",
      method: "post",
      data: "viewExamResults=" + 5,
    }).done(function (result) {
      console.log(result);
      result = JSON.parse(result);
      //console.log(result);
      $("#adminViewExamResultsTBL").empty();
      $("#adminViewExamResultsTBL").append(
        //`ph_ID`, `Ph_name`, `Ph_reg`, `LID`, `location`, `phone`
        "<thead><th>Exam</th><th>Learners Name</th><th>Student Name</th>><th>Result</th>><th>Time</th></thead>"
      );
      result.forEach(function (result) {
        $("#adminViewExamResultsTBL").append(
          "<tr><td>" +
          result.EID +
          "</td><td>" +
          result.name	 +
          "</td><td>" +
          result.Fname +" "+result.Lname +
          "</td><td>" +
          result.result +
          "</td><td>" +
          result.timestamp +
          "</td></tr>"
        );
      });
      $("#adminViewExamResultsTBL").append("</tbody>");
    });
  });