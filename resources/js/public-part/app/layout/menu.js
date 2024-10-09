$(document).ready(function () {
    $("#toggle").click(function () {
        $(this).toggleClass("on");
        $("#container-menu").toggleClass("on");
        $("#mobile-menu").toggleClass("on");
    });
});
