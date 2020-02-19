@if($config['type'] = 'inline')
    <span class="progress">
        <span class="progress-bar bg-dark"
              role="progressbar"
              style="width: {{$config['child_task_completion_percentage']}}%;"
              aria-valuenow="{{$config['child_task_completion_percentage']}}"
              aria-valuemin="0"
              aria-valuemax="100">
            {{$config['child_task_completion_percentage']}}%
        </span>
    </span>
@else
    <div class="progress">
        <div class="progress-bar bg-dark"
              role="progressbar"
              style="width: {{$config['child_task_completion_percentage']}}%;"
              aria-valuenow="{{$config['child_task_completion_percentage']}}"
              aria-valuemin="0"
              aria-valuemax="100">
            {{$config['child_task_completion_percentage']}}%
        </div>
    </div>
@endif
