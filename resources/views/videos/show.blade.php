<h1>Detalhes do Vídeo: {{ $videos->title }}</h1>
<ul>
    <li><strong>Título:</strong>{{ $videos->title }}</li>
    <li><strong>Descrição:</strong>{{ $videos->description }}</li>
    <li><strong>URL:</strong>{{ $videos->url }}</li>
</ul>
<a href="{{ route('video.edit', $videos->id) }}">Editar</a></p> 
<form action=" {{ route('video.destroy',$videos->id) }} " method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="_method" value="DELETE">
    <button type="submit">Deletar o vídeo <strong>{{ $videos->title }}</strong>?</button>
</form>
<hr>


<a href="{{ route('video.index') }}">Página Inicial</a>