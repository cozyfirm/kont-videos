import { Notify } from './../../../../style/layout/notify.ts';
import { Validator } from "../../../../style/layout/validator.ts";

$( document ).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    let contactUsUri = '/contact/send-an-email';
    let messageInQueue = false;

    $(".send-an-email").click(function (e){
        if(messageInQueue){
            Notify.Me(["Molimo pričekajte da se slanje prethodne poruke završi!!", "danger"]);
            return;
        }

        let name    = $("#contact-us-name").val();
        let surname = $("#contact-us-surname").val();
        let email   = $("#contact-us-email").val();
        let subject = $("#contact-us-subject").val();
        let message = $("#contact-us-message").val();

        if(name === '' || surname === '' || subject === '' || message === ''){
            Notify.Me(["Molimo popunite sva polja!!", "danger"]);
            return;
        }
        if(!Validator.email(email)){
            Notify.Me(["Uneseni email nije validan!", "danger"]);
            return;
        }

        /* Message is queued for sending */
        messageInQueue = true;

        $.ajax({
            url: contactUsUri,
            method: 'POST',
            dataType: "json",
            data: {
                name: name,
                surname: surname,
                email: email,
                subject: subject,
                message: message
            },
            success: function success(response) {
                let code = response['code'];

                if(code === '0000'){
                    $("#contact-us-name").val("")
                    $("#contact-us-surname").val("")
                    $("#contact-us-email").val("")
                    $("#contact-us-subject").val("")
                    $("#contact-us-message").val("")

                    Notify.Me([response['message'], "success"]);
                }else{
                    Notify.Me([response['message'], "danger"]);
                }

                /* Message is sent */
                messageInQueue = false;
            }
        });
    });

});
