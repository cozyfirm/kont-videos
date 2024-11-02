import { Notify } from './../../style/layout/notify.ts';
$(document).ready(function (){
    let updateStatusUri = '/system/admin/episodes/reviews/update-status';

    $(".approve-review").change(function (){
        let reviewID = $(this).attr('review-id');
        let status   = $(this).val();

        $.ajax({
            url: updateStatusUri,
            method: 'POST',
            dataType: "json",
            data: {
                id: reviewID,
                status: status
            },
            success: function success(response) {
                let code = response['code'];

                if(code === '0000'){

                    Notify.Me([response['message'], "success"]);
                }else{
                    Notify.Me([response['message'], "danger"]);
                }
            }
        });
    });
});
