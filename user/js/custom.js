$(document).on(function () {
  $(".checking_email").keyup(function (e) {

    var email = $(".checking_email").val();

    $.ajax({
      type: "POST",
      url: "code.js",
      data: {
        "check_submit_btn": 1,
        "email_id": email,
      },
      success: function (response) {
        alert(response);
        $(".error_email").text(response);
      },
    });
  });
});
