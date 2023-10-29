<a href="{{route('projects.index')}}"
   type="button"
   class="btn btn-outline-secondary">@include('components.icons.project') Все проекты</a>
@php $links = $project['hierarchy_path']; @endphp
@foreach($links as $link)
    <div class="btn-group">
        <a href="{{$link['route']}}"
           type="button"
           class="btn btn-outline-secondary">
            @include('components.icons.project') {{$link['title']}}
        </a>
        @if(count($link['siblings']) > 0)
            <button type="button"
                    id="dropdownProjectMenuLink_{{$link['id']}}"
                    class="btn btn-outline-secondary dropdown-toggle dropdown-toggle-split"
                    data-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false">
                <span class="sr-only">Toggle Dropdown</span>
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownProjectMenuLink_{{$link['id']}}">
                @foreach($link['siblings'] as $sibling)
                    @if($project['id'] !== $sibling['id'])
                        <a class="dropdown-item" href="{{$sibling['route']}}">
                            @include('components.icons.project') {{$sibling['title']}}
                        </a>
                    @else
                        <a class="dropdown-item active" href="{{$sibling['route']}}">
                            @include('components.icons.project') {{$sibling['title']}}
                        </a>
                    @endif
                @endforeach
            </div>
        @endif
    </div>
@endforeach

