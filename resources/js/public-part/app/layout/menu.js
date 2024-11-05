$(document).ready(function () {
    $("#toggle").click(function () {
        $(this).toggleClass("on");
        $("#container-menu").toggleClass("on");
        $("#mobile-menu").toggleClass("on");
    });

    /**
     *  Global go-to Class, Go to custom-uri Attribute
     */
    $('body').on('click', '.go-to', function() {
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

    /**
     *  Register yourself, but transfer email via POST request to register form
     */
    $(".register-hidden-trigger").click(function (e){
       let value = $("#input-hero").val();

       if(value !== ""){
           $("#register-hidden-email").val(value);
       }else e.preventDefault();
    });
});
