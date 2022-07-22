@extends('layouts.app.app')

@section('titlePage','Cadastro de Vídeo')

@section('content')
    <h1>Cadastrando um novo vídeo!</h1>
    <button><a href="{{ route('video.index')}}">Listar Vídeos</a></button>
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif


    <form action="{{ route('video.store') }}" method="post" >
        @csrf
        <input type="text" name="title" id="title" placeholder="Título" value="{{ old('title') }}">
        <textarea name="description" id="description" cols="30" rows="10" >{{ old('description') }}</textarea>
        <input type="text" name="url" id="url" placeholder="URl" value="{{old('url')}}">

        <select name="categorie_id">
            @foreach ($categories as $categorie)
                <option id="{{$categorie->id}}"  value="{{$categorie->id}}">{{$categorie->title}} - {{$categorie->id}}</option>
            @endforeach
        </select>

        <button type="submit">Salvar Vídeo</button>
    </form>
@endsection

