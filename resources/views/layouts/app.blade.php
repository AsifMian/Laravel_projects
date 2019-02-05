<!doctype html>
<html lang="en">
<head>

    <title>Create Album</title>
    {{--<link rel="stylesheet" href="css/app.css">--}}
    {{--cdn link for foundation (A front end framework like bootstrap--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.1/css/foundation.css">
</head>
<body>
@include('inc.topbar')
<div class="row col-sm-4">

            <div style="margin: 34px">
                     @include('inc.messages')
                    @yield('content')
            </div>

</div>
</body>
</html>