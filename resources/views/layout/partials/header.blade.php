<div class="container">
    @if ($errors->any())
        <div class="row">
            <div class="col-sm-12">
                @foreach ($errors->all() as $error)
                    @include('components.alert_message', ['message' => $error, 'messageType' => 'danger'])
                @endforeach
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col-sm-12">
            @if(session('success'))
                @include('components.alert_message', ['message' => session('success'), 'messageType' => 'success'])
            @endif
            @if(session('error'))
                @include('components.alert_message', ['message' => session('error'), 'messageType' => 'error'])
            @endif
        </div>
    </div>
</div>

