@extends('layout.main')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title mb-0">Все проекты</h3>
                </div>
                @include('components.project_table', ['projects' => $projects])
                <div class="card-footer">
                    @include('components.add_project')
                </div>
            </div>
        </div>
    </div>
@endsection
