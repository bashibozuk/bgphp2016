@extends('layouts.app')
@section('content')
    <center>

        <div class="image-frame">
            <h3 id="wait">Wait someone to join your game</h3>
            <h3 id="joined" class="hidden">Someone joined your game , redirecting ....</h3>
            <img src="/images/home.png">
        </div>
    </center>
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