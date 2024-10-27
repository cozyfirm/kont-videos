$(document).ready(function (){
    let totalStars = 5, globalStarIndex = 1, globalIndex = 0;
    let finalStarIndex = 1, finalIndex = 0;

    let setStars = function (fullStar, halfStar, emptyStar){
        let starsWrapper = $(".stars__wrapper");

        /* Remove previous versions */
        starsWrapper.empty();

        for(let i= 1; i <= 5; i++){
            starsWrapper.append(function (){
                return $("<div>").attr('class', 'star review-star').attr('star-index', i)
                    .append(function (){
                        if(i <= fullStar){
                            return $("<img>").attr('src', '/files/images/default/icons/star.svg').attr('alt', 'Star image')
                        }
                        else if(halfStar && halfStar === i){
                            return $("<img>").attr('src', '/files/images/default/icons/star-sharp-half-stroke.svg').attr('alt', 'Star image')
                        }
                        else{
                            return $("<img>").attr('src', '/files/images/default/icons/star-empty.svg').attr('alt', 'Star image')
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
    }).on('mouseleave', '.stars__wrapper', function() {
        calculateStars(finalStarIndex, finalIndex);
    });

    /**
     *  Close review on X or anywhere except the box
     */
    let closeReview = function (){
        console.log("Close it!!");
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
});
