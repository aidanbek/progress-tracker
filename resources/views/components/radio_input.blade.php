<input type="radio"
       id="{{$id}}"
       name="{{$name}}"
       class="custom-control-input"
       @if(isset($checked)) checked @endif
       value="{{$value ?? ''}}">
<label class="custom-control-label" for="{{$id}}">{{$title}}</label>
