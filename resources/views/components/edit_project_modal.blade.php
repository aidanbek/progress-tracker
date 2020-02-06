<a href="#" class="btn btn-outline-secondary" data-toggle="modal"
   data-target="#showEditProjectModal_{{$project['project_id']}}">Редактировать проект</a>
<div class="modal fade" id="showEditProjectModal_{{$project['project_id']}}" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Задача: {{$project['title']}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="" action="{{ route('projects.update', $project['project_id'])}}" method="post">
                    @csrf
                    {{method_field('PATCH')}}
                    <div class="form-group row">
                        <div class="col-12">
                            <input type="text" class="form-control" value="{{$project['title']}}" name="title"
                                   id="task_title">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-outline-success">Сохранить</button>
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Отмена</button>
                </form>
            </div>
        </div>
    </div>
</div>
