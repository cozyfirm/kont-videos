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
        /* Skip for mobile add review */
        if($(this).hasClass('leave-review')) return;

        $(".inner__tab").removeClass('active');
        $(".inner__element").removeClass('active');

        $(this).addClass('active');
        $("." + $(this).attr('ref-tag')).addClass('active');

        console.log($(this).attr('ref-tag'));
    });
    $(".show-more-about").click(function (){
        $(".inner__element").removeClass('active');
        $(".inner__tab").removeClass('active');

        $("#more-about").addClass('active');
        $(".inner__tab[ref-tag='overview__wrapper']").addClass('active');
    });
    $(".show-presenter-wrapper").click(function (){
        $(".inner__element").removeClass('active');
        $(".inner__tab").removeClass('active');

        $("#presenter-wrapper").addClass('active');
        $(".inner__tab[ref-tag='presenter']").addClass('active');
    });

    /* -------------------------------------------------------------------------------------------------------------- */
    /*
     *  Player work
     */

    if($("#active-video").length){
        /* We are currently at active player */

        let player;
        let currentVideoID = $("#active-video").attr('video-id'); let mainDataResponse = null;
        let currentTime = 0, finishedVideo = false;
        let updateActivityUri = '/episodes/activity/update-activity';
        let playVideoUri = '/episodes/activity/play-video';
        let markVideoAsWatchedUri = '/episodes/activity/mark-as-watched';

        let iframeUri = "https://iframe.mediadelivery.net/embed/";
        let iframeGetParams = "?autoplay=false&loop=false&muted=false&preload=true&responsive=true";

        let clockCounter = 0;
        let continueNewVideo = true;
        let intervalId;

        /* Round to 2 decimal points */
        function str_pad_left(string, pad, length) {
            return (new Array(length + 1).join(pad) + string).slice(-length);
        }
        let getMinutesAndSeconds = function (time){
            const minutes = Math.floor(currentTime / 60);
            const seconds = currentTime - minutes * 60;
            return str_pad_left(minutes, '0', 2) + ':' + str_pad_left(seconds, '0', 2);
        }

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

            /* Change video title in MENU */
            $(".menu-video-title").text(mainDataResponse['nextVideo']['title']);

            /* My notes: Change video id for note */
            $(".add__new_note").attr('video-id', mainDataResponse['nextVideo']['id']);

            /* Reset percentage to 0 percent */
            resetPercentage();

            /* Setup player for new video */
            handleVideo();
        }
        let finishEpisode = function (){
            $(".se__wrapper[video-id='" + $("#active-video").attr('video-id') +"']").find('.checkbox_w').addClass('checked');
        }

        /**
         *  Load new episode screen
         */
        let resetPercentage = function (){
            /* Hide shadow and reset it */
            $(".next__video").addClass('d-none');
            circle.object.removeClass('over50');
            for(let i=1; i<=100; i++){
                circle.object.removeClass('p' + i);
            }
            circle.object.addClass('p0');
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

                        /* Set my note starts at .. */
                        $(".note__time").text(getMinutesAndSeconds(currentTime));
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

                    /* Set my note starts at .. */
                    $(".note__time").text(getMinutesAndSeconds(currentTime));

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
                        if(window.innerWidth <= 1000) togglePlayer();
                    }else{
                        Notify.Me([response['message'], "warn"]);
                    }
                }
            });
        });

        /**
         *  When user wants to mark video as watched; Note: Allow only videos that are not currently active
         */
        $(".mark-video-as-watched").click(function (){
            let videoAttr = $(this).attr('video-id');
            let $this = $(this);

            let checked = $(this).hasClass('checked');

            if(videoAttr !== currentVideoID){
                $.ajax({
                    url: markVideoAsWatchedUri,
                    method: 'POST',
                    dataType: "json",
                    data: {
                        id: videoAttr,
                        checked: checked
                    },
                    success: function success(response) {
                        let code = response['code'];

                        if(code === '0000'){
                            let activity = response['data']['activity'];

                            if(checked){
                                $this.removeClass('checked');
                            }else $this.addClass('checked');
                        }else{
                            Notify.Me([response['message'], "danger"]);
                        }
                    }
                });
            }
        });

        /* On GET request, set initial data */
        handleVideo();
    }
});
