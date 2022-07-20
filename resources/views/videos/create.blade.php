<h1>Cadastrando um novo vídeo!</h1>
@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('video.store') }}" method="post" >
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="text" name="title" id="title" placeholder="Título" value="{{ old('title') }}">
    <textarea name="description" id="description" cols="30" rows="10" >{{ old('description') }}</textarea>
    <input type="text" name="url" id="url" placeholder="URl" value="{{old('url')}}">
    <button type="submit">Salvar Vídeo</button>
</form>