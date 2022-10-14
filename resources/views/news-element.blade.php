<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg"  >
                <div class="p-10 border-b border-gray-200" style = "
                /*padding-bottom: 1000px;*/
                /*background-image: url(https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ftse1.mm.bing.net%2Fth%3Fid%3DOIP.4bY9kDs96OX-5CI4T1cOWQHaEo%26pid%3DApi&f=1&ipt=c9b3a8bd943fd44ae6ca23c4da2a5b2fdb669e18b556a3c99db6b9ec0e1d1764&ipo=images);*/
                background-color: #6e6e6e;
                background-repeat: no-repeat;
                background-size: 100% 100%;
                ">
                @if ($content != [])
                @foreach($content as $item)
                    <h4 class="p-10 font-semibold text-xl text-white leading-tight" >
                    {{ $item->title }}
                    </h4><br/>
                    <p class="p-10 font-semibold text-s text-white leading-tight" >
                    {{ $item->body }}
                    </p>
                @endforeach
                @else
                    <p class="p-10 font-semibold text-xl text-white leading-tight" >
                    We found no Content with this link
                    </p>
                @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
