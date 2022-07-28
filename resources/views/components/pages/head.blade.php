<div class="py-12 categorie-details pb-60 pt-50" 
        style="background:linear-gradient(0deg,rgba(0,0,0,.8) 0,transparent 60%,rgba(0,0,0,.8)),url('/storage/{{ $imagebck }}');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: center;
        background-size: cover;">

        <h1 class="text-white text-9xl text-center mb-10 w-full px-10">{{ $title }}</h1>
        <div class="search flex justify-center ">
            <form action="{{ $actionform }}" method="post">
                @csrf
                <input type="text" name="search" placeholder="Pesquisar:" class="w-80 py-3 border-0 text-white hover:border-r-indigo-200 bg-darktransparent">
                <button type="submit" class="bg-primary hover:bg-darktransparent px-5 py-3 text-white w-34 transition duration-700 ease-in-out">Pesquisar</button>
            </form>
        </div>

        <div class="info-category w-full flex justify-center">
            <a href="{{ $edit }}" class="text-white px-3 py-3 transition duration-700 ease-in-out hover:text-primary">Editar</a>
            <form action=" {{ $destroy }} " method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="text-white px-3 py-3 hover:text-primary transition duration-700 ease-in-out">Excluir</button>
            </form>
        </div>
</div>