import {Notify} from "../../../style/layout/notify.ts";

$(document).ready(function (){

    $(".user-notifications").change(function (){
        let status = $(this).is(":checked");

        $.ajax({
            url: "/my-profile/update-notifications-status",
            method: "post",
            dataType: "json",
            data: { status: status },
            success: function success(response) {
                let code = response['code'];

                if(code === '0000'){

                }else{
                    Notify.Me([response['message'], "warn"]);
                }
                console.log(response, typeof response['link']);
            }
        });
    });

    /**
     *  Remove profile
     */

    $(".remove-profile-btn").click(function (){
        $(".remove__profile__wrapper").addClass('d-flex');
    });
    $(".close-remove-profile").click(function (){
        $(".remove__profile__wrapper").removeClass('d-flex');
    });

    $(".remove-user-profile").click(function (){
        window.location = '/my-profile/remove-profile';
    });
});
