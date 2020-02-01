<?php
function showProjectFullInfo($project)
{
    echo "<h5 class='card-title'>{$project['title']}</h5>";

    echo '<ul>';
    if (count($project['tasks']) > 0):
        foreach ($project['tasks'] as $task):
            echo "<li>{$task['title']}</li>";
        endforeach;
    endif;

    if (count($project['all_child_projects']) > 0):
        foreach ($project['all_child_projects'] as $childProject):
            echo '<li>';
            showProjectFullInfo($childProject);
            echo '</li>';
        endforeach;
    endif;

    echo '</ul>';
}
?>

@extends('layout.main')
@section('content')
    <div class="row">
        <div class="col-sm-6">
            @foreach ($projects as $project)
                <div class="card bg-light mb-3">
                    <div class="card-header">Header</div>
                    <div class="card-body">
                        <?php showProjectFullInfo($project); ?>
                    </div>
                    <div class="card-footer">Footer</div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
