import { Notify } from './../../../style/layout/notify.ts';

$(document).ready(function (){

    /**
     *  Select proper star
     */
    let currentQuestion, currentIndex = 5;
    let setStars = function (object, index){
        for(let i=0; i<=5; i++){
            object.removeClass('stars-' + i);
        }
        object.addClass('stars-' + index);
    }

    $('body').on('mouseenter', '.questionnaire-star-wrapper', function() {
        console.log($(this).attr('star-index'));

        currentQuestion = $(this).parent();

        setStars($(this).parent(), $(this).attr('star-index'));
    }).on('click', '.questionnaire-star-wrapper', function() {
        currentIndex = $(this).attr('star-index');

        setStars(currentQuestion, currentIndex);
    }).on('mouseleave', '.questionnaire-star-wrapper', function() {
        setStars(currentQuestion, currentIndex);
    });
});
