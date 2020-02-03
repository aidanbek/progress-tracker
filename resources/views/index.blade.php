@extends('layout.main')
@section('title', 'Все проекты')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            @include('components.project_breadcrumb', ['project' => []])
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    @include('components.add_project')
                </div>
                <div class="card-body">
                    <h3 class="card-title mb-0">Все проекты</h3>
                </div>
                @include('components.project_table', ['projects' => $projects])

            </div>
        </div>
    </div>
@endsection
