@extends('layout.main')
@section('content')
    <?php
    function getParent($project)
    {
        if (!empty($project)) {
            return array_merge(
                [
                    $project['project_id'] => [
                        'title' => $project['title'],
                        'route' => $project['route']
                    ]
                ], getParent($project['all_parent_projects']));
        } else {
            return [];
        }
    }
    ?>

    <div class="row">
        <div class="col-sm-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <?php $links = array_reverse(getParent($project)); ?>
                    @foreach($links as $link)
                            <li class="breadcrumb-item"><a href="{{$link['route']}}">{{$link['title']}}</a></li>
                    @endforeach
                    {{--                    <li class="breadcrumb-item"><a href="#">Home</a></li>--}}
                    {{--                    <li class="breadcrumb-item"><a href="#">Library</a></li>--}}
                    {{--                    <li class="breadcrumb-item active" aria-current="page">Data</li>--}}
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">{{$project['title']}}</h3>
                    {{dd($project)}}
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Проекты</h5>
                        @include('components.project_table', ['projects' => $project['child_projects']])
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Задачи</h5>
                        @include('components.task_table', ['tasks' => $project['tasks']])
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
