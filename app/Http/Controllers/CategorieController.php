<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateCategorie;
use App\Models\Categorie;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Stmt\Else_;


class CategorieController extends Controller
{   
    

    public function index(){
        
        if(!$categories = Categorie::get()){
            return redirect()->route('categories.create');
        }
        
        $capaCategories = Video::all()->random();
        

        $categories = Categorie::orderBy('id','DESC')->paginate(5);
        return view('categories.index', compact('categories','capaCategories'));
    }

    public function create(){
        
        return view('categories.create');
    }

    public function store(StoreUpdateCategorie $request){
        $categories = $request->all();        
    
        //Tirando o espaço do titlulo e deixando minusculo
        $categoriesTitle= Str::lower(str_replace(' ','-',$categories['title'])); 

        //Removendo caracters espeiciais funcao no model
        $categoriesTitle = Categorie::removeSpecialChar($categoriesTitle);
        
        // Pegando a extensão do imagem
        $extensionCategories = $categories['image']->getClientOriginalExtension();


        // Criando diretorio igual o title e salvando a imagem
        $categories['image'] = $request->image->storeAs($categoriesTitle, 'capa-'.$categoriesTitle.'-' . now() . ".{$extensionCategories}");
        

        $categories = Categorie::create($categories);
        return redirect()
                ->route('categories.index')
                ->with('message','categoria criado com Sucesso!');
    }

    public function listVideos($id){
        $categories = Categorie::find($id);

        return view('categories.listvideos' , compact('categories'));
    }
    
    public function show($id){
        if(!$categories = Categorie::find($id)){
            return redirect()->route('categories.index');
        }
        $capaCategories = Video::all()->random();
        
        return view('categories.show', compact('categories','capaCategories'));
    }

    public function destroy($id){
        if(!$categories = Categorie::find($id)){
            return redirect()
                ->route('categories.index')
                ->with('message','A categoria não existe!');
        }
        else{
            if($categories->videos->count() > 0){
                return redirect()
                ->route('categories.index')
                ->with('message','A categoria não pode ser deletada, pois existe vídeos vinculados a categoria!');
            }
            else{
                $nameCategories = Str::lower(str_replace(' ','-',$categories['title']));

                //Removendo caracters espeiciais funcao no model
                $categoriesTitle = Categorie::removeSpecialChar($nameCategories);
                Storage::deleteDirectory($nameCategories);

                $categories -> delete();
                return redirect()
                    ->route('categories.index')
                    ->with('message','Categoria Deletado com Sucesso!');
            }
        }        
    }

    public function edit($id){
        if(!$categories = Categorie::find($id)){
            return redirect()->back();
        }
        
        return view('categories.edit', compact('categories'));
    }  

    public function update(StoreUpdateCategorie $request , $id){
        
        if(!$categories = Categorie::find($id)){
            return redirect()->back();
        }       
        
        $categories->update($request->all());
        return redirect()
                ->route('categories.show',$categories->id)
                ->with('message','categoria editado com Sucesso!');
    }

    public function search(Request $request){

        $filters = $request->except('_token'); 
        //Para não perder as informações da pesquisa quando realizar a paginação na hora da pesquisa
        //pegando todas as informações do formulário EXETO o _token

        $categories = Categorie::where('title', 'LIKE', "%{$request->search}%")
                        ->paginate(5);
        
        return view('categories.index', compact('categories','filters'));
    }

    
}
