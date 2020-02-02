@extends('layout.main')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title mb-0">Проекты</h3>
                </div>
                @include('components.project_table', ['projects' => $projects])
                <div class="card-footer text-muted">
                    <a href="#" class="btn btn-outline-secondary">Добавить проект</a>
                </div>
            </div>
        </div>
    </div>
@endsection
