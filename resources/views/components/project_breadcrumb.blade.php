<nav aria-label="breadcrumb">
    <ol class="breadcrumb p-0 mb-n1">
        <li class="breadcrumb-item"><a href="{{route('projects.index')}}">Все проекты</a></li>
        <?php $links = $project['hierarchy_path']; ?>
        @foreach($links as $link)
            <li class="breadcrumb-item" id="dropdownProjectMenuLink_{{$link['project_id']}}">
                <a href="{{$link['route']}}">{{$link['title']}}</a>
            </li>
        @endforeach
    </ol>
</nav>
