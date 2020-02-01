@extends('layout.main')
@section('content')
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            @foreach ($projects as $project)
                {{--                {{dd($project)}}--}}

                <div class="card mb-3">
{{--                    <div class="card-header">--}}

{{--                    </div>--}}
                    <div class="card-body">
                        <h5 class="card-title">
                            <a class="project-link" href="/project/{{$project['project_id']}}">{{$project['title']}}</a>
                        </h5>

                    </div>

                    @if($project['completion_percentage'] > 0)
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item border-top">
                            <div class="progress">
                                <div class="progress-bar bg-secondary"
                                     role="progressbar"
                                     style="width: {{$project['completion_percentage']}}%;"
                                     aria-valuenow="{{$project['completion_percentage']}}"
                                     aria-valuemin="0"
                                     aria-valuemax="100">
                                    {{$project['completion_percentage']}}%
                                </div>
                            </div>
                        </li>
                    </ul>
                    @endif

                    @foreach($project['tasks'] as $task)
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <a class="task-link" href="/task/{{$task['task_id']}}">
                                @if($task['completed'])
                                    <i class="fas fa-check-square"></i>
                                @else
                                    <i class="fas fa-square"></i>
                                @endif
                                {{$task['title']}}
                                </a>
                            </li>
                        </ul>
                    @endforeach

                    {{--                    @foreach($project['child_projects'] as $childProject)--}}
                    {{--                        <ul class="list-group list-group-flush">--}}
                    {{--                            <li class="list-group-item">--}}
                    {{--                                <ul>--}}
                    {{--                                    <li><a href="/project/{{$childProject['project_id']}}">Project: {{$childProject['title']}}</a></li>--}}
                    {{--                                    <li>--}}
                    {{--                                        <div class="progress">--}}
                    {{--                                            <div class="progress-bar bg-dark"--}}
                    {{--                                                 role="progressbar"--}}
                    {{--                                                 style="width: {{$childProject['completion_percentage']}}%;"--}}
                    {{--                                                 aria-valuenow="{{$childProject['completion_percentage']}}"--}}
                    {{--                                                 aria-valuemin="0"--}}
                    {{--                                                 aria-valuemax="100">--}}
                    {{--                                                {{$childProject['completion_percentage']}}--}}
                    {{--                                            </div>--}}
                    {{--                                        </div>--}}
                    {{--                                    </li>--}}
                    {{--                                </ul>--}}
                    {{--                            </li>--}}
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
{{--                    <div class="card-footer border-top-0">--}}
{{--                    </div>--}}
                </div>

            @endforeach
        </div>
    </div>
@endsection
