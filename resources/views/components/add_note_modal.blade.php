<a href="#"
   class="btn btn-outline-secondary btn-block btn-sm"
   data-toggle="modal"
   data-target="#createNewNoteModal"><i class="fas fa-sticky-note"></i> Добавить заметку
</a>
<div class="modal fade" id="createNewNoteModal" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Новая заметка</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('note.store')}}" method="post">
                    @csrf
                    @if(isset($project) && !is_null($project['parent_project_id']))
                        <input type="hidden" name="project_id" value="{{$project['parent_project_id']}}">
                    @endif
                    @if(isset($task) && !is_null($task['task_id']))
                        <input type="hidden" name="task_id" value="{{$task['task_id']}}">
                    @endif
                    <div class="form-group">
                        <label for="content">Содержание</label>
                        <input type="text" class="form-control" name="content" id="content">
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
