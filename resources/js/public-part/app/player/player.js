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
    });
    /**
     *  Right side (beyond videos / chapters):
     *      - More about theme
     *      - About presenter
     */
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
     * Global functions used for all player data
     */
    let autoScrollEnabled = false;

    function scrollToCurrent() {
        const $wrapper = $('.ew__body');
        const $currentElement = $wrapper.find('.current');

        if ($currentElement.length) {
            // Scroll the wrapper so the current element is at the top
            if(autoScrollEnabled) {
                $wrapper.scrollTop($currentElement.position().top + $wrapper.scrollTop());

                autoScrollEnabled = false;
            }
        }
    }
    if($("#active-video").length || $("#chapter-video").length){
        /**
         * Set up a MutationObserver to watch for changes in the `current` class
         * @type {HTMLElement}
         */
        const wrapper = document.getElementById('ew__body_wrapper');
        const observer = new MutationObserver(function(mutationsList) {
            mutationsList.forEach(mutation => {
                if (mutation.type === 'attributes' && mutation.attributeName === 'class') {
                    scrollToCurrent(); // Call scroll function when class attribute changes
                }
            });
        });

        /**
         * Observe changes to class attributes within the scrollable wrapper
         */
        observer.observe(wrapper, {
            attributes: true,
            subtree: true,
            attributeFilter: ['class']
        });
    }

    /**
     * Round to 2 decimal points
     * */
    function str_pad_left(string, pad, length) {
        return (new Array(length + 1).join(pad) + string).slice(-length);
    }

    /**
     * Get time in minutes and seconds
     * @param time
     * @returns {string}
     */
    let getMinutesAndSeconds = function (time){
        const minutes = Math.floor(time / 60);
        const seconds = time - minutes * 60;
        return str_pad_left(minutes, '0', 2) + ':' + str_pad_left(seconds, '0', 2);
    }

    /* -------------------------------------------------------------------------------------------------------------- */
    /*
     *  Video player for episode with videos
     */

    if($("#active-video").length){
        /* We are currently at active player */
        console.log("Episode with video sections!")

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

        /* Episodes at right side */
        let videosWrapper = $(".ew__body");
        let currentVideo = videosWrapper.find('.current');

        /**
         * Start new video with time Delay
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

        /**
         *  Play new video, depending on is it clicked or autoloaded
         */
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
                    /* Scroll to top */
                    scrollToCurrent();

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

                                    /**
                                     *  When episode is finished, and in a case when user did not complete survey, offer it a questionnaire
                                     */
                                    if(data['offerQuestionnaire'] === true){
                                        $(".questionnaire__wrapper").addClass('d-flex');
                                    }
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

    /* -------------------------------------------------------------------------------------------------------------- */
    /*
     *  Video player for episode with chapters
     */
    if($("#chapter-video").length){
        console.log("Episode with chapters!")

        let chapterVideoPlayer;
        let currentVideoID = $("#chapter-video").attr('video-id');
        let chapterCurrentTime = 0, chapterFinishedVideo = false;
        let currentChapterID = 0, lastChapterID = 0;

        let updateChapterActivityUri = '/episodes/activity/update-chapter-activity';

        let currentChapter = function (){
            return $(".ew__body").find('.current').attr('chapter-id');
        }
        let markCurrentAsFinished = function (){ return $(".ew__body").find('.current').find('.checkbox_w').addClass('checked'); }
        let markCurrentAsWatching = function (){ return $(".ew__body").find('.current').find('.checkbox_w').removeClass('checked'); }
        let setChapterAsCurrent = function (chapterID){
            $(".se__wrapper").removeClass('current');
            $(".se__wrapper[chapter-id='" + chapterID +"']").addClass('current');

            /**
             *  Set chapter ID for notes
             */
            $(".add__new_note").attr('chapter-id', chapterID);
        }

        let handleChapterVideo = function (){
            let videoWrapper = $("#chapter-video");
            currentVideoID = videoWrapper.attr('video-id');

            /* Set wrapper as not finished */
            // videoWrapper.attr('finished', 0);

            chapterVideoPlayer = new playerjs.Player(document.getElementById("chapter-video"));

            chapterVideoPlayer.on('ready', () => {
                /* Scroll to top */
                scrollToCurrent();

                /* Initial load */
                const currentTime = parseFloat($("#chapter-video").attr('current-time'));
                setTimeout(() => {
                    chapterVideoPlayer.setCurrentTime(currentTime);

                    /* Set my note starts at... */
                    $(".note__time").text(getMinutesAndSeconds(currentTime));
                }, 200); // Adjust delay if necessary
            });


            // Event handler when time is updated
            chapterVideoPlayer.on('timeupdate', (data) => {
                /* Update every second, not more often */
                if(chapterCurrentTime !== parseInt(data['seconds'])){
                    chapterCurrentTime = parseInt(data['seconds']);

                    videoWrapper.attr('current-time', parseInt(data['seconds']));

                    if(chapterCurrentTime === parseInt(data['duration'])){
                        /* End of the video, go to another video */
                        chapterFinishedVideo = true;
                    }else{
                        chapterFinishedVideo = false;
                    }

                    /* Set my note starts at .. */
                    $(".note__time").text(getMinutesAndSeconds(chapterCurrentTime));

                    $.ajax({
                        url: updateChapterActivityUri,
                        method: "POST",
                        dataType: "json",
                        data: {
                            time : chapterCurrentTime,
                            duration: parseInt(data['duration']),
                            // finished: finishedVideo,
                            video_id: videoWrapper.attr('video-id'),
                            episode_id: videoWrapper.attr('episode-id'),
                            current_chapter: currentChapter()
                        },
                        success: function success(response) {
                            let code = response['code'];

                            if(code === '0000'){
                                let data = response['data'];

                                console.log(data);

                                if(parseInt(data['progress']) === 100){
                                    /* Mark current chapter as finished */
                                    markCurrentAsFinished();
                                }

                                currentChapterID = data['currentChapter']['id'];
                                if(lastChapterID !== currentChapterID){
                                    /* Auto scroll when new chapter is started */
                                    lastChapterID = currentChapterID;
                                    autoScrollEnabled = true;

                                    $(".menu-chapter-title").text(data['currentChapter']['title']);
                                }

                                setChapterAsCurrent(data['currentChapter']['id']);
                                // if(data['episodeFinished'] === true){
                                //     finishEpisode();
                                //
                                //     /**
                                //      *  When episode is finished, and in a case when user did not complete survey, offer it a questionnaire
                                //      */
                                //     if(data['offerQuestionnaire'] === true){
                                //         $(".questionnaire__wrapper").addClass('d-flex');
                                //     }
                                // }
                            }else{
                                Notify.Me([response['message'], "warn"]);
                            }
                        }
                    });
                }
            });
        };

        /**
         *  Start new chapter on play btn
         */
        $(".play_chapter").click(function (){
            setChapterAsCurrent($(this).attr('chapter-id'));
            markCurrentAsWatching();

            chapterVideoPlayer.setCurrentTime(parseFloat($(this).attr('time')));
            chapterVideoPlayer.play();

            /**
             *  On mobile version, when chapter is played, hide chapters menu
             */
            if(window.innerWidth <= 1000){
                togglePlayer();
            }
        });

        /* On GET request, set initial data */
        handleChapterVideo();
    }
});
