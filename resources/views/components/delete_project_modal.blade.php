<a href="#" class="btn btn-outline-danger" data-toggle="modal"
   data-target="#deleteProjectModal"><i class="fas fa-folder-minus"></i> Удалить проект</a>
<div class="modal fade" id="deleteProjectModal" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Удалить проект "{{$project['title']}}"?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('projects.destroy', $project['project_id'])}}" method="post">
                    @csrf
                    {{method_field('DELETE')}}
                    <button type="submit" class="btn btn-outline-danger">Да</button>
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Отмена</button>
                </form>
            </div>
        </div>
    </div>
</div>
