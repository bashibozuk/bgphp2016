@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading clearfix">
                    <span class="pull-left">Games</span>
                    <a class="btn btn btn-success pull-right" href="/game/create">Create New Game</a>
                </div>

                <div class="panel-body">
                    <ul class="list-group">
                        @if  (count($data))
                            @foreach($data as $row)
                                <li class="list-group-item clearfix">
                                    <span class="pull-left">{{$row->name}}</span>&nbsp;<a class="btn btn-primary  pull-right" href="{{ '/join-game/' . $row->id }}">Join</a>
                                </li>
                            @endforeach
                        @else
                            <li class="list-group-item">No games , create one</li>
                        @endif

                    </ul>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
