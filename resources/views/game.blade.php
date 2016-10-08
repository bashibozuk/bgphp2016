@extends('layouts.app')
@section('content')
   <canvas width="600" height="600"></canvas>
    <script>

        (function() {
            var interval = setInterval(function () {
                $.get('/check-game-join').then(function(data) {
                    if (data.success) {
                        clearInterval(interval);
                        $('#wait').addClass('hidden');
                        $('#joined').removeClass('hidden');
                        setTimeout(function () {
                            window.location ='/play-game';
                        }, 1000)
                    }
                })
            }, 1000)
        }());

    </script>
@endsection