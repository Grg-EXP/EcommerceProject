function checkRegistration() {

    registration_alert.html("f interna");

    registration_alert = $("#registration_alert");
    email = $("#email");
    password = $("#password");
    confirm_password = $("#confirm_password");
    let _token = $('meta[name="csrf-token"]').attr('content');

    $.ajax({

        type: 'POST',

        url: '/ajaxRegister',


        data: {
            email: email.val(),
            password: password.val(),
            confirm_password: confirm_password.val(),
            _token: _token,
        },

        success: function (response) {
            console.log(response);
            if (response.validation) {
                $('form[name=register]').submit();

            } else {
                registration_alert.html("Password errata o email gia utilizzata da un altro utente");

            }
        },
    });
}

