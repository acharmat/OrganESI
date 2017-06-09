@if(Session::has('message'))
    <div class="row">
        <div class="col-xs-8 col-lg-offset-2" style="margin-top: 20px ; margin-bottom: 10px">
            <div class="alert alert-success alert-dismissible" id="message">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                {{ Session::get('message') }}
            </div>
        </div>
    </div>

@endif

