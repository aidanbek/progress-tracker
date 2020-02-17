@extends('layout.main')
@section('title', 'Все проекты')
@section('content')
{{--    <div class="row">--}}
{{--        <div class="col-sm-12">--}}
{{--            @include('components.project_breadcrumb', ['project' => []])--}}
{{--        </div>--}}
{{--    </div>--}}
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title mb-0">Все проекты</h3>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card border-0">
                            <div class="card-body py-0">
                                <div class="row">
                                    <div class="col-lg-3 col-md-6 col-sm-12 mb-2">
                                        @include('components.add_project_modal', ['parent_project_id' => null])
                                    </div>
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
