<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateVideo;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index(){

        $videos = Video::orderBy('id','DESC')->paginate(5);
        return view('videos.index', compact('videos'));
    }

    public function create(){
        return view('videos.create');
    }

    public function store(StoreUpdateVideo $request){
        $videos = Video::create($request->all());
        return redirect()
                ->route('video.index')
                ->with('message','Vídeo criado com Sucesso!');
    }

    public function show($id){
        if(!$videos = Video::find($id)){
            return redirect()->route('video.index');
        }
        
        return view('videos.show', compact('videos'));
    }
    public function destroy($id){
        if(!$videos = Video::find($id)){
            return redirect()->route('video.index');
        }
        $videos -> delete();
        return redirect()
                ->route('video.index')
                ->with('message','Vídeo Deletado com Sucesso!');
    }
    public function edit($id){
        if(!$videos = Video::find($id)){
            return redirect()->back();
        }
        
        return view('videos.edit', compact('videos'));
    }  
    public function update(StoreUpdateVideo $request , $id){
        if(!$videos = Video::find($id)){
            return redirect()->back();
        }
        $videos->update($request->all());
        return redirect()
                ->route('video.index')
                ->with('message','Vídeo editado com Sucesso!');
    }
    public function search(Request $request){

        $filters = $request->except('_token'); 
        //Para não perder as informações da pesquisa quando realizar a paginação na hora da pesquisa
        //pegando todas as informações do formulário EXETO o _token

        $videos = Video::where('title', 'LIKE', "%{$request->search}%")
                        ->orWhere('description', 'LIKE', "%{$request->search}%")
                        ->paginate(5);
        
        return view('videos.index', compact('videos','filters'));
    }
}
