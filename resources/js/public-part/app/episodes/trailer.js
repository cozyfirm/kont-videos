import { Notify } from './../../../style/layout/notify.ts';

$(document).ready(function (){
    let fetchTrailerUri = '/episodes/fetch-trailer';

    $('body').on('click', '.show__trailer', function(){
        let episodeID = $(this).attr('episode-id');
        let episodeChapters = $(".pp__chapters");
        $.ajax({
            url: fetchTrailerUri,
            method: 'POST',
            dataType: "json",
            data: {
                id: episodeID
            },
            success: function success(response) {
                let code = response['code'];

                if(code === '0000'){
                    let episode = response['data']['episode'];
                    let trailer = response['data']['trailer'];
                    let stars   = response['data']['reviews'];

                    /* Set static data */
                    $("#pp__presenter").text(episode['presenter_rel']['name']);
                    $("#pp__trailer_title").text(trailer['title']);
                    $("#pp__iframe").attr('src', trailer['uri']);

                    let chapters = 0;

                    episodeChapters.empty();
                    if(episode['video_content_rel'].length > 1){
                        let counter = 1;

                        for(let i=0; i<episode['video_content_rel'].length; i++){
                            let video = episode['video_content_rel'][i];

                            if(parseInt(video['category']) !== 2){
                                chapters ++;

                                episodeChapters.append(function (){
                                    return $("<div>").attr('class', 'single__chapter')
                                        .append(function (){
                                            return $("<div>").attr('class', 'no__part')
                                                .append(function (){
                                                    return $("<h1>").text(counter ++)
                                                })
                                        })
                                        .append(function (){
                                            return $("<div>").attr('class', 'img__part')
                                                .append(function (){
                                                    return $("<img>").attr('src', video['img']).attr('alt', 'Photo')
                                                })
                                        })
                                        .append(function (){
                                            return $("<div>").attr('class', 'text__part')
                                                .append(function (){
                                                    return $("<div>").attr('class', 'text__part__header')
                                                        .append(function (){
                                                            return $("<h4>").text(video['title'])
                                                        }).append(function (){
                                                            return $("<p>").text(video['duration'])
                                                        })
                                                })
                                                .append(function (){
                                                    return $("<div>").attr('class', 'text__part__body')
                                                        .append(function (){
                                                            return $("<p>").html(video['description'].substring(0, 240) + ((video['description'].length > 240) ? "..." : ""))
                                                        })
                                                })
                                        })
                                })
                            }
                        }
                    }

                    /* ToDO:: 4 Cjeline */
                    let chapterText = "";
                    if(chapters === 0) chapterText = "0 cjelina";
                    else if(chapters === 1) chapterText = "1 cjelina";
                    else if(chapters === 2) chapterText = "2 cjeline";
                    else if(chapters === 3) chapterText = "3 cjeline";
                    else if(chapters === 4) chapterText = "4 cjeline";
                    else if(chapters === 5) chapterText = "5 cjelina";
                    else if(chapters === 6) chapterText = "6 cjelina";
                    else if(chapters === 7) chapterText = "7 cjelina";
                    else if(chapters === 8) chapterText = "8 cjelina";
                    else if(chapters === 9) chapterText = "9 cjelina";
                    else if(chapters === 10) chapterText = "10 cjelina";

                    $("#pp__no_chapters").text(chapterText);
                    $("#pp__duration").text("Trajanje: " + episode['duration']);
                    $("#pp__episode__title").text(episode['title']);
                    /* If we want to cut text, just uncomment this line */
                    // $("#pp__episode__description").html(episode['description'].substring(0, 560) + ((episode['description'].length > 560) ? "..." : ""));
                    $("#pp__episode__description").html(episode['description']);

                    $(".pp__stars").empty();

                    if(parseInt(stars['total'])){
                        for(let j=1; j<=5; j++){
                            $(".pp__stars").append(function (){
                                return $("<div>").attr('class', 'star')
                                    .append(function (){
                                        if (j <= parseInt(stars['fullStar'])){
                                            return $("<img>").attr('src', '/files/images/default/icons/star-yellow.svg').attr('tag', 'Star');
                                        }else if(stars['halfStar'] && stars['halfStar'] === j){
                                            return $("<img>").attr('src', '/files/images/default/icons/star-half-yellow.svg').attr('tag', 'Star');
                                        }else{
                                            return $("<img>").attr('src', '/files/images/default/icons/star-empty-yellow.svg').attr('tag', 'Star');
                                        }
                                    });
                            });
                        }
                    }

                    console.log(stars);
                    $(".trailer__wrapper").addClass('trailer__wrapper__visible');
                }else{
                    Notify.Me([response['message'], "danger"]);
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log("Error while loading trailer");
            }
        });
    });

    /**
     *  Close review on X or anywhere except the box
     */
    let closeEditNote = function (){
        $(".trailer__wrapper").removeClass('trailer__wrapper__visible');
        $("#pp__iframe").attr('src', "");
    };

    /* Hide on click */
    $(".trailer__wrapper").click(function (event){
        if($(event.target).hasClass('trailer__wrapper')){
            closeEditNote();
        }
    });
    $(".ih__exit__btn").click(function (){
        closeEditNote();
    });
});
