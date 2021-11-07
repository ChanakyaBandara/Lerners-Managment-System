let SID  = localStorage.getItem("sid");
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