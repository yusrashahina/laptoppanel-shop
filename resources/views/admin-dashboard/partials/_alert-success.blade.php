@if(session('success'))
    <div class="alert alert-success alert-fill alert-dismissible">
        {{session('success')}}
        <button class="close" data-bs-dismiss="alert"></button>
    </div>
@endif
