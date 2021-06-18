function checkRegistration() {


    registration_alert = $("#registration_alert");

    name_ = $('#name');
    email = $("#email");
    password = $("#password");
    confirm_password = $("#confirm_password");
    let _token = $('meta[name="csrf-token"]').attr('content');

    email_msg = $("#invalid-email");
    name_msg = $("#invalid-name");
    password_msg = $("#invalid-password");
    confirm_password_msg = $("#invalid-confirm_password");

    var name_regularExpression = /^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/u;
    var email_regularExpression = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
    var error = false;

    if (name_.val().trim() === "") {
        name_msg.html("The name field must not be empty");
        email_msg.html("");
        password_msg.html("");
        confirm_password_msg.html("");
        name_.focus();
        error = true;
    } else if (!name_.val().trim().match(name_regularExpression)) {
        name_msg.html("The name must only contains letters, no digits or special characters");
        email_msg.html("");
        password_msg.html("");
        confirm_password_msg.html("");
        name_.focus();
        error = true;
    } else if (email.val().trim() === "") {
        email_msg.html("The email field must not be empty");
        name_msg.html("");
        password_msg.html("");
        confirm_password_msg.html("");
        email.focus();
        error = true;
    } else if (!email.val().trim().match(email_regularExpression)) {
        email_msg.html("The email format is wrong");
        name_msg.html("");
        password_msg.html("");
        confirm_password_msg.html("");
        email.focus();
        error = true;
    } else if (password.val().trim() === "") {
        password_msg.html("The password field must not be empty");
        name_msg.html("");
        email_msg.html("");
        confirm_password_msg.html("");
        password.focus();
        error = true;
    } else if (confirm_password.val().trim() === "") {
        confirm_password_msg.html("The confirmation password field must not be empty");
        name_msg.html("");
        email_msg.html("");
        password_msg.html("");
        confirm_password.focus();
        error = true;
    }

    if (!error) {

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

                if (response.validation) {
                    $('form[name=register]').submit();

                } else {
                    name_msg.html("");
                    email_msg.html("");
                    password_msg.html("");
                    confirm_password_msg.html("");
                    confirm_password.focus();
                    registration_alert.html("Password errata o email gia utilizzata da un altro utente");

                }
            },
        });
    }
}
