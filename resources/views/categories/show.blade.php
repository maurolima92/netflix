
<x-app-layout>
    <x-slot name="header">
        @include('layouts.includes.alerts.alerts')
    </x-slot>
    
    @component('components.pages.head')
        @slot('imagebck') 

        @if(@isset($categories->image))
                {{ $categories->image }}
            @else
                default.png
            @endif

        @endslot    
        @slot('title') 
            {{ $categories->title }}
        @endslot
        @slot('actionform') 
            {{ route('categories.search') }}
        @endslot
        @slot('edit') 
        {{ route('categories.edit', $categories->id) }}
        @endslot
        @slot('destroy') 
            {{ route('categories.destroy',$categories->id) }}
        @endslot
    @endcomponent
    
    
    <div class="videos relative -top-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-transparent overflow-hidden shadow-sm sm:rounded-lg">
            <div class="max-w-2xl mx-auto py-16 px-4 pt-0 sm:px-6 lg:max-w-7xl lg:px-8">
                        <div class="grid grid-cols-1 gap-y-10 sm:grid-cols-2 gap-x-6 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
                        @foreach ($categories->videos as $videos)
                            <div class="item ">
                                <a href="{{ route('video.show', $videos->id) }}" class="group transition delay-150 duration-300 ease-in-out hover:scale-125">
                                    <div class="w-full aspect-w-1 aspect-h-1 bg-gray-200 rounded-lg overflow-hidden xl:aspect-w-7 xl:aspect-h-8 ">
                                    <img src='{{ url("storage/{$videos->imagecp}") }}' alt="{{  $videos->title }}" class="transition delay-150 duration-300 ease-in-out hover:scale-125">
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

