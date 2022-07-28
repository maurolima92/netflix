@if ($errors->any())
    <div class="error px-4 py-5 bg-red-500 text-white">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif