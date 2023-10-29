@if(count($tasks) > 0)
    <div class="card border-left-0 border-right-0 border-bottom-0 card-collapsable-table">
        <div class="card-body mx-n3">
            <h5 class="card-title pl-3 collapse-link">Задачи</h5>
            <table class="table table-hover table-sm mb-0">
                <tbody>
                @php $counter = 0; @endphp
                @foreach ($tasks as $task)
                    <tr>
                        <td>
                            <a class="project-link"
                               href="#"
                               data-toggle="modal"
                               data-target="#showTaskModal_{{$task['id']}}">
                                @if($task['completed'] === 1)
                                    <p class="text-muted mb-0">
                                        @include('components.icons.closed_task')
                                        {{++$counter}}
                                        {{$task['title']}}
                                    </p>
                                @else
                                    <p class="mb-0">
                                        @include('components.icons.open_task')
                                        {{++$counter}}
                                        {{$task['title']}}
                                    </p>
                                @endif
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @each('components.task_modal',$tasks, 'task')
@endif()
