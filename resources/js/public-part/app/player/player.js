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

    /* -------------------------------------------------------------------------------------------------------------- */
    /*
     *  Player work
     */
    // $("#video_id").keyup(function (){
    //     let value = $(this).val();
    //     console.log(value);
    //
    //     const player = new playerjs.Player(document.getElementById("bunny-stream-embed"));
    //
    //     player.on('ready', () => {
    //         console.log("ready");
    //     });
    //
    //     // Event handler when the player is played
    //     player.on('play', () => {
    //         console.log("play");
    //     });
    //
    //     // Event handler when the player is paused
    //     player.on('pause', () => {
    //         console.log("pause");
    //     });
    // });
});
