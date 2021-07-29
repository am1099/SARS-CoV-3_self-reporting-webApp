$(document).ready(function () {
  $('#login').click(function (event) {
    $('.form-group').removeClass('is-invalid'); // remove the error class
    $('.help-block').remove(); // remove the error text
    // get the data from the login form
    var formData = {
      username: $('input[name=username]').val(),
      password: $('input[name=password]').val(),
    };
    // process the form
    $.ajax({
      type: 'POST',
      url: 'process_loginForm.php',
      data: formData,
      dataType: 'json',
      encode: true,
    }).done(function (data) {
      if (!data.success) {
        // Errors for username ---------------
        if (data.errors.username) {
          $('#username').addClass('is-invalid'); // add the error class to show red input
          $('#username-group').append(
            '<div class="help-block small-text"><strong>' +
              data.errors.username +
              '</strong></div>'
          );
        } else {
          // if no more error
          $('#username').removeClass('is-invalid');
          $('#username').addClass('is-valid'); // add success class
        }

        // Errors for fullname ---------------
        if (data.errors.password) {
          $('#password').addClass('is-invalid'); // add the error class to show red input
          $('#password-group').append(
            '<div class="help-block small-text"><strong>' +
              data.errors.password +
              '</strong></div>'
          );
        } else {
          $('#password').removeClass('is-invalid'); // remove error class
          $('#password').addClass('is-valid'); // add success class
        }
      } else {
        // Has worked and show success message
        // go to homepage

        window.location.href = 'admin_home.php';
      }
    });
    event.preventDefault();
  });
});
