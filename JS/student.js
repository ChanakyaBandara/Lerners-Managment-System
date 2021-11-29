let SID = localStorage.getItem("sid");
console.log(SID);

$(document).ready(function () {

  $.ajax({
    url: "PHP/student.php",
    method: "post",
    data: "viewProfile=" + SID,
  }).done(function (result) {
    //console.log(result);
    result = JSON.parse(result);
    console.log(result);
    $("#studProftxtFName").empty();
    $("#studProftxtFName").val(result[0].Fname);
    $("#studProftxtLName").empty();
    $("#studProftxtLName").val(result[0].Lname);
    $("#studProftxtNIC").empty();
    $("#studProftxtNIC").val(result[0].nic);
    $("#studProftxtEmail").empty();
    $("#studProftxtEmail").val(result[0].email);
    $("#studProftxtAge").empty();
    $("#studProftxtAge").val(result[0].age);
    $("#studProftxtDOB").empty();
    $("#studProftxtDOB").val(result[0].dob);
    $("#studProftxtGend").empty();
    $("#studProftxtGend").val(result[0].gender);
    $("#studProftelAddress").empty();
    $("#studProftelAddress").val(result[0].address);
    $("#studProftelPhone").empty();
    $("#studProftelPhone").val(result[0].mobile);
  });
});

$(document).ready(function () {

  $.ajax({
    url: "PHP/student.php",
    method: "post",
    data: "viewLernProfile=" + SID,
  }).done(function (result) {
    console.log("result");
    result = JSON.parse(result);
    console.log(result);
    $("#studLernProftxtName").empty();
    $("#studLernProftxtName").val(result[0].name);
    $("#studLernProftxtRegNo").empty();
    $("#studLernProftxtRegNo").val(result[0].reg_no);
    $("#studLernProftxtOname").empty();
    $("#studLernProftxtOname").val(result[0].owner);
    $("#studLernProfEmailEmail").empty();
    $("#studLernProfEmailEmail").val(result[0].email);
    $("#studLernProfNumRating").empty();
    $("#studLernProfNumRating").val(result[0].rating);
    $("#studLernProftxtAddress").empty();
    $("#studLernProftxtAddress").val(result[0].location);
    $("#studLernProftelPhone").empty();
    $("#studLernProftelPhone").val(result[0].mobile);
  });
});

$(document).ready(function () {

  $.ajax({
    url: "PHP/student.php",
    method: "post",
    data: "getPackage=" + SID,
  }).done(function (result) {
    console.log("result");
    result = JSON.parse(result);
    console.log(result);
    $("#studPackageId").empty();
    $("#studPackageId").val(result[0].PACKID);
    $("#studPackageCost").empty();
    $("#studPackageCost").val(result[0].price);
    $("#studPackageLid").empty();
    $("#studPackageLid").val(result[0].LID);


  });
});
$(document).ready(function () {

  $.ajax({
    url: "PHP/student.php",
    method: "post",
    data: "viewFeedBack=" + SID,
  }).done(function (result) {
    console.log(result);
    result = JSON.parse(result);
    //console.log(result);
    $("#studentViewFeedbackTBL").empty();
    $("#studentViewFeedbackTBL").append(
      //`ph_ID`, `Ph_name`, `Ph_reg`, `LID`, `location`, `phone`
      "<thead><th>Rating</th><th>Feedback</th></thead>"
    );
    result.forEach(function (result) {
      $("#studentViewFeedbackTBL").append(
        "<tr><td>" +
        result.rating +
        "</td><td>" +
        result.feedback +
        "</td></tr>"
      );
    });
    $("#studentViewFeedbackTBL").append("</tbody>");
  });
});

$(document).ready(function () {

  $.ajax({
    url: "PHP/student.php",
    method: "post",
    data: "viewPayments=" + SID,
  }).done(function (result) {
    console.log(result);
    result = JSON.parse(result);
    //console.log(result);
    $("#studentViewPaymentsTBL").empty();
    $("#studentViewPaymentsTBL").append(
      //`ph_ID`, `Ph_name`, `Ph_reg`, `LID`, `location`, `phone`
      "<thead><th>Time</th><th>Package Name</th><th>Payment</th></thead>"
    );
    result.forEach(function (result) {
      $("#studentViewPaymentsTBL").append(
        "<tr><td>" +
        result.timestamp +
        "</td><td>" +
        result.PACKname +
        "</td><td>" +
        result.price +
        "</td></tr>"
      );
    });
    $("#studentViewPaymentsTBL").append("</tbody>");
  });
});

$(document).ready(function () {

  $.ajax({
    url: "PHP/student.php",
    method: "post",
    data: "viewSchedule=" + SID,
  }).done(function (result) {
    console.log(result);
    result = JSON.parse(result);
    //console.log(result);
    $("#studentViewScheduleTBL").empty();
    $("#studentViewScheduleTBL").append(
      //`ph_ID`, `Ph_name`, `Ph_reg`, `LID`, `location`, `phone`
      "<thead><th>Schedule Name</th><th>Days Name</th><th>Duration</th></thead>"
    );
    result.forEach(function (result) {
      $("#studentViewScheduleTBL").append(
        "<tr><td>" +
        result.name +
        "</td><td>" +
        result.day +
        "</td><td>" +
        result.duration +
        "</td></tr>"
      );
    });
    $("#studentViewScheduleTBL").append("</tbody>");
  });
});


