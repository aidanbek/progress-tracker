@if(count($tasks) > 0)
<table class="table table-hover mb-0">
    <thead>
    <tr>
        <th>Название</th>
        <th>Статус</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($tasks as $task)
        <tr>
            <td>
                <a class="project-link" href="{{$task['route']}}">
                    <h5>
                        {{$task['title']}}
                    </h5>
                </a>
            </td>
            <td>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endif()
