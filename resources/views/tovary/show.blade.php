@extends('panel')
@section('content')
<div class="container">
    <div class="justify-content-center">
        @if (\Session::has('success'))
            <div class="alert alert-success">
                <p>{{ \Session::get('success') }}</p>
            </div>
        @endif
        <div class="card">
            <div class="card-header">Товар
                @can('tovary-create')
                    <span class="float-right">
                        <a class="btn btn-primary" href="{{ route('tovary.index') }}">Повернутись до списку</a>
                    </span>
                @endcan
            </div>
            <div class="card-body">
                <div class="lead">
                    <strong>Посилання:</strong>
                    {{ $tovary->slug }}
                </div>
                <div class="lead">
                    <strong>Назва:</strong>
                    {{ $tovary->name }}
                </div>
                <div class="lead">
                    <strong>Значення 1:</strong>
                    {{ $tovary->property1 }}
                </div>
                <div class="lead">
                    <strong>Значення 2:</strong>
                    {{ $tovary->property2 }}
                </div>
                <div class="lead">
                    <strong>Ціна:</strong>
                    {{ $tovary->price }}
                </div>
                <div class="lead">
                    <strong>Опис:</strong>
                    {{ $tovary->body }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
