<html>
    <head>
        <title>{{ 'Welcome' }}</title>
        <script src="https://kit.fontawesome.com/bccf934f7c.js" crossorigin="anonymous"></script>
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('files/images/logo.ico') }}" />
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">

        @vite(['resources/css/app.scss', 'resources/css/admin/admin.scss', 'resources/js/app.js'])
    </head>
    <body>
        @include('admin.layout.snippets.menu')

        <!-- Main page content -->
        <div class="main-content">
            <!-- Basic header of every page -->
            @include("admin.layout.snippets.content.content-menu")

            <!-- Main content of every page -->
            @yield('content')
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"> </script>
        <script>

            $('.summernote').summernote({
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    // ['fontname', ['fontname']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', ]], // 'picture', 'video'
                    // ['view', ['help']],
                    // ['height', ['height']],
                ],
                placeholder: 'Unesite vaš tekst ovdje ..',
                height : 240
            });

            if ( $('.summernote').is('[readonly]') ) {
                $('.summernote').summernote('disable');
            }

        </script>
    </body>
</html>
