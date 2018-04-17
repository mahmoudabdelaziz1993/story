@extends('layouts.app')
@section('title','POST|PAGE')

@section('content')
    <div class="col-md-8 col-md-offset-2">
    <div class="panel panel-default">
        <div class="panel-heading">

    <div class="panel-body">
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    @include('layouts.post')
    </div>
            <hr>

                <div class="container">
                    <div class="col-lg-8 col-md-10 mx-auto">
                        <div class="well">
                            <form action="{{route('comment',['post'=>$posts->id])}}" method="post">
                            <h4>What is on your mind?</h4>
                            <div class="input-group">
                                <input type="text" id="userComment" name="userComment"  class="form-control input-sm chat-input" placeholder="Write your message here..." />
                                <span class="input-group-btn" onclick="addComment()">
            <button class="btn btn-primary btn-sm" type="submit"><span class="glyphicon glyphicon-comment"></span> Add Comment</a>
        </span>
                                <input type="hidden" name="_token" value="{{Session::token()}}">

                            </div>
                            </form>
                            @foreach($com as $s)
                            <hr data-brackets-id="12673">
                            <ul data-brackets-id="12674" id="sortable" class="list-unstyled ui-sortable">
                                <a href=""><strong class="pull-left primary-font">{{$s->user->name}}</strong></a>
                                <small class="pull-right text-muted">
                                    <span class="pull-right primary-font"></span>{{$s->created_at}}</small>
                                </br>
                                <li class="ui-state-default">{{$s->body}} </li>
                                </br>
                                                          </ul>@endforeach
                        </div>
                    </div>


@endsection
