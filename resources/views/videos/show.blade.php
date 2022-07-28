<x-app-layout>
    <x-slot name="header">
    @include('layouts.includes.alerts.alerts')
    </x-slot>
    @component('components.pages.head')
        @slot('imagebck') 
        
            @if(@isset($videos->imagebg))
                {{ $videos->imagebg }}
            @else
                default.png
            @endif

        @endslot    
        @slot('title') 
            {{ $videos->title }}
        @endslot
        @slot('actionform') 
            {{ route('video.search') }}
        @endslot
        @slot('edit') 
        {{ route('video.edit', $videos->id) }}
        @endslot
        @slot('destroy') 
            {{ route('video.destroy',$videos->id) }}
        @endslot
    @endcomponent


    <div class="videos relative -top-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-transparent overflow-hidden shadow-sm sm:rounded-lg">
            <div class="max-w-2xl mx-auto py-16 px-4 pt-0 sm:px-6 lg:max-w-7xl lg:px-8">
                    <div class=" flex content-end items-center">
                        
                            <a href="{{ route('video.show', $videos->id) }}" class="  group transition delay-150 duration-300 ease-in-out hover:scale-125">
                                <div class="w-full aspect-w-1 aspect-h-1 bg-gray-200 rounded-lg overflow-hidden xl:aspect-w-7 xl:aspect-h-8 ">
                                <img src='{{ url("storage/{$videos->imagecp}") }}' alt="{{  $videos->title }}" class="w-96 transition delay-150 duration-300 ease-in-out hover:scale-125">
                                </div>
                            </a>
                            <div class="description w-full  pl-12">
                                <h2 class="text-5xl mb-5 font-bold">{{  $videos->title }}</h2>
                                <p class="mb-5">{{  $videos->description }}</p>
                                <button class="animate-pulse flex space-x-4  bg-primary hover:bg-darktransparent px-5 py-3 text-white w-34 transition duration-700 ease-in-out">Dê um play</button>
                            </div>
                        </div>                           
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>