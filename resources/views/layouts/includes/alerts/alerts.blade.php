
    @if (session('message'))
        <div class="alert px-4 py-5 bg-blue-500 shadow-sm sm:rounded-lg text-white">
            {{ session('message') }}
        </div> 
    @endif
