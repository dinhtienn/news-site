// Facebook SDK
window.fbAsyncInit = function() {
    FB.init({
        appId      : facebookClientId,
        cookie     : true,
        xfbml      : true,
        version    : 'v3.3'
    });

    FB.AppEvents.logPageView();
};

(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) {return;}
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

// Check login
$('#login-form').on('submit', function (e) {
    e.preventDefault();
    $.ajax({
        url: checkUserRoute,
        method: 'GET',
        data: {
            email: $('#login-email').val(),
            password: $('#login-password').val()
        },
        success: (data) => {
            if (!data) {
                $('#login-error').text(failLoginMessage);
                $('#login-email').addClass('border-red-theme');
                $('#login-password').addClass('border-red-theme');
            } else {
                e.currentTarget.submit();
            }
        }
    });
});

// Logout
$('#btn-logout').on('click', function () {
    $('#logout-form').submit();
});

// Check register
let checkRegisterValidate = false;
$('#register-form').on('submit', function (e) {
    e.preventDefault();
    $('#register-error').text('');
    $('#register-username').removeClass('border-red-theme');
    $('#register-email').removeClass('border-red-theme');
    $('#register-password').removeClass('border-red-theme');
    $('#confirm-password').removeClass('border-red-theme');

    validate();
    if (checkRegisterValidate) {
        e.currentTarget.submit();
    }
});

function validate() {
    $.ajax({
        url: checkUsernameRoute,
        method: 'GET',
        data: {
            username: $('#register-username').val(),
        },
        success: (data) => {
            if (data) {
                $('#register-username').addClass('border-red-theme');
                $('#register-error').text(duplicateUsernameMessage);
            } else {
                checkEmail();
            }
        }
    });
}

function checkEmail() {
    $.ajax({
        url: checkEmailRoute,
        method: 'GET',
        data: {
            email: $('#register-email').val(),
        },
        success: (data) => {
            if (data) {
                $('#register-email').addClass('border-red-theme');
                $('#register-error').text(duplicateEmailMessage);
            } else {
                checkPassword()
            }
        }
    });
}

function checkPassword() {
    if ($('#register-password').val().length < 6) {
        $('#register-password').addClass('border-red-theme');
        $('#register-error').text(passwordLengthMessage);
    } else {
        confirmPassword();
    }
}

function confirmPassword() {
    if ($('#register-password').val() !== $('#confirm-password').val()) {
        $('#register-password').addClass('border-red-theme');
        $('#confirm-password').addClass('border-red-theme');
        $('#register-error').text(notMatchPasswordMessage);
    } else {
        checkRegisterValidate = true;
        $('#register-form').submit();
    }
}

$( document ).ready(function() {
    if (checkLoginSocialErrors) {
        $('#btn-auth').click();
    }
});
