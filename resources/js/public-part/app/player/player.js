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
    let toggleShortDescription = function (){

    };

    $(".toggle_short_description").click(function (){
        $(this).parent().parent().parent().toggleClass('short__desc');
    });
});
