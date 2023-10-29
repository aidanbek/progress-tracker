@extends('layout.main')
@section('title', $project['title'])
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    @include('components.project_breadcrumb', ['project' => $project])
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-9 d-flex align-items-center">
                            <h3 class="card-title">{{$project['title']}}</h3>
                        </div>
                        <div class="col-sm-12 col-md-3">
                            <div class="row">
                                <div class="list-group w-100">
                                    @include('components.add_multiple_projects', ['parent_project_id' => $project['id']])
                                    @include('components.add_multiple_tasks', ['parent_project_id' => $project['id']])
                                    @include('components.edit_project_modal', ['project' => $project])
                                    @include('components.delete_project_modal', ['project' => $project])
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-sm-12">
                            @include('components.progressbar', ['config' => $project])
                        </div>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    <div class="row text-muted">
                        <div class="col-sm-6">
                            Создан: {{$project['created_at']}}
                        </div>
                        <div class="col-sm-6">
                            Обновлен:  {{$project['updated_at']}}
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
