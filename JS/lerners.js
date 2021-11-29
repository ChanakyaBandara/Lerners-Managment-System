let LeID = localStorage.getItem("lid");
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
      "<thead><th>Package Name</th><th>Package Description</th><th>Package Duration</th><th>Package Cost</th></thead>"
    );
    result.forEach(function (result) {
      $("#lernersViewPackagesTBL").append(
        "<tr><td>" +
        result.PACKname +
        "</td><td>" +
        result.desciption +
        "</td><td>" +
        result.duration +
        "</td><td>" +
        result.price +
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
      "<thead><th>Question</th><th>Answer 1</th><th>Answer 2</th><th>Answer 3</th><th>Answer 4</th><<th>Correct Answer</th>/thead>"
    );
    result.forEach(function (result) {
      $("#lernersViewQuestionTBL").append(
        "<tr><td>" +
        result.content +
        "</td><td>" +
        result.answer_1 +
        "</td><td>" +
        result.answer_2 +
        "</td><td>" +
        result.answer_3 +
        "</td><td>" +
        result.answer_4 +
        "</td><td>" +
        result.correct_answer +
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
      "<thead><th>First name</th><th>Last Name</th><th>NIC</th><th>Email</th><th>Mobile</th><th>Address</th><th>Age</th><th>Gender</th><th>Package</th><th>Shedule</th></thead>"
    );
    result.forEach(function (result) {
      $("#lernViewStudentsTBL").append(
        "<tr><td>" +
        result.Fname +
        "</td><td>" +
        result.Lname +
        "</td><td>" +
        result.nic +
        "</td><td>" +
        result.email +
        "</td><td>" +
        result.mobile +
        "</td><td>" +
        result.address +
        "</td><td>" +
        result.age +
        "</td><td>" +
        maleFemale(result.gender)+
        "</td><td>" +
        result.PACKname +
        "</td><td>" +
        result.schedule +
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
      "<thead><th>Student</th><th>Package</th><th>Price</th><th>Time</th></thead>"
    );
    result.forEach(function (result) {
      $("#lernersViewPaymentsTBL").append(
        "<tr><td>" +
        result.Fname + " " + result.Lname +
        "</td><td>" +
        result.PACKname +
        "</td><td>" +
        result.price +
        "</td><td>" +
        result.timestamp +
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
      "<thead><th>Name</th><th>Day</th><th>Duration</th></thead>"
    );
    result.forEach(function (result) {
      $("#lernersViewScheduleTBL").append(
        "<tr><td>" +
        result.name +
        "</td><td>" +
        result.day +
        "</td><td>" +
        result.duration +
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
      "<thead><th>Student</th><th>Email</th><th>Rating</th><th>Feedback</th></thead>"
    );
    result.forEach(function (result) {
      $("#lernersViewFeedbackTBL").append(
        "<tr><td>" +
        result.Fname + " " + result.Lname +
        "</td><td>" +
        result.email +
        "</td><td>" +
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
      "<thead><th>Exam</th><th>Student Name</th>><th>Result</th>><th>Time</th></thead>"
    );
    result.forEach(function (result) {
      $("#lernersViewExamResultsTBL").append(
        "<tr><td>" +
        result.EID +
        "</td><td>" +
        result.Fname + " " + result.Lname +
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

function maleFemale(str) {
  if (str === "m") {
    return "Male"
  } else {
    return "Female"
  }
}