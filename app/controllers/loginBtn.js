$(document).ready(function() {
  $('#loginform').submit(function(e) {
    e.preventDefault();
    $.ajax({
      type: "POST",
      url: 'app/models/login.php',
      data: $(this).serialize(),
      success: function(response)
      {
        let jsonData = JSON.parse(response);
        console.log(jsonData);
        if (jsonData.success == "1"){
          location.href = '/';
        }
        else if (jsonData.success == "2"){
          errMessage('Check if the entered password is correct!');
        } else {
          errMessage('Invalid Credentials!');
        }
      }
    });
  });
});

function errMessage(err) {
  $('.error').html(err);
}