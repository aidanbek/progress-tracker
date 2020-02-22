<a href="#" class="btn btn-outline-secondary btn-block btn-sm" data-toggle="modal"
   data-target="#createNewTaskModal"><i class="fas fa-plus-square"></i> Добавить задачу</a>
<div class="modal fade" id="createNewTaskModal" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Новая задача</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('tasks.store')}}" method="post">
                    @csrf
                    @if(!is_null($parent_project_id))
                        <input type="hidden" name="parent_project_id" value="{{$parent_project_id}}">
                    @endif
                    <div class="form-group">
                        <label for="task_title">Название</label>
                        <input type="text" class="form-control" name="title" id="task_title">
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                            <div class="custom-control custom-checkbox">
                                @include('components.completed_task_checkbox')
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-outline-secondary btn-block" id="createTask">
                            Сохранить
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
