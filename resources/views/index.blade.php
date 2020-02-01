@extends('layout.main')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            @foreach ($projects as $project)
                {{dd($project)}}

{{--                <div class="card mb-3 border-dark">--}}
{{--                    <div class="card-body">--}}
{{--                        <h5 class="card-title">{{$project['title']}}</h5>--}}

{{--                    </div>--}}

{{--                    @foreach($project['tasks'] as $task)--}}
{{--                        <ul class="list-group list-group-flush">--}}
{{--                            <li class="list-group-item">{{$task['title']}}</li>--}}
{{--                        </ul>--}}
{{--                    @endforeach--}}

{{--                    <div class="card-body">--}}
{{--                        <div class="progress">--}}
{{--                            <div class="progress-bar bg-dark"--}}
{{--                                 role="progressbar"--}}
{{--                                 style="width: {{$project['completion_percentage']}}%;"--}}
{{--                                 aria-valuenow="{{$project['completion_percentage']}}"--}}
{{--                                 aria-valuemin="0"--}}
{{--                                 aria-valuemax="100">--}}
{{--                                {{$project['completion_percentage']}}--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                </div>--}}

            @endforeach
        </div>
    </div>
@endsection
