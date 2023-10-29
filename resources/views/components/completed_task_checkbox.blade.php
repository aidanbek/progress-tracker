@php
    if (!isset($task)) {
        $task = [
            'completed' => 0,
            'id' => ''
        ];
    }
@endphp
<input type="checkbox"
       name="completed"
       class="custom-control-input text-secondary"
       @if($task['completed'] === 1) checked @endif
       id="completed_{{$task['id']}}">
<label class="custom-control-label"
       for="completed_{{$task['id']}}">Выполнена?</label>
