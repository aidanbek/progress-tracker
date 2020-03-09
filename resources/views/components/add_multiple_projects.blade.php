@include('components.project_action_button', [
    'iconTitle' => 'folder-plus',
    'dataTarget' => "#createNewProjectsModal",
    'linkTitle' => 'Добавить проекты'
])
<div class="modal fade" id="createNewProjectsModal" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Новые проекты</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('projects.store')}}" method="post">
                    @csrf
                    @if(!is_null($parent_project_id))
                        <input type="hidden" name="parent_project_id" value="{{$parent_project_id}}">
                    @endif
                    <div class="form-group">
                        <label for="projects_titles">Названия проектов (по строке на каждую)</label>
                        <textarea class="form-control"
                                  name="projects_titles"
                                  id="projects_titles"
                                  cols="30"
                                  rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-radio">
                            @include('components.radio_input', [
                                'id' => 'customRadio1',
                                'name' => 'additionalAction',
                                'checked' => 'checked',
                                'title' => 'Ничего'
                            ])
                        </div>
                        <div class="custom-control custom-radio">
                            @include('components.radio_input', [
                                'id' => 'customRadio2',
                                'name' => 'additionalAction',
                                'value' => 'open_last',
                                'title' => 'Открыть (последний)'
                            ])
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-outline-secondary btn-block" id="createProject">
                            Добавить
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
