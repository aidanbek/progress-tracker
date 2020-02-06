{{--@if ($errors->any())--}}
{{--    <div class="alert alert-danger">--}}
{{--        <ul>--}}
{{--            @foreach ($errors->all() as $error)--}}
{{--                <li>{{ $error }}</li>--}}
{{--            @endforeach--}}
{{--        </ul>--}}
{{--    </div>--}}
{{--@endif--}}
{{--<div class="container">--}}
{{--    <div class="row">--}}
{{--        <div class="col-sm-12">--}}
            @if(session('success'))
                @include('components.alert_message', ['message' => session('success'), 'messageType' => 'success'])
            @endif
            @if(session('error'))
                @include('components.alert_message', ['message' => session('error'), 'messageType' => 'error'])
            @endif
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

