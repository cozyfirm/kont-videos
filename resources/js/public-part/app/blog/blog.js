import { Notify } from '../../../style/layout/notify.ts';

$(document).ready(function (){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    let loadMoreUri = '/blog/load-more';
    let previewUri  = '/blog/preview/';

    $(".blog__load_more").click(function (){
        let lastID = 0;
        let category = $(".posts__wrapper").attr('category');

        $(".single__post").each(function (){
            lastID = $(this).attr('post-id');
        });

        $.ajax({
            url: loadMoreUri,
            method: 'POST',
            dataType: "json",
            data: {
                lastID: lastID,
                category: category
            },
            success: function success(response) {
                let code = response['code'];

                if(code === '0000'){
                    let posts = response['data']['posts'];

                    /* Remove load more btn and return */
                    if(posts.length === 0){
                        $(".blog__load_more").addClass('d-none');
                        /* Remove margin */
                        $(".posts__wrapper").addClass('margin_bottom_none');

                        return;
                    }

                    for(let i=0; i<posts.length; i++){
                        let post = posts[i];

                        $(".posts__wrapper").append(function (){
                            return $("<div>").attr('class', 'single_new single__post').attr('post-id', post['id'])
                                .append(function (){
                                    return $("<div>").attr('class', 'image__wrapper')
                                        .append(function (){
                                            return $("<img>").attr('src', post['img']).attr('alt', 'Post image')
                                        });
                                })
                                .append(function (){
                                    return $("<div>").attr('class', 'text__wrapper')
                                        .append(function (){
                                            return $("<div>").attr('class', 'text__content')
                                                .append(function (){
                                                    return $("<h2>").text(post['title'])
                                                })
                                                .append(function (){
                                                    return $("<p>").text(post['short_desc'])
                                                })
                                        })
                                        .append(function (){
                                            return $("<div>").attr('class', 'hashtags')
                                                .append(function (){
                                                    return $("<div>").attr('class', 'hashtag').text("HASH")
                                                })
                                                .append(function (){
                                                    return $("<div>").attr('class', 'hashtag').text("TAG")
                                                })
                                        })
                                })
                                .append(function (){
                                    return $("<a>").attr('href', '/blog/preview/' + post['slug'])
                                })
                        })
                    }

                    console.log("Left: " + response['data']['leftPosts']);
                    /**
                     *  Hide load more btn
                     */
                    if(response['data']['leftPosts'] === 0){
                        $(".blog__load_more").addClass('d-none');
                        /* Remove margin */
                        $(".posts__wrapper").addClass('margin_bottom_none');
                    }
                }else{
                    Notify.Me([response['message'], "warn"]);
                }
            }
        });
    });


    /**
     *  Fetch images
     */

    $(".img__wrapper, .gallery__navigation-button").click(function (){
        let attrID = $(this).attr('attr-id');

        $.ajax({
            url: '/blog/fetch-images',
            method: 'POST',
            dataType: "json",
            data: {
                attrID: attrID,
                blog_id : $("#post_id").val()
            },
            success: function success(response) {
                let code = response['code'];
                let data = response['data'];

                if(code === '0000'){
                    $(".image__wrapper").removeClass('d-none');

                    $("#gallery_main_img").attr('src', response['data']['current']);

                    if(data['next'] !== ''){
                        $(".gallery__navigation_next").removeClass('d-none').attr('attr-id', data['next']);
                    }else{
                        // $(".gallery__navigation_next").addClass('d-none');
                    }
                    if(data['previous'] !== ''){
                        $(".gallery__navigation_previous").removeClass('d-none').attr('attr-id', data['previous']);
                    }else{
                        // $(".gallery__navigation_previous").addClass('d-none');
                    }

                    console.log(response, response['data']['current']);
                }else{
                    Notify.Me([response['message'], "warn"]);
                }
            }
        });
        console.log(attrID);
    })

    $(".close_gallery").click(function (){
        $(".image__wrapper").addClass('d-none');
    });

    /**
     *  Blog video
     */
    if($(".blog__video_iframe").length){
        let elem = $(".blog__video_iframe");

        elem.height(parseInt(elem.width() / 1.77));
        console.log("Exists!", elem.width());
    }
});
