@if($config['type'] = 'inline')
    <span class="progress">
        <span class="progress-bar bg-dark"
              role="progressbar"
              style="width: {{$config['completion_percentage']}}%;"
              aria-valuenow="{{$config['completion_percentage']}}"
              aria-valuemin="0"
              aria-valuemax="100">
            {{$config['completion_percentage']}}%
        </span>
    </span>
@else
    <div class="progress">
        <div class="progress-bar bg-dark"
              role="progressbar"
              style="width: {{$config['completion_percentage']}}%;"
              aria-valuenow="{{$config['completion_percentage']}}"
              aria-valuemin="0"
              aria-valuemax="100">
            {{$config['completion_percentage']}}%
        </div>
    </div>
@endif
