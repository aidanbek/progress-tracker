@extends('layout.main')
@section('title', $project['title'])
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
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card border-0">
                            <div class="card-body pt-0">
                                @include('components.add_project', ['parent_project_id' => $project['project_id']])
                                @include('components.add_task', ['parent_project_id' => $project['project_id']])
                                @if(($project['child_task_count'] + $project['child_project_count']) === 0)
                                    @include('components.delete_project', ['project' => $project])
                                @endif
                            </div>
                        </div>
                    </div>
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
            </div>
        </div>
    </div>
@endsection
