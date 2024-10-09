{{--@extends('public-part.layout.layout')--}}

{{--@section('public-content')--}}

{{--    <div class="video__wrapper">--}}
{{--        <div style="position:relative;padding-top:56.25%;"><iframe src="https://iframe.mediadelivery.net/embed/61480/0e947078-2670-44b3-a90f-5b7735fe0a88?autoplay=true&loop=false&muted=false&preload=true&responsive=true" loading="lazy" style="border:0;position:absolute;top:0;height:100%;width:100%;" allow="accelerometer;gyroscope;autoplay;encrypted-media;picture-in-picture;" allowfullscreen="true"></iframe></div>--}}
{{--    </div>--}}


{{--@endsection--}}


{{--    <!DOCTYPE html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
{{--    <meta charset="UTF-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1.0">--}}
{{--    <title>Bunny.net Video Streaming</title>--}}
{{--    <style>--}}
{{--        /* Optional CSS for styling the video */--}}
{{--        video {--}}
{{--            display: block;--}}
{{--            margin: 0 auto;--}}
{{--            border: 1px solid #ccc;--}}
{{--        }--}}

{{--        button {--}}
{{--            display: block;--}}
{{--            margin: 20px auto;--}}
{{--            padding: 10px 20px;--}}
{{--            font-size: 16px;--}}
{{--            cursor: pointer;--}}
{{--        }--}}
{{--    </style>--}}
{{--</head>--}}
{{--<body>--}}

{{--<h1 style="text-align: center;">Bunny.net Video Streaming Example</h1>--}}

{{--<video id="bunny-video" width="640" height="360" controls>--}}
{{--    Your browser does not support the video tag.--}}
{{--</video>--}}

{{--<button id="play-button">Play Video</button>--}}

{{--<script>--}}
{{--    // Function to load the video dynamically from Bunny.net--}}
{{--    let workWithResponse = function(response){--}}
{{--        console.log("wee!");--}}
{{--        console.log(response);--}}
{{--    };--}}


{{--    async function loadVideo(videoId) {--}}
{{--        try {--}}
{{--            const options = {--}}
{{--                method: 'GET',--}}
{{--                headers: {--}}
{{--                    accept: 'application/json',--}}
{{--                    AccessKey: '7ed70483-de15-4fc7-b9944070cdf2-a793-4445'--}}
{{--                }--}}
{{--            };--}}

{{--            let uri = 'https://video.bunnycdn.com/library/61480/videos/' + videoId;--}}
{{--            const response = await fetch(uri, options)--}}
{{--                .then(response => response.json())--}}
{{--                .then(response => workWithResponse(response))--}}
{{--                .catch(err => console.error(err));--}}

{{--            // Make an API request to Bunny.net to get the video URL (replace VIDEO_LIBRARY_ID with your ID)--}}
{{--            // const response = await fetch(`https://video.bunnycdn.com/61480/${videoId}/play`);--}}
{{--            // const response = await fetch(`https://video.bunnycdn.com/library/61480/videos/${videoId}`);--}}
{{--            // https://video.bunnycdn.com/library/libraryId/videos/videoId--}}

{{--            console.log(response);--}}


{{--            console.log(response.signedUrl);--}}


{{--            if (response.ok) {--}}
{{--                // Get the video URL from the response--}}
{{--                const videoUrl = response.url;--}}

{{--                // Update the video source dynamically--}}
{{--                const videoElement = document.getElementById('bunny-video');--}}
{{--                videoElement.src = videoUrl;--}}

{{--                // Play the video automatically--}}
{{--                videoElement.play();--}}

{{--            } else {--}}
{{--                console.error('Failed to load video: ', response.statusText);--}}
{{--            }--}}
{{--        } catch (error) {--}}
{{--            console.error('Error loading video:', error);--}}
{{--        }--}}
{{--    }--}}

{{--    // Button to load and play video when clicked--}}
{{--    document.getElementById('play-button').addEventListener('click', function() {--}}
{{--        // Replace 'YOUR_VIDEO_ID' with the actual video ID from Bunny.net--}}
{{--        loadVideo('0e947078-2670-44b3-a90f-5b7735fe0a88');--}}
{{--    });--}}
{{--</script>--}}

{{--</body>--}}
{{--</html>--}}

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
        margin: 0;
        padding: 0;
    }
    iframe {
        display: block;
        margin: 20px auto;
    }
    div {
        text-align: center;
        margin-top: 20px;
    }
    button {
        padding: 10px 20px;
        font-size: 16px;
        background-color: #0077cc;
        color: #fff;
        border: none;
        cursor: pointer;
        margin: 5px;
    }
    textarea {
        width: 100%;
        height: 200px;
        margin-top: 20px;
        padding: 10px;
        box-sizing: border-box;
    }
</style>

<!-- the player.js library must be loaded before the iframe is loaded -->
<script type="text/javascript" src="https://assets.mediadelivery.net/playerjs/player-0.1.0.min.js"></script>

<!-- Bunny SThe iframe element for embedding the video player -->

<iframe id="bunny-stream-embed" src="https://iframe.mediadelivery.net/embed/61480/c7cf806c-eac4-4e2e-a200-6f35ce1cf9a3?autoplay=true&loop=false&muted=false&preload=true&responsive=true" width="720" height="400" frameborder="0" allow="accelerometer;gyroscope;autoplay;encrypted-media;picture-in-picture;"  allowfullscreen="true"></iframe>

{{--<div style="position:relative;padding-top:56.25%;"><iframe src="" loading="lazy" style="border:0;position:absolute;top:0;height:100%;width:100%;" allow="accelerometer;gyroscope;autoplay;encrypted-media;picture-in-picture;" allowfullscreen="true"></iframe></div>--}}
<!-- Buttons for video playback control -->
<div>
    <button id="play">Play</button>
    <button id="pause">Pause</button>
    <button id="seek">Seek to 10s</button>
</div>

<!-- Textarea for displaying log messages -->
<textarea id="log" cols="100" rows="30"></textarea>


<script>
    // Create a PlayerJS instance with the 'bunny-stream-embed' element
    const player = new playerjs.Player(document.getElementById("bunny-stream-embed"));

    // Event handler when the player is ready
    player.on('ready', () => {
        log("ready");
    });

    // Event handler when the player is played
    player.on('play', () => {
        log("play");
    });

    // Event handler when the player is paused
    player.on('pause', () => {
        log("pause");
    });

    // Event handler for time updates when the player is playing
    player.on('timeupdate', (data) => {
        console.log(data);
        log("timeupdate (" + data + ")");
    });

    // Event listener for the 'play' button
    document.getElementById('play').addEventListener('click', () => {
        player.play();
    })


    // Event listener for the '+pause' button
    document.getElementById('pause').addEventListener('click', () => {
        player.pause();
    });

    // Event listener for the 'seek to 10 seconds' button
    document.getElementById('seek').addEventListener('click', () => {
        player.getCurrentTime((currentTime) => {
            player.setCurrentTime(currentTime + 10);
        });
    });

    // Get the log text area element
    const logTextArea = document.getElementById('log');

    // Function to log messages and update the log text area
    function log(message) {
        console.log(message);
        logTextArea.value += `${message}\n`;
    }

</script>
