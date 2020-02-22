@if(count($projects) > 0)
    <div class="card border-0">
        <div class="card-body mx-n3">
            <h5 class="card-title pl-3">Проекты</h5>
            <table class="table table-hover table-sm mb-0 table">
                <thead>
                <tr>
                    <th>Название</th>
                    <th>Прогресс</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <td>
                            <a class="project-link" href="{{$project['route']}}">
                                <p class="mb-n1">
                                    <i class="fas fa-folder"></i>
                                    {{$project['title']}}
                                    @if($project['child_project_count'] > 0)
                                    <span class="badge badge-pill badge-light">
                                    <i class="fas fa-sitemap"></i>
                                    {{$project['child_project_count']}}
                                    </span>
                                    @endif
                                </p>
                            </a>
                        </td>
                        <td class="">
                            @if($project['child_task_count'] > 0)
                                @if($project['child_task_completed_count'] === $project['child_task_count'])
                                    <p class="text-muted mb-n1">
                                        <i class="fas fa-check-square"></i>
                                        {{$project['child_task_completed_count']}}/{{$project['child_task_count']}}
                                    </p>
                                @else
                                    <p class="mb-n1">
                                        <i class="fas fa-check-square"></i>
                                        {{$project['child_task_completed_count']}}/{{$project['child_task_count']}}
                                    </p>
                                @endif
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endif
