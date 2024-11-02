$(document).ready(function (){
    $("#photo_uri").change(function (){
        $("#update-profile-image").submit();
    });

    $("#cover__photo").change(function (){
        $("#update-cover-photo").submit();
    });

    $(".img_one").change(function (){
        $(".file-form").submit();
    });
});
