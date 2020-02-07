@if(count($tasks) > 0)
    <div class="card border-0">
        <div class="card-body mx-n3">
            <h5 class="card-title">Задачи</h5>
            <table class="table table-hover mb-0">
                <thead>
                <tr>
                    <th>Задача</th>
                </tr>
                </thead>
                <tbody>
                @php $counter = 0; @endphp
                @foreach ($tasks as $task)
                    <tr>
                        <td>
                            <a class="project-link"
                               href="#"
                               data-toggle="modal"
                               data-target="#showTaskModal_{{$task['task_id']}}">
                                @if($task['completed'] === 1)
                                    <h5 class="text-muted">
                                        <i class="fas fa-check-square"></i>
                                        {{++$counter}}
                                        <del>{{$task['title']}}</del>
                                    </h5>
                                @else
                                    <h5>
                                        <i class="fas fa-square"></i>
                                        {{++$counter}}
                                        {{$task['title']}}
                                    </h5>
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
