<x-app-layout>
    <x-slot name="header">
    </x-slot>

    @component('components.pages.head')
        @slot('imagebck') 
            
            @if(@isset($capaCategories->imageebg))
                {{ $capaCategories->imagebg }}
            @else
                default.png
            @endif

        @endslot    
        @slot('title') 
        
            Criando Vídeo
            
        @endslot
        @slot('actionform') 
            {{ route('video.search') }}
        @endslot
        @slot('edit') 
            #
        @endslot
        @slot('destroy') 
            #
        @endslot
    @endcomponent

    <div class="videos relative -top-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">   
                <div class="md:grid md:grid-cols-1 md:gap-6">                    
                    <div class="mt-5 md:mt-0 md:col-span-2">
                        @include('layouts.includes.errors.formerrors')
                        <form action="{{ route('video.update', $videos->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="shadow sm:rounded-md sm:overflow-hidden">
                                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                                    <div class="grid grid-cols-1 gap-6">
                                        <div class="col-span-3 sm:col-span-2">
                                            <label for="title" class="block text-sm font-medium text-gray-700"> Nome </label>
                                            <div class="mt-1 flex rounded-md shadow-sm">
                                            <input type="text" name="title" id="title" value="{{ $videos->title }}" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="As tranças do rei careca">
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <label for="categorie_id" class="block text-sm font-medium text-gray-700">Categorias</label>
                                        <div class="mt-1 relative rounded-md shadow-sm"> 
                                                <select id="categorie_id" name="categorie_id" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full  pr-12 sm:text-sm border-gray-300 rounded-md">
                                                @foreach ($categories as $categorie)
                                                    <option id="{{$categorie->id}}"  value="{{$categorie->id}}" {{ $categorie->id == $videos->categorie_id ? "selected" : "" }}>{{$categorie->title}}</option>
                                                @endforeach
                                                </select>
                                                <div class="absolute inset-y-0 right-0 flex items-center">
                                                
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div>
                                        <label for="description" class="block text-sm font-medium text-gray-700"> Descrição </label>
                                            <div class="mt-1">
                                                <textarea id="description" name="description" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" placeholder="Capriche na descrição do seu vídeo">{{ $videos->description }}</textarea>
                                            </div>        
                                    </div>

                                    <div class="grid grid-cols-1 gap-6">
                                        <div class="col-span-3 sm:col-span-2">
                                            <label for="url" class="block text-sm font-medium text-gray-700"> URL </label>
                                            <div class="mt-1 flex rounded-md shadow-sm">
                                            <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm"> https:// </span>
                                            <input type="text" name="url" id="url" value="{{ $videos->url }}" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="www.example.com">
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700"> Foto de Capa </label>
                                        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                            <div class="space-y-1 text-center">
                                                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                                <div class="flex text-sm text-gray-600">
                                                    <label for="imagecp" class="relative cursor-pointer bg-white rounded-md font-medium text-primary hover:text-darktransparent  focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                                   
                                                        <input id="imagecp" name="imagecp" value="{{ $videos->videocp}}" type="file" class="">
                                                    </label>
                                                </div>
                                                <p class="text-xs text-gray-500">PNG, JPG, GIF up to 1MB</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700"> Foto de Background </label>
                                        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                            <div class="space-y-1 text-center">
                                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                                <div class="flex text-sm text-gray-600">
                                                    <label for="imagebg" class="relative cursor-pointer bg-white rounded-md font-medium text-primary hover:text-darktransparent focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                                    
                                                        <input id="imagebg" name="imagebg" value="{{$videos->videobg}}" type="file" class="">
                                                    </label>
                                                </div>
                                                <p class="text-xs text-gray-500">PNG, JPG, GIF up to 1MB</p>
                                                
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="px-4 py-3 text-center sm:px-6">
                                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-primary hover:bg-darktransparent focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Salvar Vídeo</button>
                                </div>
                            </div>
                        </form>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>