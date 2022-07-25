<h1>Listagem de vídeos</h1>
<button><a href="{{ route('categories.index')}}">Listar Categorias</a></button>
<button><a href="{{ route('video.index')}}">Listar Vídeos</a></button>
<hr>
    <div>
    <form action="{{ route('logout') }}" method="post">
        @csrf
        <button>SAIR</button>
    </form>
    </div>
<a href="{{ route('video.create') }}">Criar novo Vídeo</a>
@include('layouts.includes.alerts.alerts')
<hr>
<form action="{{ route('video.search') }}" method="post">
    @csrf
    <input type="text" name="search" placeholder="Pesquisar:">
    <button type="submit">Pesquisar</button>
</form>
<hr>
@foreach ($videos as $video)
    <div>
        <img src='{{ url("storage/{$video->imagecp}") }}' alt="{{  $video->title }}" style="max-width: 200px">
    <p>{{ $video->title }} - 
        <a href="{{ route('video.show', $video->id) }}">Mais detalhes</a>
        <a href="{{ route('video.edit', $video->id) }}">Editar</a>
    </p>
    </div>

        
@endforeach

<hr>

@if (isset($filters))
    {{ $videos->appends($filters)->links()}}
@else
    {{ $videos->links()}}
@endif
