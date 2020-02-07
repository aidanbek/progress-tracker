<div class="modal fade" id="showTaskModal_{{$task['task_id']}}" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Задача: {{$task['title']}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="" action="{{ route('tasks.update', $task['task_id'])}}" method="post">
                    @csrf
                    {{method_field('PATCH')}}
                    <div class="form-group row">
                        <div class="col-12">
                            <input type="text" class="form-control" value="{{$task['title']}}" name="title"
                                   id="task_title">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                            <div class="custom-control custom-checkbox">
                                @include('components.completed_task_checkbox', ['task' => $task])
                            </div>
                        </div>
                    </div>
                    <span class="float-left">
                         <button type="submit" class="btn btn-outline-success">Сохранить</button>
                         <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Отмена</button>
                    </span>
                </form>
                <form action="{{ route('tasks.destroy', $task['task_id'])}}" method="post">
                    <span class="float-right">
                        @csrf
                        {{method_field('DELETE')}}
                        <button type="submit" class="btn btn-outline-danger">Удалить</button>
                    </span>
                </form>
            </div>
        </div>
    </div>
</div>
