import { Notify } from './../../style/layout/notify.ts';
import { Validator } from "../../style/layout/validator.ts";

$( document ).ready(function() {
    let loginUrl = '/auth/authenticate';
    /* Save account - Register form */
    let saveAccUri  = '/auth/save-account';
    /* Restart password token */
    let generateTokenUri = '/auth/generate-restart-token';
    /* Generate new password */
    let generatePasswordUri = '/auth/generate-new-password';

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    let signMeIn = function(){
        let email    = $("#email").val();
        let password = $("#password").val();

        if(!Validator.email(email)){
            Notify.Me(["Uneseni email nije validan!", "warn"]);
            return;
        }

        $.ajax({
            url: loginUrl,
            method: 'POST',
            dataType: "json",
            data: {
                email: email,
                password: password
            },
            success: function success(response) {
                let code = response['code'];

                if(code === '0000'){
                    window.location = response['url'];
                }else{
                    Notify.Me([response['message'], "warn"]);
                }
            }
        });
    };

    $(".auth-btn").click(function () {
        signMeIn();
    });

    $(document).on('keypress',function(e) {
        if(e.which === 13) {
            if($(".auth-btn").length) signMeIn();
        }
    });

    /* -------------------------------------------------------------------------------------------------------------- */
    /*
     *  Create new profile; Steps included
     */

    let step = 1;
    let progressElements = function(){
        // $(".rf-body-element").addClass('d-none');
        // $(".rf-body-element-" + step).removeClass('d-none');
        //
        // (step === 1) ? $(".create-profile-back-btn").addClass('d-none') : $(".create-profile-back-btn").removeClass('d-none');
        //
        // if(step === 2){
        //     $(".pl-e-bar-fill").css('width', '49.98%');
        // }else if(step === 3){
        //     $(".pl-e-bar-fill").css('width', '83.3%');
        // }else if(step === 4){
        //     // $(".pl-e-bar-fill").css('width', '87.5%');
        //     // $(".button-wrapper").addClass('d-none');
        // }else if(step === 1){
        //     $(".pl-e-bar-fill").css('width', '16.66%');
        // }
    };

    $(".create-profile-next-btn").click(function () {
        let email  = $("#email").val();
        let password   = $("#password").val();
        let username   = $("#username").val();

        if(!Validator.email(email)) {
            Notify.Me(["Molimo da unesete validnu email adresu !", "warn"]);
            return;
        }
        if(password === ''){
            Notify.Me(["Molimo da unesete Vašu šifru", "warn"]);
            return;
        }
        if(username === ''){
            Notify.Me(["Molimo da unesete Vaše korisničko ime", "warn"]);
            return;
        }

        $(".loading-gif").removeClass('d-none');

        $.ajax({
            url: saveAccUri,
            method: 'POST',
            dataType: "json",
            data: {
                email: email,
                password: password,
                username: username
            },
            success: function success(response) {
                $(".loading-gif").addClass('d-none');

                let code = response['code'];

                if(code === '0000'){
                    window.location = '/episodes';


                    // $('.rf-body-element-1').addClass('d-none');
                    // $('.rf-body-element-2').removeClass('d-none');
                    // $(".create-profile-next-btn").addClass('d-none');
                    //
                    // $(".pl-e-bar-fill").css('width', '83.3%');
                }else{
                    Notify.Me([response['message'], "warn"]);
                }
            }
        });
    });

    /**
     *  Create username
     */
    $(document).ready(function () {
        $('.register-email').on('input', function () {
            // Get the current email value
            let email = $(this).val();

            // Extract the username (part before @)
            let username = email.split('@')[0];

            // Allow only English characters (a-z, A-Z) and dots
            username = username.replace(/[^a-zA-Z.]/g, '');

            // Display the live username
            $('.register-username').val(username);
        });
    });

    // $(".create-profile-back-btn").click(function () {
    //     if(step > 1) step--;
    //     progressElements();
    // });

    /* -------------------------------------------------------------------------------------------------------------- */
    /*
     *  Restart password functions
     */

    let generateToken = function(){
        let email  = $("#email");
        let loader = $(".loading-gif");

        if(!Validator.email(email.val())){
            Notify.Me(["Uneseni email nije validan!", "warn"]);
            return;
        }

        /* Show loading gif */
        loader.removeClass('d-none');

        $.ajax({
            url: generateTokenUri,
            method: 'POST',
            dataType: "json",
            data: {
                email: email.val()
            },
            success: function success(response) {
                let code = response['code'];

                /* Hide back */
                loader.addClass('d-none');

                if(code === '0000'){
                    Notify.Me([response['message'], "success"]);
                    email.val("");
                }else{
                    Notify.Me([response['message'], "warn"]);
                }
            }
        });
    };
    $(".generate-token-btn").click(function (){
       generateToken();
    });

    /**
     *  Generate new password
     */
    let generateNewPassword = function(){
        let loader = $(".loading-gif");

        let email  = $("#email");
        let password = $("#password");
        let repeat   = $("#passwordRepeat");

        if(!Validator.email(email.val())){
            Notify.Me(["Uneseni email nije validan!", "warn"]);
            return;
        }

        /* Show loading gif */
        // loader.removeClass('d-none');

        $.ajax({
            url: generatePasswordUri,
            method: 'POST',
            dataType: "json",
            data: {
                email: email.val(),
                password: password.val(),
                repeat: repeat.val(),
                token: $("#token").val()
            },
            success: function success(response) {
                let code = response['code'];

                /* Hide back */
                // loader.addClass('d-none');

                if(code === '0000'){
                    window.location = response['url'];
                }else{
                    /* If there is try to hack, redirect */
                    // if(code === '11416'){
                    //     window.location = response['data']['url'];
                    // }else Notify.Me([response['message'], "warn"]);

                    Notify.Me([response['message'], "warn"]);
                }
            }
        });
    };
    $(".generate-password-btn").click(function (){
        generateNewPassword();
    });
});
