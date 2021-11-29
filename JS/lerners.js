let LeID  = localStorage.getItem("lid");
console.log(LeID);

$(document).ready(function () {
  
    $.ajax({
      url: "PHP/lerners.php",
      method: "post",
      data: "viewPackages=" + LeID,
    }).done(function (result) {
      //console.log(result);
      result = JSON.parse(result);
      //console.log(result);
      $("#lernersViewPackagesTBL").empty();
      $("#lernersViewPackagesTBL").append(
        //`ph_ID`, `Ph_name`, `Ph_reg`, `LID`, `location`, `phone`
        "<thead><th>Package Name</th><th>Package Description</th><th>Package Duration</th><th>Package Cost</th></thead>"
      );
      result.forEach(function (result) {
        $("#lernersViewPackagesTBL").append(
          "<tr><td>" +
          result.PACKname +
          "</td><td>" +
          result.desciption	 +
          "</td><td>" +
          result.duration +
          "</td><td>" +
          result.price	 +
          "</td></tr>"
        );
      });
      $("#lernersViewPackagesTBL").append("</tbody>");
    });
  });

  $(document).ready(function () {
  
    $.ajax({
      url: "PHP/lerners.php",
      method: "post",
      data: "viewQuestions=" + LeID,
    }).done(function (result) {
      console.log(result);
      result = JSON.parse(result);
      //console.log(result);
      $("#lernersViewQuestionTBL").empty();
      $("#lernersViewQuestionTBL").append(
        //`ph_ID`, `Ph_name`, `Ph_reg`, `LID`, `location`, `phone`
        "<thead><th>Question</th><th>Answer 1</th><th>Answer 2</th><th>Answer 3</th><th>Answer 4</th><<th>Correct Answer</th>/thead>"
      );
      result.forEach(function (result) {
        $("#lernersViewQuestionTBL").append(
          "<tr><td>" +
          result.content +
          "</td><td>" +
          result.answer_1	+
          "</td><td>" +
          result.answer_2	+
          "</td><td>" +
          result.answer_3	+
          "</td><td>" +
          result.answer_4	+
          "</td><td>" +
          result.correct_answer	 +
          "</td></tr>"
        );
      });
      $("#lernersViewQuestionTBL").append("</tbody>");
    });
  });
  

  $(document).ready(function () {
  
    $.ajax({
      url: "PHP/lerners.php",
      method: "post",
      data: "viewStudents=" + LeID,
    }).done(function (result) {
      console.log(result);
      result = JSON.parse(result);
      //console.log(result);
      $("#lernViewStudentsTBL").empty();
      $("#lernViewStudentsTBL").append(
        //`ph_ID`, `Ph_name`, `Ph_reg`, `LID`, `location`, `phone`
        "<thead><th>First name</th><th>Last Name</th><th>NIC</th><th>Email</th><th>Mobile</th><th>Address</th><th>Age</th><th>Date of Birth</th><th>Gender</th></thead>"
      );
      result.forEach(function (result) {
        $("#lernViewStudentsTBL").append(
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
      $("#lernViewStudentsTBL").append("</tbody>");
    });
  });

    $(document).ready(function () {
  
    $.ajax({
      url: "PHP/lerners.php",
      method: "post",
      data: "viewPayments=" + LeID,
    }).done(function (result) {
      console.log(result);
      result = JSON.parse(result);
      //console.log(result);
      $("#lernersViewPaymentsTBL").empty();
      $("#lernersViewPaymentsTBL").append(
        //`ph_ID`, `Ph_name`, `Ph_reg`, `LID`, `location`, `phone`
        "<thead><th>Student</th><th>Package</th><th>Time</th></thead>"
      );
      result.forEach(function (result) {
        $("#lernersViewPaymentsTBL").append(
          "<tr><td>" +
          result.Fname +" "+result.Lname +
          "</td><td>" +
          result.PACKname	+
          "</td><td>" +
          result.timestamp 	+
          "</td></tr>"
        );
      });
      $("#lernersViewPaymentsTBL").append("</tbody>");
    });
  });

  $(document).ready(function () {
  
    $.ajax({
      url: "PHP/lerners.php",
      method: "post",
      data: "viewSchedule=" + LeID,
    }).done(function (result) {
      console.log(result);
      result = JSON.parse(result);
      //console.log(result);
      $("#lernersViewScheduleTBL").empty();
      $("#lernersViewScheduleTBL").append(
        //`ph_ID`, `Ph_name`, `Ph_reg`, `LID`, `location`, `phone`
        "<thead><th>Name</th><th>Day</th><th>Duration</th></thead>"
      );
      result.forEach(function (result) {
        $("#lernersViewScheduleTBL").append(
          "<tr><td>" +
          result.name +
          "</td><td>" +
          result.day	+
          "</td><td>" +
          result.duration 	+
          "</td></tr>"
        );
      });
      $("#lernersViewScheduleTBL").append("</tbody>");
    });
  });

  $(document).ready(function () {
  
    $.ajax({
      url: "PHP/lerners.php",
      method: "post",
      data: "viewProfile=" + LeID,
    }).done(function (result) {
      //console.log(result);
      result = JSON.parse(result);
      console.log(result);
      $("#lernProftxtName").empty();
      $("#lernProftxtName").val(result[0].name);
      $("#lernProftxtRegNo").empty();
      $("#lernProftxtRegNo").val(result[0].reg_no);
      $("#lernProftxtOname").empty();
      $("#lernProftxtOname").val(result[0].owner);
      $("#lernProfEmailEmail").empty();
      $("#lernProfEmailEmail").val(result[0].email);
      $("#lernProfNumRating").empty();
      $("#lernProfNumRating").val(result[0].rating);
      $("#lernProftxtAddress").empty();
      $("#lernProftxtAddress").val(result[0].location);
      $("#lernProftelPhone").empty();
      $("#lernProftelPhone").val(result[0].mobile);
    });
  });

  $(document).ready(function () {
  
    $.ajax({
      url: "PHP/lerners.php",
      method: "post",
      data: "viewFeedBack=" + LeID,
    }).done(function (result) {
      console.log(result);
      result = JSON.parse(result);
      console.log(result);
      $("#lernersViewFeedbackTBL").empty();
      $("#lernersViewFeedbackTBL").append(
        //`ph_ID`, `Ph_name`, `Ph_reg`, `LID`, `location`, `phone`
        "<thead><th>Rating</th><th>Feedback</th></thead>"
      );
      result.forEach(function (result) {
        $("#lernersViewFeedbackTBL").append(
          "<tr><td>" +
          result.rating +
          "</td><td>" +
          result.feedback +
          "</td></tr>"
        );
      });
      $("#lernersViewFeedbackTBL").append("</tbody>");
    });
  });

  $(document).ready(function () {
  
    $.ajax({
      url: "PHP/lerners.php",
      method: "post",
      data: "viewExamResults=" + LeID,
    }).done(function (result) {
      console.log(result);
      result = JSON.parse(result);
      //console.log(result);
      $("#lernersViewExamResultsTBL").empty();
      $("#lernersViewExamResultsTBL").append(
        //`ph_ID`, `Ph_name`, `Ph_reg`, `LID`, `location`, `phone`
        "<thead><th>Exam</th><th>Student Name</th>><th>Result</th>><th>Time</th></thead>"
      );
      result.forEach(function (result) {
        $("#lernersViewExamResultsTBL").append(
          "<tr><td>" +
          result.EID +
          "</td><td>" +
          result.Fname +" "+result.Lname +
          "</td><td>" +
          result.result +
          "</td><td>" +
          result.timestamp +
          "</td></tr>"
        );
      });
      $("#lernersViewExamResultsTBL").append("</tbody>");
    });
  });