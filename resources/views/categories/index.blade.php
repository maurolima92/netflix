<h1>Listagem de Categorias</h1>
<button><a href="{{ route('categories.index')}}">Listar Categorias</a></button>
<button><a href="{{ route('video.index')}}">Listar Vídeos</a></button>

<hr>
<a href="{{ route('categories.create') }}">Criar nova Categoria</a>

@include('layouts.includes.alerts.alerts')

<hr>
<form action="{{ route('categories.search') }}" method="post">
    @csrf
    <input type="text" name="search" placeholder="Pesquisar:">
    <button type="submit">Pesquisar</button>
</form>
<hr>
@foreach ($categories as $categorie)
    @component('layouts.components.cards')
    
        @slot('titleCategorie')
            <p>{{  $categorie->id }} | {{  $categorie->title }}</p> 
        @endslot
    
    <a href="{{ route('categories.show', $categorie->id) }}">Mais detalhes</a>   
    <a href="{{ route('categories.listVideos', $categorie->id) }}">Vídeos da Categoria</a> 
    @endcomponent
    

@endforeach

<hr>
@if (isset($filters))
    {{ $categories->appends($filters)->links()}}
@else
    {{ $categories->links()}}
@endif
