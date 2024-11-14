import { Notify } from './../../../style/layout/notify.ts';

$(document).ready(function (){
    let saveUri = '/episodes/questionnaire/save';

    /**
     *  Select proper star
     */
    let currentQuestion, currentIndex = 5;
    let setStars = function (object, index){
        for(let i=0; i<=5; i++){
            object.removeClass('stars-' + i);
        }
        object.addClass('stars-' + index);
        object.parent().parent().attr('stars-selected', index);
    }

    $('body').on('mouseenter', '.questionnaire-star-wrapper', function() {
        currentQuestion = $(this).parent();

        setStars($(this).parent(), $(this).attr('star-index'));
    }).on('click', '.questionnaire-star-wrapper', function() {
        currentIndex = $(this).attr('star-index');

        setStars(currentQuestion, currentIndex);
    }).on('mouseleave', '.questionnaire-star-wrapper', function() {
        setStars(currentQuestion, currentIndex);
    });

    /**
     *  Submit questionnaire
     */
    $(".submit-questionnaire").click(function (){
        let arrData = [];
        $(".question__wrapper").each(function (index){
            arrData[index] = {
                question_id: $(this).attr('question-id'),
                type: $(this).attr('type'),
                value: ($(this).attr('type') === 'option') ? $(this).attr('stars-selected') : $(this).find('.question-text').val()
            };
        });


        $.ajax({
            url: saveUri,
            method: 'POST',
            dataType: "json",
            data: {
                episode_id: $(".questionnaire__wrapper").attr('episode-id'),
                data: arrData
            },
            success: function success(response) {
                let code = response['code'];

                if(code === '0000'){
                    $(".questionnaire__wrapper").removeClass('d-flex');
                    Notify.Me([response['message'], "success"]);
                }else{
                    Notify.Me([response['message'], "danger"]);
                }
            }
        });
        console.log(arrData);
    });
});
