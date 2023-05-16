<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="h1">Список товарів:</h1>
                    @foreach ($content as $cont)

                        <div class="bg-lightgray overflow-hidden shadow-sm sm:rounded-lg" margin="1em">
                        <div class="p-6 bg-lightgray border-b border-gray-200">
                            <p class="text-right text-xs">{{ $cont->created_at }}</p>
                            <span class="pb-4 h2">{{ $cont->name }}</span>
                            <br/>
{{--                            <p>{{ $cont->body }}</p>--}}
                            <a href="tovars/{{ $cont->slug }}">
                                <button type="button" class="px-3 py-1.5 btn bg-dark text-white text-xs")>See more</button>
                            </a>
                        </div>
                        </div>
                        <br>
                    @endforeach
                    {{ $content->appends($_GET)->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
