@if(Session::has('success'))
    <div class="alert alert-success" id="alert-message">
        <button type="button" class="close" data-dismiss="alert">×</button>
        {{ Session::get('success') }}
    </div>
@endif