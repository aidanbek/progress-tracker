@if(count($projects) > 0)
    <div class="card border-0">
        <div class="card-body mx-n3">
            <h5 class="card-title">Проекты</h5>
            <table class="table table-hover mb-0">
                <thead>
                <tr>
                    <th>Название</th>
                    <th>Задачи</th>
                    <th>Дочерние проекты</th>
                    <th>Прогресс</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <td>
                            <a class="project-link" href="{{$project['route']}}">
                                <h5>
                                    <i class="fas fa-folder"></i>
                                    {{$project['title']}}
                                </h5>
                            </a>
                        </td>
                        <td><i class="fas fa-list"></i> {{$project['child_task_count']}}</td>
                        <td><i class="fas fa-list-alt"></i> {{$project['child_project_count']}}</td>
                        <td>
                            <span class="badge w-100">
                                @include('components.progressbar', ['config' => [
                                    'type' => 'inline',
                                    'completion_percentage' => $project['completion_percentage']
                                ]])
                            </span>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endif
