$(document).ready(function () {
    $("#toggle").click(function () {
        $(this).toggleClass("on");
        $("#container-menu").toggleClass("on");
        $("#mobile-menu").toggleClass("on");
    });

    /**
     *  Global go-to Class, Go to custom-uri Attribute
     */
    $(".go-to").click(function (){
        window.location = $(this).attr('custom-uri');
    });

    /**
     *  Fit iframe (YouTube link to height)
     */

    if($(".yt__iframe").length){
        let elem = $(".yt__iframe");

        elem.height(parseInt(elem.width() / 1.77));
        console.log("Exists!", elem.width());
    }
});
