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
            <div class="card-header">Edit timetable
                <span class="float-right">
                    <a class="btn btn-primary" href="{{ route('timetables.index') }}">Timetables</a>
                </span>
            </div>
            <div>
                <div class="card-body" style="width: 30%; float:left">
                    {!! Form::model($timetable, ['route' => ['timetables.update', $timetable->id], 'method'=>'PATCH']) !!}
                    <div class="form-group">
                        <strong>Week:
                            <span class="pl-2"> 1 </span>
                            {!! Form::radio('week', 'first', true) !!}
                            <span class="pl-2"> 2 </span>
                            {!! Form::radio('week', 'second', true) !!}
                        </strong>
                    </div>
                    <div class="form-group">
                        <strong>Day:</strong>
                        <select name="day" class="m-2 rounded-5 h-9 w-36 text-sm">
                            <option value="Monday">Monday</option>
                            <option value="Tuesday">Tuesday</option>
                            <option value="Wednesday">Wednesday</option>
                            <option value="Thursday">Thursday</option>
                            <option value="Friday">Friday</option>
                            <option value="Saturday">Saturday</option>
                        </select>
                        <strong>Class:</strong>
                        <select name="number" class="m-2 rounded-5 h-9 w-28 text-sm">
                                <option value="1">First</option>
                                <option value="2">Second</option>
                                <option value="3">Third</option>
                                <option value="4">Fourth</option>
                                <option value="5">Fifth</option>
                                <option value="6">Sixth</option>
                            </default>
                        </select>
                    </div>
                    <div class="form-group">
                        <strong>Subject:</strong>
                        {!! Form::text('subject', null, array('placeholder' => 'Name of subject','class' => 'm-2 form-control rounded-5 h-9 w-64')) !!}
                    </div>
                    <div class="form-group">
                        <strong>Subject type:</strong>
                        <select name="subject_type" class="m-2 rounded-5 h-9 w-44 text-sm">
                            <option value="lecture">Lecture</option>
                            <option value="practice">Practice</option>
                            <option value="laboratory">Laboratory work</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <strong>When starts:</strong>
                        {!! Form::time('sub_starts', '08:00', array('class' => 'mb-2 ml-2 text-sm form-control rounded-5 h-9 w-32')); !!}
                    </div>
                    <div class="form-group">
                        <strong>When ends:</strong>
                        {!! Form::time('sub_ends', '09:40', array('class' => 'mb-2 ml-2 text-sm form-control rounded-5 h-9 w-32')); !!}
                    </div>
                        <button type="submit" class="btn bg-blue-600 btn-primary">Update</button>
                    {!! Form::close() !!}
                </div>
                <div class="card-body" style="width: 40%; float:left">
                    <strong class="text-xl">Primal Data:</strong><br/>
                    <strong>week:</strong> {{ $timetable->week }}<br/>
                    <strong>day:</strong> {{ $timetable->day }} - {{ $timetable->number }} class<br/>
                    <strong>sbj:</strong> {{ $timetable->subject }}<br/>
                    <strong>type:</strong> {{ $timetable->subject_type }} <br/>
                    <strong>from:</strong> {{ $timetable->sub_starts }} to {{ $timetable->sub_ends }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
