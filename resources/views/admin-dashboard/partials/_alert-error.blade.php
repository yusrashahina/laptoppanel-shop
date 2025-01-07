@if (session('error') || $errors->any())
    <div class="alert alert-danger alert-fill alert-dismissible">
        @if (session('error'))
            {{ session('error') }}
        @endif

        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <button class="close" data-bs-dismiss="alert"></button>
    </div>
@endif
