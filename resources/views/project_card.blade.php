<div class="card mb-3">
    <div class="card-body">
        <h5 class="card-title">
            <a class="project-link" href="/project/{{$project['project_id']}}">{{$project['title']}}</a>
        </h5>
    </div>

    <ul class="list-group list-group-flush">
        <li class="list-group-item border-top">
            <div class="progress">
                <div class="progress-bar bg-secondary"
                     role="progressbar"
                     style="width: {{$project['child_task_completion_percentage']}}%;"
                     aria-valuenow="{{$project['child_task_completion_percentage']}}"
                     aria-valuemin="0"
                     aria-valuemax="100">
                    {{$project['child_task_completion_percentage']}}%
                </div>
            </div>
        </li>
    </ul>

    <?php $i = 0; ?>

    @foreach($project['tasks'] as $task)
        <div class="list-group list-group-flush">
            <a href="/task/{{$task['task_id']}}"
               class="list-group-item list-group-item-action d-flex justify-content-between align-items-center @if($task['completed']) text-muted @endif">
                <span>
                    <b>{{++$i}})</b>
                    {{$task['title']}}
                </span>
                @if($task['completed'])
                    <i class="fas fa-check-square"></i>
                @else
                    <i class="fas fa-square"></i>
                @endif
            </a>
        </div>
    @endforeach

    @foreach($project['child_projects'] as $childProject)
        <div class="list-group list-group-flush">
            <a href="/project/{{$childProject['project_id']}}"
               class="list-group-item list-group-item-action d-flex justify-content-between align-items-center @if($childProject['child_task_completion_percentage'] === 100) text-muted @endif">
                    <span>
                        <b>{{++$i}})</b>
                        {{$childProject['title']}}
                    </span>
                <span>{{$childProject['child_task_completion_percentage']}}%</span>
            </a>
        </div>
    @endforeach
    <div class="card-footer border-top-0">
        <small class="text-muted">Last updated 3 mins ago</small>
    </div>
</div>
