@include('components.project_action_button', [
    'iconTitle' => 'edit',
    'dataTarget' => "#showEditProjectModal_{$project['id']}",
    'linkTitle' => 'Редактировать'
])
<div class="modal fade" id="showEditProjectModal_{{$project['id']}}" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Проект: {{$project['title']}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="" action="{{ route('projects.update', $project['id'])}}" method="post">
                    @csrf
                    {{method_field('PATCH')}}
                    <input type="hidden" name="parent_id" value="{{$project['parent_id']}}">
                    <div class="form-group row">
                        <div class="col-12">
                            <input type="text" class="form-control" value="{{$project['title']}}" name="title"
                                   id="task_title">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-outline-secondary">Сохранить</button>
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Отмена</button>
                </form>
            </div>
        </div>
    </div>
</div>
