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
                        <div class="col-sm-12 col-md-6 d-flex align-items-center justify-content-center ">
                            <h3 class="card-title">{{$project['title']}}</h3>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="row">
                                <div class="btn-group w-100" role="group" aria-label="Basic example">
                                    @include('components.add_multiple_projects', ['parent_project_id' => $project['project_id']])
                                    @include('components.add_multiple_tasks', ['parent_project_id' => $project['project_id']])
                                    @include('components.edit_project_modal', ['project' => $project])
                                    @include('components.delete_project_modal', ['project' => $project])
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card border-0">
                            <div class="card-body pt-0">

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
