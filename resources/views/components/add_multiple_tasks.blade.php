<a href="#" class="btn btn-outline-secondary btn-block" data-toggle="modal"
   data-target="#createNewTasksModal"><i class="fas fa-plus-square"></i> Добавить задачи</a>
<div class="modal fade" id="createNewTasksModal" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Новые задачи</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('tasks.store')}}" method="post">
                    @csrf
                    @if(!is_null($parent_project_id))
                        <input type="hidden" name="parent_project_id" value="{{$parent_project_id}}">
                        <input type="hidden" name="multiple_add" value="1">
                    @endif
                    <div class="form-group">
                        <label for="tasks_titles">Названия (по строке на каждую)</label>
                        <textarea class="form-control"
                                  name="tasks_titles"
                                  id="tasks_titles"
                                  cols="30"
                                  rows="10"></textarea>
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox"
                                       name="completed"
                                       class="custom-control-input text-secondary"
                                       id="completed_tasks">
                                <label class="custom-control-label"
                                       for="completed_tasks">Выполнены?</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-outline-success btn-block" id="createTask">
                            Сохранить
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
