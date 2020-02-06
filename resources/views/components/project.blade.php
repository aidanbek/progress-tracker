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
                                <span class="float-left">
                                    @include('components.add_project_modal', ['parent_project_id' => $project['project_id']])
                                    @include('components.add_task_modal', ['parent_project_id' => $project['project_id']])
                                </span>
                                <span class="float-right">
                                    @include('components.edit_project_modal', ['project' => $project])
                                    @if(($project['child_task_count'] + $project['child_project_count']) === 0)
                                        @include('components.delete_project_modal', ['project' => $project])
                                    @endif
                                </span>
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
