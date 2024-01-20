<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('service.maintenance') }}</title>

    <style>
        body {
            margin: 0;
            background: #E0E0E0;
            padding: 2rem;
            overflow-x: hidden;
        }

        .parent {
            text-align: center;
        }

        img {
            max-width: 100%;
        }

        a {
            background: #2962FF;
            padding: 1rem;
            border-radius: 4rem;
            color: #202124;
            text-decoration: none;
        }

        a:hover {
            background: #202124;
            color: #E0E0E0;
        }

        h1 {
            padding-bottom: 2rem
        }

        span {
            display: block;
            padding-top: 2rem;
            font-size: 4rem;
            font-weight: bold
        }
    </style>
</head>

<body>
    <div class="parent">
        <img src="{{ asset('assets/images/maintenance.svg') }}" alt="">

        <span>503</span>

        <h1>{{ __('service.maintenance') }}</h1>

        <a href="{{ Request::url() }}">{{ __('me_str.reload') }}</a>
    </div>
</body>

</html>
