@extends('layout.main')
@section('content')

    <div class="row">
        <div class="col-sm-12">
           @include('components.project_breadcrumb', ['project' => $project])
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">{{$project['title']}}</h3>
{{--                                        {{dd($project)}}--}}
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        @include('components.project_table', ['projects' => $project['child_projects']])
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        @include('components.task_table', ['tasks' => $project['tasks']])
                    </div>
                </div>

                <div class="card-footer">
                    @include('components.add_project')
                </div>

            </div>
        </div>
    </div>
@endsection
