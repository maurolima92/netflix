<h1>Editando o vídeo <strong>{{ $videos->title }}</strong></h1>
@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('video.update', $videos->id) }}" method="post" >
    @method('put')
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="text" name="title" id="title" placeholder="Título" value="{{ $videos->title }}">
    <textarea name="description" id="description" cols="30" rows="10" >{{ $videos->description }}</textarea>
    <input type="text" name="url" id="url" placeholder="URl" value="{{ $videos->url }}">
    <button type="submit">Salvar Vídeo</button>
</form>