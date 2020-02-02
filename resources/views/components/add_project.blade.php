<a href="#" class="btn btn-outline-secondary" data-toggle="modal"
   data-target="#createNewProjectModal">Добавить проект</a>
<div class="modal fade" id="createNewProjectModal" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Новый проект</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('projects.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="project_title">Название</label>
                        <input type="text" class="form-control" name="title" id="project_title">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block" id="createProject">
                            Сохранить
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
