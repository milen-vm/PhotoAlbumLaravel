@if (\Illuminate\Support\Facades\Session::has('flash_info'))
    <div class="alert alert-info">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times</button>
        {{ \Illuminate\Support\Facades\Session::get('flash_info') }}
    </div>
@endif