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
                <h2 class="text-center my-5 ">Про нас</h2> 
                <div class="row gy-5" id="t1"> 
                    <div class="col-md-4 text-center"> 
                        <h4>Володимир</h4> 
                        <img class="d-block rounded h-75 mx-auto shadow" src="{{ asset('img/person_1.jpg') }}" alt="#" /> 
                        <p>Знавець JS,HTML,CSS</p> 
                    </div> 
                    <div class="col-md-4 text-center"> 
                        <h4>Андрій</h4> 
                        <img class="d-block rounded h-75 mx-auto shadow" src="{{ asset('img/person_2.jpg') }}" alt="#" /> 
                        <p>Знавець Golang,C,C++,MySql</p> 
                    </div> 
                    <div class="col-md-4 text-center"> 
                        <h4>Єгор</h4> 
                        <img class="d-block rounded h-75 mx-auto shadow" src="{{ asset('img/person_3.jpg') }}" alt="#" /> 
                        <p>Знавець JS,HTML,CSS</p> 
                    </div> 
                    </div> 
                </div>
            </div>
        </div>
    </div>    
</div>
</x-app-layout>