
$(document).on("submit", "form.js-register",function(event) {
    event.preventDefault();

    var _form = $(this);
    // var _error = $(".js-error", _form);

    var data = {
        email: $("input[type='email']", _form).val(),
        password: $("input[type='password']", _form).val()
    };

    // if (data.email.length < 6) {
    //     _error
    // .text("Please enter a valid email address")
    // .show();
    //     return false;
    // } else if (password.length < 11) {
      //_error
        //  .text("Please enter a passphrase that is at least 11 characters long.")
          //.show()
    //return false;
//}

    //_error.hide();

    return false;
})