<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateVideo;
use App\Models\Categorie;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
    

    public function index(){

      
        $capaVideo = Video::all()->random();

        $videos = Video::orderBy('id','DESC')->paginate(8);
        return view('videos.index', compact('videos','capaVideo'));
    }

    public function create(){
        $categories = Categorie::get();

        if(!$categories->count() > 0){
            return redirect()
                    ->route('categories.index')
                    ->with('message','Não existe nenhuma categoria criada para vincular com seu vídeo!
                    Crie uma nova categoria agora!');
        }
        return view('videos.create', compact('categories'));
    }

    public function store(StoreUpdateVideo $request){

        $videos = $request->all();
        
        $categories = Categorie::find($videos['categorie_id']);
        $nameCategories = Str::lower(str_replace(' ','-',$categories['title']));
        
        $videoTitle= Str::lower(str_replace(' ','-',$videos['title']));
        
        $extensioncp = $videos['imagecp']->getClientOriginalExtension();
        $extensionbg = $videos['imagebg']->getClientOriginalExtension();

        $videos['imagecp'] = $request->imagecp->storeAs($nameCategories.'/'.$videoTitle, 'capa-'.$videoTitle.'-' . now() . ".{$extensioncp}");
        $videos['imagebg'] = $request->imagebg->storeAs($nameCategories.'/'.$videoTitle, 'background-'.$videoTitle.'-' . now() . ".{$extensionbg}");
        

        $videos = Video::create($videos);
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

        //pegando a categoria do video
        $categories = Categorie::find($videos['categorie_id']);
        
        //colocando em minisculo o nome do video e o nome da categoria para o path de exclusão
        $nameCategories = Str::lower(str_replace(' ','-',$categories['title']));
        $videoTitle= Str::lower(str_replace(' ','-',$videos['title']));
        
        // Excluindo o diretorio do vídeo
        Storage::deleteDirectory($nameCategories.'/'.$videoTitle);

        $videos -> delete();
        return redirect()
                ->route('video.index')
                ->with('message','Vídeo Deletado com Sucesso!');
    }
    public function edit($id){

        $categories = Categorie::get();
        if(!$videos = Video::find($id)){
            return redirect()->back();
        }
        
        return view('videos.edit', compact('videos','categories'));
    }  
    public function update(StoreUpdateVideo $request , $id){
        if(!$videos = Video::find($id)){
            return redirect()->back();
        }
        $videos->update($request->all());
        return redirect()
                ->route('video.show',$videos->id)
                ->with('message','Vídeo editado com Sucesso!');
    }
    public function search(Request $request){

        $filters = $request->except('_token'); 
        //Para não perder as informações da pesquisa quando realizar a paginação na hora da pesquisa
        //pegando todas as informações do formulário EXETO o _token

       

        $videos = Video::where('title', 'LIKE', "%{$request->search}%")
                        ->paginate(1);
        
                     
        return view('videos.index', compact('videos','filters'));
    }
}
