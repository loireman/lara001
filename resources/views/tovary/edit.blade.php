@extends('panel')
@section('content')
<div class="container">
    <div class="justify-content-center">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Opps!</strong> Something went wrong, please check below errors.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card">
            <div class="card-header">Редагувати товар
                <span class="float-right">
                    <a class="btn btn-primary" href="{{ route('tovary.index') }}">Товари</a>
                </span>
            </div>
            <div class="card-body">
                {!! Form::model($tovary, ['route' => ['tovary.update', $tovary->id], 'method'=>'PATCH']) !!}
                    <div class="form-group">
                        <strong>Посилання:</strong>
                        {!! Form::text('slug', null, array('placeholder' => 'Slug','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group">
                        <strong>Назва:</strong>
                        {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group">
                        <strong>Значення 1:</strong>
                        {!! Form::number('property1', null, array('placeholder' => 'Property1','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group">
                        <strong>Значення 2:</strong>
                        {!! Form::number('property2', null, array('placeholder' => 'Property2','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group">
                        <strong>Ціна:</strong>
                        {{ Form::number('price', null, ['placeholder' => 'Price', 'class' => 'form-control', 'step' => 'any']) }}
                    </div>
                    <div class="form-group">
                        <strong>Опис:</strong>
                        {!! Form::textarea('body', null, array('placeholder' => 'Body','class' => 'form-control')) !!}
                    </div>
                    <button type="submit" class="btn btn-primary">Редагувати товар</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
