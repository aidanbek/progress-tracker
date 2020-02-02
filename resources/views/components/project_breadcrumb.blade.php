<?php
function getBreadcrumbLinks($project)
{
    if (!empty($project)) {
        return array_merge(
            [
                $project['project_id'] => [
                    'title' => $project['title'],
                    'route' => $project['route']
                ]
            ], getBreadcrumbLinks($project['all_parent_projects']));
    } else {
        return [];
    }
}
?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('projects.index')}}">Проекты</a></li>
        <?php $links = array_reverse(getBreadcrumbLinks($project)); ?>
        @foreach($links as $link)
            <li class="breadcrumb-item"><a href="{{$link['route']}}">{{$link['title']}}</a></li>
        @endforeach
    </ol>
</nav>
