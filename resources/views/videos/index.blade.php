<h1>Listagem de vídeos</h1>
<button><a href="{{ route('categories.index')}}">Listar Categorias</a></button>
<button><a href="{{ route('video.index')}}">Listar Vídeos</a></button>
<hr>
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
    <p>{{  $video->title }} - 
        <a href="{{ route('video.show', $video->id) }}">Mais detalhes</a>
        <a href="{{ route('video.edit', $video->id) }}">Editar</a>
    </p>
        
@endforeach

<hr>

@if (isset($filters))
    {{ $videos->appends($filters)->links()}}
@else
    {{ $videos->links()}}
@endif
