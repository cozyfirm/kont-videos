

let video = document.querySelectorAll(".single__episode video");
let activeDiv = document.querySelectorAll(".single__episode .episode-img");
let overlayDIV = document.querySelectorAll(".single__episode .card__content ");

if (video != null) {
    if($(".episode-hover-video").length){
        activeDiv.forEach(function (cardHomeOne, index) {
            cardHomeOne.addEventListener("mouseenter", function () {

                activeDiv[index].classList.add("active");
                // overlayDIV[index].classList.add("active");
                video[index].currentTime = 0;
                video[index].play();
            });
            cardHomeOne.addEventListener("mouseleave", function () {
                activeDiv[index].classList.remove("active");
                // overlayDIV[index].classList.remove("active");
                video[index].pause();
            });
        });
    }else{
        console.log("Do not add anything ...");
    }
}



let modalHomeOppener = document.querySelectorAll(".modaloppener")
let modalHome = document.getElementById("modal_close");
let modalHomeWrapper = document.getElementById("open-modal");

if (modalHome != null) {

    modalHomeOppener.forEach(function (modalHomeOppener, index) {
        modalHomeOppener.addEventListener("click", function () {
            modalHomeWrapper.style.visibility = "visible";
            modalHomeWrapper.style.opacity = 1;
            modalHomeWrapper.style.width = "100%";
            modalHomeWrapper.style.height = "100%";
            modalHomeWrapper.style.transition = "all .75s ease";
        });

    });

    modalHome.addEventListener("click", function () {
        modalHomeWrapper.style.visibility = "hidden";
        modalHomeWrapper.style.opacity = 0;
        modalHomeWrapper.style.width = "80%";
        modalHomeWrapper.style.height = "80%";
        modalHomeWrapper.scrollTop = 0;
        modalHomeWrapper.style.transition = "all 0s ease";
    });

}
