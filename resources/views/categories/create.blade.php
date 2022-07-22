<h1>Cadastrando uma nova categoria</h1>
@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('categories.store') }}" method="post" >
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="text" name="title" id="title" placeholder="Título" value="{{ old('title') }}">
    <input type="text" name="color" id="color" placeholder="Cor #" value="{{ old('color') }}">
    <button type="submit">Salvar Categoria</button>
</form>

<hr>
<a href="{{ route('categories.index') }}">Voltar para Categorias</a>