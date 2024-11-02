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
});
