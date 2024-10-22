import { Notify } from '../../../style/layout/notify.ts';

$(document).ready(function (){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    let loadMoreUri = '/blog/load-more';
    let previewUri  = '/blog/preview/';
    //
    // $(".load__more_btn").click(function (){
    //     let lastID = 0;
    //     $(".blog__item").each(function (){
    //         lastID = $(this).attr('itemid');
    //     });
    //
    //     $.ajax({
    //         url: loadMoreUri,
    //         method: 'POST',
    //         dataType: "json",
    //         data: {
    //             lastID: lastID
    //         },
    //         success: function success(response) {
    //             let code = response['code'];
    //
    //             if(code === '0000'){
    //                 let posts = response['data']['posts'];
    //
    //                 /* Remove load more btn and return */
    //                 if(posts.length === 0){
    //                     $(".blog__load_more_w").addClass('d-none');
    //                     return;
    //                 }
    //
    //                 for(let i=0; i<posts.length; i++){
    //                     $(".blog__items").append(function (){
    //                         return $("<div>").attr('class', 'blog__item').attr('itemid', posts[i]['id']).attr('uri', previewUri + posts[i]['id'])
    //                             .append(function (){
    //                                 return $("<img>").attr('src', posts[i]['img']).attr('class', 'blog__item-image')
    //                                     .attr('alt', 'Blog image');
    //                             })
    //                             .append(function (){
    //                                 return $("<div>").attr('class', 'blog__item-content')
    //                                     .append(function (){
    //                                         return $("<div>").attr('class', 'blog__item-content-box')
    //                                             // .append(function (){
    //                                             //     return $("<div>").attr('class', 'blog__item-content-box-category')
    //                                             //         .text(posts[i]['categoryVal']);
    //                                             // })
    //                                             .append(function (){
    //                                                 return $("<div>").attr('class', 'blog__item-content-box-read-time')
    //                                                     .text(posts[i]['createdAt']);
    //                                             });
    //                                     })
    //                                     .append(function (){
    //                                         return $("<div>").attr('class', 'blog__item-content-title')
    //                                             .text(posts[i]['title']);
    //                                     })
    //                                     .append(function (){
    //                                         return $("<div>").attr('class', 'blog__item-content-description')
    //                                             .text(posts[i]['short_desc']);
    //                                     });
    //                             });
    //                     })
    //                 }
    //             }else{
    //                 Notify.Me([response['message'], "warn"]);
    //             }
    //         }
    //     });
    // });


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
