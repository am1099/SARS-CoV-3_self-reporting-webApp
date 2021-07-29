$(document).ready(function () {
  $('form').submit(function (event) {
    $('.form-group').removeClass('is-invalid'); // remove the error class
    $('.help-block').remove(); // remove the error text
    // get the data from self reporting form

    var formData = {
      email: $('input[name=email]').val(),
      fullname: $('input[name=fullname]').val(),
      gender: document.getElementById('gender').value,
      age: $('input[name=age]').val(),
      address: $('input[name=address]').val(),
      postcode: $('input[name=postcode]').val(),
      TTN: $('input[name=TTN]').val(),
      testresult: document.getElementById('testResult').value,
    };

    // process the form
    $.ajax({
      type: 'POST',
      url: 'process_form.php',
      data: formData,
      dataType: 'json',
      encode: true,
    }).done(function (data) {
      if (!data.success) {
        // Errors for email ---------------
        if (data.errors.email) {
          $('#email').addClass('is-invalid'); // add the error class to show red input
          $('#email-group').append(
            '<div class="help-block small-text"><strong>' +
              data.errors.email +
              '</strong></div>'
          );
        } else {
          // if no more error
          $('#email').removeClass('is-invalid');
          $('#email').addClass('is-valid'); // add success class
        }

        // Errors for fullname ---------------
        if (data.errors.fullname) {
          $('#fullname').addClass('is-invalid'); // add the error class to show red input
          $('#fullname-group').append(
            '<div class="help-block small-text"><strong>' +
              data.errors.fullname +
              '</strong></div>'
          );
        } else {
          $('#fullname').removeClass('is-invalid'); // remove error class
          $('#fullname').addClass('is-valid'); // add success class
        }

        // Errors for gender-----
        if (data.errors.gender) {
          $('#gender').addClass('is-invalid'); // add the error class to show red input
          $('#gender-group').append(
            '<div class="help-block small-text"><strong>' +
              data.errors.gender +
              '</strong></div>'
          );
        } else {
          $('#gender').removeClass('is-invalid'); // remove error class
          $('#gender').addClass('is-valid'); // add success class
        }

        // Errors for age ---------------
        if (data.errors.age) {
          $('#age').addClass('is-invalid'); // add the error class to show red input
          $('#age-group').append(
            '<div class="help-block small-text"><strong>' +
              data.errors.age +
              '</strong></div>'
          );
        } else {
          $('#age').removeClass('is-invalid'); // remove error class
          $('#age').addClass('is-valid'); // add success class
        }

        // Errors for address-----
        if (data.errors.address) {
          $('#address').addClass('is-invalid'); // add the error class to show red input
          $('#address-group').append(
            '<div class="help-block text-center small-text"><strong>' +
              data.errors.address +
              '</strong></div>'
          );
        } else {
          $('#address').removeClass('is-invalid'); // remove error class
          $('#address').addClass('is-valid'); // add success class
        }

        // Errors for postcode-----
        if (data.errors.postcode) {
          $('#postcode').addClass('is-invalid'); // add the error class to show red input
          $('#postcode-group').append(
            '<div class="help-block small-text"><strong>' +
              data.errors.postcode +
              '</strong></div>'
          );
        } else {
          $('#postcode').removeClass('is-invalid'); // remove error class
          $('#postcode').addClass('is-valid'); // add success class
        }

        // Errors for TTN-----
        if (data.errors.TTN) {
          $('#TTN').addClass('is-invalid'); // add the error class to show red input
          $('#TTN-group').append(
            '<div class="help-block text-center small-text"><strong>' +
              data.errors.TTN +
              '</strong></div>'
          );
        } else {
          $('#TTN').removeClass('is-invalid'); // remove error class
          $('#TTN').addClass('is-valid'); // add success class
        }

        // Errors for test result-----
        if (data.errors.testresult) {
          $('#testResult').addClass('is-invalid'); // add the error class to show red input
          $('#testresult-group').append(
            '<div class="help-block small-text"><strong>' +
              data.errors.testresult +
              '</strong></div>'
          );
        } else {
          $('#testResult').removeClass('is-invalid'); // remove error class
          $('#testResult').addClass('is-valid'); // add success class
        }
      } else {
        // Show success if form is submitted
        $('form').html(
          '<div class="alert alert-success"><strong>' +
            data.message +
            '</strong></div>' +
            '<a class="btn btn-primary " href="admin_home.php" role="button"> Homepage </a> <br>'
        );
      }
    });
    event.preventDefault();
  });
});
