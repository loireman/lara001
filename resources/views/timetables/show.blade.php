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
            <div class="card-header">Timetable
                @can('role-create')
                    <span class="float-right">
                        <a class="btn btn-primary" href="{{ route('timetables.index') }}">Back</a>
                    </span>
                @endcan
            </div>
            <div class="card-body">
                <div class="lead">
                    <strong>Week:</strong>
                    {{ $timetable->week }}
                </div>
                <div class="lead">
                    <strong>Day and id:</strong>
                    {{ $timetable->day }} - {{ $timetable->number }}
                </div>
                <div class="lead">
                    <strong>Subject:</strong>
                    {{ $timetable->subject }}
                </div>
                <div class="lead">
                    <strong>Type:</strong>
                    {{ $timetable->subject_type }}
                </div>
                <div class="lead">
                    <strong>Start:</strong>
                    {{ $timetable->sub_starts }}
                </div>
                <div class="lead">
                    <strong>End:</strong>
                    {{ $timetable->sub_ends }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
