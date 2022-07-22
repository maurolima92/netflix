<h1>Detalhes da Categoria: {{ $categories->title }}</h1>
<ul>
    <li><strong>ID:</strong>{{ $categories->id }}</li>
    <li><strong>Título:</strong>{{ $categories->title }}</li>
    <li><strong>Cor:</strong>{{ $categories->color }}</li>
    <li><strong>Vídeos Cadastrados:</strong>{{$categories->videos->count()}}</li>
    
</ul>
<a href="{{ route('categories.edit', $categories->id) }}">Editar</a></p>
<a href="{{ route('categories.listVideos', $categories->id) }}">Vídeos da Categoria</a></p>  
<form action=" {{ route('categories.destroy',$categories->id) }} " method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="_method" value="DELETE">
    <button type="submit">Deletar a categoria <strong>{{ $categories->title }}</strong>?</button>
</form>
<hr>


<a href="{{ route('categories.index') }}">Voltar para Categorias</a>