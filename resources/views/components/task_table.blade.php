@if(count($tasks) > 0)
    <div class="card border-0">
        <div class="card-body">
            <h5 class="card-title">Задачи</h5>
            <table class="table table-hover mb-0">
                <thead>
                <tr>
                    <th>Задача</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($tasks as $task)
                    <tr>
                        <td>
                            <a class="project-link" href="{{$task['route']}}">
                                <h5>
                                    @if($task['completed'] === 1)
                                        <i class="fas fa-check-square"></i>
                                    @else
                                        <i class="fas fa-square"></i>
                                    @endif
                                    {{$task['title']}}
                                </h5>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endif()
