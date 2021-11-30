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
      "<thead><th>First name</th><th>Last Name</th><th>NIC</th><th>Email</th><th>Mobile</th><th>Address</th><th>Age</th><th>Date of Birth</th><th>Gender</th></thead>"
    );
    result.forEach(function (result) {
      $("#adminViewStudentsTBL").append(
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
        result.dob +
        "</td><td>" +
        maleFemale(result.gender) +
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
      "<thead><th>Invoice ID</th><th>Learners Name</th><th>Student Name</th><th>PakageName</th><th>Amount</th>><th>Time</th></thead>"
    );
    result.forEach(function (result) {
      $("#adminViewPaymentsTBL").append(
        "<tr><td>" +
        result.PID +
        "</td><td>" +
        result.name +
        "</td><td>" +
        result.Fname +
        "</td><td>" +
        result.PACKname +
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
      "<thead><th>Exam</th><th>Learners Name</th><th>Student Name</th>><th>Result</th>><th>Time</th></thead>"
    );
    result.forEach(function (result) {
      $("#adminViewExamResultsTBL").append(
        "<tr><td>" +
        result.EID +
        "</td><td>" +
        result.name +
        "</td><td>" +
        result.Fname + " " + result.Lname +
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

$(document).ready(function () {

  $.ajax({
    url: "PHP/admin.php",
    method: "post",
    data: "viewLearners=" + 5,
  }).done(function (result) {
    console.log(result);
    result = JSON.parse(result);
    //console.log(result);
    $("#lernersListTBL").empty();
    $("#lernersListTBL").append(
      "<thead><th>Name</th><th>Email</th><th>Location</th><th>Contact No</th></thead>"
    );
    result.forEach(function (result) {
      $("#lernersListTBL").append(
        "<tr  onClick='lernersListTBLRowClick(" + result.LID + ",\"" + result.name + "\")'><td>" +
        result.name +
        "</td><td>" +
        result.email +
        "</td><td>" +
        result.location +
        "</td><td>" +
        result.mobile +
        "</td></tr>"
      );
    });
    $("#lernersListTBL").append("</tbody>");
  });

  
});


function maleFemale(str) {
  if (str === "m") {
    return "Male"
  } else {
    return "Female"
  }
}

function lernersListTBLRowClick(LID,name){
  console.log("testlog",LID,name)
  document.getElementById("studSelectedLernersId").value = LID
  document.getElementById("studSelectedLerners").innerHTML = "Selected Driving School - "+name
  
  $.ajax({
    url: "PHP/lerners.php",
    method: "post",
    data: "viewPackages=" + LID,
  }).done(function (result) {
    console.log(result);
    result = JSON.parse(result);
    //console.log(result);
    $("#PackageListTBL").empty();
    $("#PackageListTBL").append(
      "<thead><th>Package Name</th><th>Package Description</th><th>Package Duration</th><th>Package Cost</th></thead>"
    );
    result.forEach(function (result) {
      $("#PackageListTBL").append(
        "<tr  onClick='packageListTBLRowClick(" + result.PACKID + ",\"" + result.PACKname + "\")'><td>" +
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
    $("#PackageListTBL").append("</tbody>");
  });
}

function packageListTBLRowClick(PID,name){
  console.log("testlog pack",PID,name)
  document.getElementById("studSelectedPackageId").value = PID
  document.getElementById("studSelectedPackage").innerHTML = "Selected Package - "+name
}