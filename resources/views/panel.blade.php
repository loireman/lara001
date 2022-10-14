<x-app-layout>
    <div class="py-12 px-40">
            <div class="container">
            @include('layouts.panel-nav')
            </div>
            @yield('content')
        </div>
    </div>
</x-app-layout>
