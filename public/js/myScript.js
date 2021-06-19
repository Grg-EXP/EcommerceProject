function checkRegistration() {

    registration_alert = $("#registration_alert");

    name_ = $('#name');
    email = $("#email");
    password = $("#password");
    confirm_password = $("#confirm_password");
    let _token = $('meta[name="csrf-token"]').attr('content');

    invalid_email = $("#invalid-email");
    empty_email = $("#empty-email");
    invalid_name = $("#invalid-name");
    empty_name = $("#empty-name");

    empty_pw = $("#empty-pw");
    empty_cpw = $("#empty-cpw");


    var name_regularExpression = /^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/u;
    var email_regularExpression = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
    var error = false;
    registration_alert.hide();

    if (name_.val().trim() === "") {
        empty_email.hide();
        invalid_email.hide();
        empty_name.show();
        invalid_name.hide();
        empty_pw.hide();
        empty_cpw.hide();
        name_.focus();
        error = true;
    } else if (!name_.val().trim().match(name_regularExpression)) {
        empty_email.hide();
        invalid_email.hide();
        empty_name.hide();
        invalid_name.show();
        empty_pw.hide();
        empty_cpw.hide();
        name_.focus();
        error = true;
    } else if (email.val().trim() === "") {
        empty_email.show();
        invalid_email.hide();
        empty_name.hide();
        invalid_name.hide();
        empty_pw.hide();
        empty_cpw.hide();
        email.focus();
        error = true;
    } else if (!email.val().trim().match(email_regularExpression)) {
        empty_email.hide();
        invalid_email.show();
        empty_name.hide();
        invalid_name.hide();
        empty_pw.hide();
        empty_cpw.hide();
        email.focus();
        error = true;
    } else if (password.val().trim() === "") {
        empty_email.hide();
        invalid_email.hide();
        empty_name.hide();
        invalid_name.hide();
        empty_pw.show();
        empty_cpw.hide();
        password.focus();
        error = true;
    } else if (confirm_password.val().trim() === "") {
        empty_email.hide();
        invalid_email.hide();
        empty_name.hide();
        invalid_name.hide();
        empty_pw.hide();
        empty_cpw.show();
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
                    empty_email.hide();
                    invalid_email.hide();
                    empty_name.hide();
                    invalid_name.hide();
                    empty_pw.hide();
                    empty_cpw.hide();
                    confirm_password.focus();
                    registration_alert.show();
                }
            },
        });
    }
}

function checkLogin() {

    login_alert = $("#login-alert");

    email = $("#email");
    password = $("#password");
    let _token = $('meta[name="csrf-token"]').attr('content');


    invalid_email = $("#invalid-email");
    empty_pw = $("#empty-pw");
    empty_email = $("#empty-email");


    var email_regularExpression = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
    var error = false;
    login_alert.hide();

    if (email.val().trim() === "") {
        empty_email.show();
        empty_pw.hide();
        invalid_email.hide();
        email.focus();
        error = true;
    } else if (!email.val().trim().match(email_regularExpression)) {
        empty_email.hide();
        empty_pw.hide();
        invalid_email.show();
        email.focus();
        error = true;
    } else if (password.val().trim() === "") {
        empty_email.hide();
        empty_pw.show();
        invalid_email.hide();
        password.focus();
        error = true;
    }

    if (!error) {

        $.ajax({

            type: 'POST',

            url: '/ajaxLogin',

            data: {
                email: email.val(),
                password: password.val(),
                _token: _token,
            },

            success: function (response) {

                if (response.validation) {
                    $('form[name=login]').submit();

                } else {
                    empty_email.hide();
                    empty_pw.hide();
                    invalid_email.hide();
                    password.focus();
                    login_alert.show();
                }
            },
        });
    }
}
