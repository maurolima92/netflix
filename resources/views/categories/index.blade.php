
<x-app-layout>
    <x-slot name="header">
        @include('layouts.includes.alerts.alerts')
    </x-slot>
    @component('components.pages.head')
        @slot('imagebck') 
            
            @if(@isset($capaCategories->imagebg))
                {{ $capaCategories->imagebg }}
            @else
                default.png
            @endif

        @endslot    
        @slot('title') 
            Categorias            
        @endslot
        @slot('actionform') 
            {{ route('categories.search') }}
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
            <div class="bg-transparent overflow-hidden shadow-sm sm:rounded-lg">
                <div class="max-w-2xl mx-auto py-16 px-4 pt-0 sm:px-6 lg:max-w-7xl lg:px-8">
                    <div class="grid grid-cols-1 gap-y-10 sm:grid-cols-2 gap-x-6 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
                        @foreach ($categories as $categorie)
                            <div class="item h-full ">
                                <a href="{{ route('categories.show', $categorie->id) }}" class="group transition delay-150 duration-300 ease-in-out hover:scale-125">
                                    <div class=" card h-full w-full relative flex justify-center items-center aspect-w-1 aspect-h-1 shadow-xl overflow-hidden xl:aspect-w-7 xl:aspect-h-8 " >
                                        <h3 class="text-white text-xl py- font-bold absolute w-full text-center transition delay-150 duration-300 ease-in-out hover:scale-125" >{{  $categorie->title }}</h3>
                                        <img src='{{ url("storage/{$categorie->image}") }}' alt="{{  $categorie->title }}" class="transition h-full  delay-150 duration-300 ease-in-out hover:scale-125" >
                                    </div>
                                </a>
                            </div>
                        @endforeach                            
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

