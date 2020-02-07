@php
    if (!isset($task)) {
        $task = [
            'completed' => 0,
            'task_id' => ''
        ];
    }
@endphp
<input type="checkbox"
       name="completed"
       class="custom-control-input text-secondary"
       @if($task['completed'] === 1) checked @endif
       id="completed_{{$task['task_id']}}">
<label class="custom-control-label"
       for="completed_{{$task['task_id']}}">Выполнена?</label>
