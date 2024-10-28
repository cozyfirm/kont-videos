import { Notify } from './../../../style/layout/notify.ts';

$(document).ready(function (){
    let totalStars = 5, globalStarIndex = 1, globalIndex = 0;
    let finalStarIndex = 5, finalIndex = 0;
    let saveReviewUri = '/episodes/reviews/save';
    let checkForReviewUri = '/episodes/reviews/check-for-review';

    /**
     * Set GUI for stars
     *
     * @param fullStar
     * @param halfStar
     * @param emptyStar
     */
    let setStars = function (fullStar, halfStar, emptyStar){
        let starsWrapper = $(".stars__wrapper");

        /* Remove previous versions */
        starsWrapper.empty();

        for(let i= 1; i <= 5; i++){
            starsWrapper.append(function (){
                return $("<div>").attr('class', 'star review-star').attr('star-index', i)
                    .append(function (){
                        if(i <= fullStar){
                            return $("<img>").attr('src', '/files/images/default/icons/star-yellow.svg').attr('alt', 'Star image')
                        }
                        else if(halfStar && halfStar === i){
                            return $("<img>").attr('src', '/files/images/default/icons/star-half-yellow.svg').attr('alt', 'Star image')
                        }
                        else{
                            return $("<img>").attr('src', '/files/images/default/icons/star-empty-yellow.svg').attr('alt', 'Star image')
                        }
                    })
                    .append(function (){
                        return $("<div>").attr('class', 'first-half review-star-child').attr('index', 'left')
                    })
                    .append(function (){
                        return $("<div>").attr('class', 'second-half review-star-child').attr('index', 'right')
                    })
            });
        }
    }

    /**
     * Calculate star index
     *
     * @param starInd
     * @param ind
     */
    let calculateStars = function (starInd, ind){
        let fullStar = 1;
        let halfStar = 0;
        let emptyStar = 2;

        /**
         *  Now, lets find ends of each icon
         */
        if(starInd === 1){
            /* First star is full, other are empty */
            setStars(fullStar, halfStar, emptyStar);
            totalStars = 1;
        }else{
            if(ind === 'left'){
                /* That means, we are going to need half star somewhere */
                fullStar = starInd - 1;
                halfStar = starInd;
                emptyStar = starInd + 1;

                totalStars = starInd - 0.5;
            }else{
                fullStar = starInd;
                emptyStar = starInd + 1;

                totalStars = starInd;
            }

            setStars(fullStar, halfStar, emptyStar);
        }
    }

    /**
     *  Create request and save data to database
     */
    let createRequest = function (notifyUser = false){
        $.ajax({
            url: saveReviewUri,
            method: 'POST',
            dataType: "json",
            data: {
                stars: totalStars,
                note: $(".review-note").val(),
                episode_id: $(".review-episode-id").val()
            },
            success: function success(response) {
                let code = response['code'];

                if(code === '0000'){
                    if(notifyUser) {
                        /* User saved note */
                        Notify.Me([response['message'], "success"]);
                        closeReview();

                        /* Hide button for review */
                        $(".leave-review-content").text('Uredite ocjenu');
                    }
                }else{
                    Notify.Me([response['message'], "danger"]);
                }
            }
        });
    };

    $('body').on('mouseenter', '.review-star-child', function() {
        let starIndex = parseInt($(this).parent().attr('star-index'));
        let index = $(this).attr('index');

        if(starIndex !== globalStarIndex || index !== globalIndex){
            globalStarIndex = starIndex;
            globalIndex = index;
        }else return;

        calculateStars(starIndex, index);
    }).on('click', '.review-star-child', function() {
        finalStarIndex = globalStarIndex;
        finalIndex = globalIndex;

        $(".text__form").addClass('d-flex');

        /* Calculate final */
        calculateStars(finalStarIndex, finalIndex);

        /* Create request with stars only */
        createRequest();
    }).on('mouseleave', '.stars__wrapper', function() {
        calculateStars(finalStarIndex, finalIndex);
    });

    /**
     *  Close review on X or anywhere except the box
     */
    let closeReview = function (){
        $(".add__review__wrapper").removeClass('d-flex');
    };

    /* Hide on click */
    $(".add__review__wrapper").click(function (event){
        if($(event.target).hasClass('add__review__wrapper')){
            closeReview();
        }
    });
    $(".ar__header").click(function (){
        closeReview();
    });

    /**
     *  Save review note
     */
    $(".save-review-note").click(function (){
        createRequest(true);
    });

    /**
     *  Open review form
     */
    $(".leave-review").click(function (){
        $.ajax({
            url: checkForReviewUri,
            method: 'POST',
            dataType: "json",
            data: {
                episode_id: $(".review-episode-id").val()
            },
            success: function success(response) {
                let code = response['code'];

                if(code === '0000'){
                    let data = response['data'];

                    if(data['hasReview'] === true){
                        /* Review exists */

                        calculateStars(data['starIndex'], data['index']);

                        finalStarIndex = data['starIndex'];
                        finalIndex = data['index'];

                        console.log("NOte:" + data['review']['note']);
                        $(".text__form").addClass('d-flex');
                        $(".review-note").val(data['review']['note']);
                    }
                    console.log(data);
                }else{
                    Notify.Me([response['message'], "danger"]);
                }

                $(".add__review__wrapper").addClass('d-flex');
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log("Error while loading reviews");
                $(".add__review__wrapper").addClass('d-flex');
            }
        });
    });

    /**
     *  Summary reviews of episode; Visible on episode preview -> Reviews
     */
    if($(".rg__wrapper__reviews").length){
        $(".rate__line").each(function (){
            $(this).css('width', $(this).attr('line-width') + '%');
        });
    }
});
