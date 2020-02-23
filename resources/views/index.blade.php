@extends('layout.main')
@section('title', 'Все проекты')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 d-flex align-items-center">
                            <h3 class="card-title">Все проекты</h3>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="row">
                                <div class="btn-group w-100" role="group" aria-label="Basic example">
                                    @include('components.add_multiple_projects', ['parent_project_id' => null])
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @include('components.project_table', ['projects' => $projects])
            </div>
        </div>
    </div>
@endsection
