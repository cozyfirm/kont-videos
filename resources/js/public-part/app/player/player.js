$(document).ready(function (){

    /**
     *  Toggle full screen and normal screen mode
     */
    let togglePlayer = function (){
        $(".video__player").toggleClass("full_screen");
    }

    $(".toggle-player").click(function (){
        togglePlayer();
    })

    /**
     *  Short description of video
     */
    $(".toggle_short_description").click(function (){
        $(this).parent().parent().parent().toggleClass('short__desc');
    });

    /**
     *  Rest of info show / hide
     */
    $(".inner__tab").click(function (){
        $(".inner__tab").removeClass('active');
        $(".inner__element").removeClass('active');

        $(this).addClass('active');
        $("." + $(this).attr('ref-tag')).addClass('active');

        console.log($(this).attr('ref-tag'));
    })
});
