$(document).ready(function (){
    $("#photo_uri").change(function (){
        $("#update-profile-image").submit();
    });

    $(".img_one").change(function (){
        $(".file-form").submit();
    });
});
