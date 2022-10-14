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
                <div class="card-header">Timetables
                    @can('role-create')
                        <span class="float-right">
                        <a class="btn btn-primary" href="{{ route('timetables.create') }}">New timetable</a>
                    </span>
                    @endcan
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Week/Day</th>
                            <th>Name</th>
                            <th width="280px">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($data as $key => $timetable)
                            <tr>
                                <td>{{ $timetable->id }}</td>
                                <td>{{ $timetable->week }}/{{ $timetable->day }}</td>
                                <td>{{ $timetable->subject }}</td>
                                <td>
                                    <a class="btn btn-success"
                                       href="{{ route('timetables.show',$timetable->id) }}">Show</a>
                                    @can('timetable-edit')
                                        <a class="btn btn-primary" href="{{ route('timetables.edit',$timetable->id) }}">Edit</a>
                                    @endcan
                                    @can('timetable-delete')
                                        {!! Form::open(['method' => 'DELETE','route' => ['timetables.destroy', $timetable->id],'style'=>'display:inline']) !!}
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
