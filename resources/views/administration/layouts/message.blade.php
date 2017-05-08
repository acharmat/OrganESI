@if(Session::has('message'))
    <div class="alert-note" id="message">
    {{ Session::get('message') }}
    </div>
@endif