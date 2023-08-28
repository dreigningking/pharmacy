<div class="alert alert-{{session('flash_type')}} alert-dismissible fade show" role="alert">
    <strong> @if(session('flash_type') == 'danger' ) Error! @else Success! @endif</strong> {{session('flash_message')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>