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
                <div class="card-body">
                    <h3 class="card-title mb-0">Все проекты</h3>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card border-0">
                            <div class="card-body pt-0 pb-0">
                                @include('components.add_project', ['parent_project_id' => null])
                            </div>
                        </div>
                    </div>
                </div>
                @include('components.project_table', ['projects' => $projects])
            </div>
        </div>
    </div>
@endsection
