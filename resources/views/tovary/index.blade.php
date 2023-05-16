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
            <div class="card-header">Товари
                @can('role-create')
                    <span class="float-right">
                        <a class="btn btn-primary" href="{{ route('tovary.create') }}">Створити новий товар</a>
                    </span>
                @endcan
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Ім'я</th>
                            <th>Ціна</th>
                            <th width="280px">Дії</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $tovary)
                            <tr>
                                <td>{{ $tovary->id }}</td>
                                <td>{{ $tovary->name }}</td>
                                <td>{{ $tovary->price }}</td>
                                <td>
                                    <a class="btn btn-success" href="{{ route('tovary.show',$tovary->id) }}">Show</a>
                                    @can('tovary-edit')
                                        <a class="btn btn-primary" href="{{ route('tovary.edit',$tovary->id) }}">Edit</a>
                                    @endcan
                                    @can('tovary-delete')
                                        {!! Form::open(['method' => 'DELETE','route' => ['tovary.destroy', $tovary->id],'style'=>'display:inline']) !!}
                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                        {!! Form::close() !!}
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $data->appends($_GET)->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
