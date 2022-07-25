<h1>Editando o vídeo <strong>{{ $videos->title }}</strong></h1>
<button><a href="{{ route('video.index')}}">Listar Vídeos</a></button>
@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('video.update', $videos->id) }}" method="post" enctype="multipart/form-data">
    @method('put')
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="text" name="title" id="title" placeholder="Título" value="{{ $videos->title }}">
    <textarea name="description" id="description" cols="30" rows="10" >{{ $videos->description }}</textarea>
    <input type="text" name="url" id="url" placeholder="URl" value="{{ $videos->url }}">
    <input type="file" name="videocp" id="videocp" value="{{ $videos->videocp}}">
    <input type="file" name="videobg" id="videobg" value="{{$videos->videobg}}">
    <select name="categorie_id">
        @foreach ($categories as $categorie)
            <option  id="{{$categorie->id}}" value="{{$categorie->id}}" {{ $categorie->id == $videos->categorie_id ? "selected" : "" }} >{{$categorie->title}} - {{$categorie->id}}</option>
        @endforeach
      </select>
    <button type="submit">Salvar Vídeo</button>
</form>