<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Hooray!') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="h1">News we gathered:</h1>
                    @foreach ($content as $cont)
                        <div class="bg-lightgray overflow-hidden shadow-sm sm:rounded-lg" margin="1em">
                        <div class="p-6 bg-lightgray border-b border-gray-200">
                            <span class="h2">{{ $cont->title }}</span>
                            <p>{{ $cont->body }}</p>
                        </div>
                        </div>
                        <br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>