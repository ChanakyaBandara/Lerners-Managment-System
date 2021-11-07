let LeID  = localStorage.getItem("lid");
console.log(LeID);

$(document).ready(function () {
  
    $.ajax({
      url: "PHP/lerners.php",
      method: "post",
      data: "viewPackages=" + LeID,
    }).done(function (result) {
      console.log(result);
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
      data: "viewProfile=" + LeID,
    }).done(function (result) {
      console.log(result);
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