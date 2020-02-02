@extends('layout.main')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">{{$task['title']}}</h3>
{{--                                        {{dd($task)}}--}}
                </div>

            </div>
        </div>
    </div>
@endsection
