@if(count($projects) > 0)
    <div class="card border-left-0 border-right-0 border-bottom-0 card-collapsable-table">
        <div class="card-body mx-n3">
            <h5 class="card-title pl-3 collapse-link">Проекты</h5>
            <table class="table table-hover table-sm mb-0 table">
                <thead>
                <tr>
                    <th>Название</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <td>
                            <a class="project-link" href="{{$project['route']}}">
                                <span class="mb-n1">
                                    @include('components.icons.project')
                                    {{$project['title']}}
                                </span>
                            </a>
                            @if(($project['child_project_count'] + $project['child_task_count']) > 0)
                                <span class="text-muted mb-0">
                                    <i class="fas fa-sitemap"></i>
                                    {{$project['child_project_count'] + $project['child_task_count']}}
                                </span>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endif
