<h1>Editando a categoria: <strong>{{ $categories->title }}</strong></h1>
@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('categories.update', $categories->id) }}" method="post" >
    @method('put')
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="text" name="title" id="title" placeholder="Título" value="{{ $categories->title }}">
    <input type="text" name="color" id="color" placeholder="Cor #" value="{{ $categories->color }}">
    <button type="submit">Salvar Categoria</button>
</form>