<h1>Listando videos da categoria: {{ $categories->title }}</h1>
<h4>Id da categoria: {{ $categories->id }}</h4>
<p> A categoria <strong>{{ $categories->title }}</strong> possui <strong>{{$categories->videos->count()}}</strong> vídeos cadastrados</p>
<hr>


<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Nome</th>
        <th scope="col">ID Cat</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
        @foreach ($categories->videos as $videos)
            <tr>
                <td>{{ $videos->id }}</td>
                <td>{{ $videos->title }}</td>
                <td>{{ $videos->categorie_id }}</td>
                <td><a href="{{ route('video.edit', $videos->id) }}">Editar video {{ $videos->id }}</a></td>
                <td><a href="{{ route('video.show', $videos->id) }}">Ver video {{ $videos->id }}</a></td>
            </tr>
        @endforeach
    </tbody>
  </table>

<a href="{{ route('categories.index') }}">Voltar para Categorias</a>



