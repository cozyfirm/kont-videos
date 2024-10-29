import {Notify} from "../../../style/layout/notify.ts";

$(document).ready(function (){

    /**
     *  Toggle full screen and normal screen mode
     */
    let togglePlayer = function (){
        $(".video__player").toggleClass("full_screen");
    }

    $(".toggle-player").click(function (){
        togglePlayer();
    })

    // if(window.innerWidth <= 1000){
    //     if($(".toggle-player").length) togglePlayer();
    // }

    /**
     *  Short description of video
     */
    $(".toggle_short_description").click(function (){
        $(this).parent().parent().parent().toggleClass('short__desc');
    });

    /**
     *  Rest of info show / hide
     */
    $(".inner__tab").click(function (){
        $(".inner__tab").removeClass('active');
        $(".inner__element").removeClass('active');

        $(this).addClass('active');
        $("." + $(this).attr('ref-tag')).addClass('active');

        console.log($(this).attr('ref-tag'));
    })

    /* -------------------------------------------------------------------------------------------------------------- */
    /*
     *  Player work
     */

    if($("#active-video").length){
        /* We are currently at active player */

        let player;
        let currentVideoID = 0; let mainDataResponse = null;
        let currentTime = 0, finishedVideo = false;
        let updateActivityUri = '/episodes/activity/update-activity';
        let playVideoUri = '/episodes/activity/play-video';

        let iframeUri = "https://iframe.mediadelivery.net/embed/";
        let iframeGetParams = "?autoplay=false&loop=false&muted=false&preload=true&responsive=true";

        let clockCounter = 0;
        let continueNewVideo = true;
        let intervalId;
        /**
         * Start new video
         * @param interval
         * @param isTerminate
         * @param proceed
         * @param increase
         */
        function clocked(interval, isTerminate, proceed, increase) {
            intervalId = setInterval(() => {

                // proceed.call();
                increase(clockCounter);

                if (isTerminate(++clockCounter)) {
                    clearInterval(intervalId);
                }
            }, interval);
        }
        const circle = {
            object : $(".progress-circle"),
            increase(counter){
                console.log(counter);
            }
        };

        let playNewVideo = function (){
            let videoWrapper = $("#active-video");

            videoWrapper.attr('src', iframeUri + mainDataResponse['nextVideo']['library_id'] + "/" + mainDataResponse['nextVideo']['video_id'] + iframeGetParams);
            videoWrapper.attr('video-id', mainDataResponse['nextVideo']['id']);

            $(".se__wrapper").removeClass('current');
            $(".se__wrapper[video-id='" + mainDataResponse['nextVideo']['id'] +"']").addClass('current');

            resetPercentage();

            handleVideo();
        }
        let finishEpisode = function (){
            $(".se__wrapper[video-id='" + $("#active-video").attr('video-id') +"']").find('.checkbox_w').addClass('checked');
        }

        let resetPercentage = function (){
            /* Hide shadow and reset it */
            $(".next__video").addClass('d-none');
            circle.object.removeClass('over50');
            circle.object.removeClass('p100').addClass('p0');
        };
        function increasePercentage(percentage){
            if(percentage < 50) circle.object.removeClass('over50');
            else circle.object.addClass('over50');

            circle.object.removeClass('p' + percentage).addClass('p' + (percentage + 1));
        }

        function doTerminateWhen(counter) {
            if(counter >= 100){
                playNewVideo();

                clockCounter = 0;
                return true;
            }
            return false;
        }

        /* Force start or cancel new video */
        $(".cancel_id").click(function (){
            continueNewVideo = false;

            clearInterval(intervalId);
            clockCounter = 0;

            resetPercentage();
        });
        circle.object.click(function (){
            clockCounter = 100;
        });

        /**
         *  Video handler
         */
        let handleVideo = function (){
            let videoWrapper = $("#active-video");
            currentVideoID = videoWrapper.attr('video-id');

            /* Set wrapper as not finished */
            videoWrapper.attr('finished', 0);

            player = new playerjs.Player(document.getElementById("active-video"));

            player.on('ready', () => {
                /* Video that is loaded after previous video */
                if(mainDataResponse !== null) player.play();
                else{
                    /* Initial load */
                    const currentTime = parseFloat($("#active-video").attr('current-time'));
                    setTimeout(() => {
                        player.setCurrentTime(currentTime);
                    }, 200); // Adjust delay if necessary
                }
            });

            // Event handler when the player is played
            player.on('play', () => {

            });

            // Event handler when the player is paused
            player.on('pause', () => {
                // console.log("pause");
            });

            // Event handler when time is updated
            player.on('timeupdate', (data) => {
                /* Update every second, not more often */
                if(currentTime !== parseInt(data['seconds'])){
                    currentTime = parseInt(data['seconds']);

                    videoWrapper.attr('current-time', parseInt(data['seconds']));

                    if(currentTime === parseInt(data['duration'])){
                        /* End of the video, go to another video */
                        finishedVideo = true;
                    }else{
                        finishedVideo = false;
                    }

                    $.ajax({
                        url: updateActivityUri,
                        method: "POST",
                        dataType: "json",
                        data: {
                            time : currentTime,
                            duration: parseInt(data['duration']),
                            finished: finishedVideo,
                            video_id: videoWrapper.attr('video-id'),
                            episode_id: videoWrapper.attr('episode-id')
                        },
                        success: function success(response) {
                            let code = response['code'];

                            if(code === '0000'){
                                let data = response['data'];

                                if(data['nextVideo'] !== null){
                                    mainDataResponse = data;

                                    /* Mark previous video as finished */
                                    $(".se__wrapper[video-id='" + currentVideoID +"']").find('.checkbox_w').addClass('checked');
                                    videoWrapper.attr('finished', 1);

                                    /* Set title of new video */
                                    $("#shadow-video-title").text(data['nextVideo']['title']);

                                    $(".next__video").removeClass('d-none');
                                    clocked(50, doTerminateWhen, circle.increase, increasePercentage);
                                }

                                if(data['episodeFinished'] === true){
                                    finishEpisode();
                                }
                            }else{
                                Notify.Me([response['message'], "warn"]);
                            }
                        }
                    });
                }
            });
        };

        /**
         *  When user press button "Play", load exact video
         */
        $(".play_w").click(function (){
            let videoID = $(this).attr('video-id');

            $.ajax({
                url: playVideoUri,
                method: "POST",
                dataType: "json",
                data: {
                    video_id : videoID
                },
                success: function success(response) {
                    let code = response['code'];

                    if(code === '0000'){
                        mainDataResponse = response['data'];
                        $(".se__wrapper[video-id='" + videoID +"']").find('.checkbox_w').removeClass('checked');

                        playNewVideo();
                        togglePlayer();
                    }else{
                        Notify.Me([response['message'], "warn"]);
                    }
                }
            });
        });

        /* On GET request, set initial data */
        handleVideo();
    }
});
