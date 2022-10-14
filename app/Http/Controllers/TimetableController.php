<?php

namespace App\Http\Controllers;

use App\Models\Timetable;
use Illuminate\Http\Request;

class TimetableController extends Controller
{
    /**
     * create a new instance of the class
     *
     * @return void
     */
    function __construct()
    {
        $this->middleware('permission:timetable-list|timetable-create|timetable-edit|timetable-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:timetable-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:timetable-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:timetable-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Timetable::latest()->paginate(5);

        return view('timetables.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('timetables.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'day' => 'required',
            'number' => 'required',
            'subject' => 'required',
            'subject_type' => 'required',
            'sub_starts' => 'required',
            'sub_ends' => 'required',
        ]);
        $input = $request->except(['_token']);

        Timetable::create($input);

        return redirect()->route('timetables.index')
            ->with('success','Timetable created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $timetable = Timetable::find($id);

        return view('timetables.show', compact('timetable'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $timetable = Timetable::find($id);

        return view('timetables.edit',compact('timetable'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'day' => 'required',
            'number' => 'required',
            'subject' => 'required',
            'subject_type' => 'required',
            'sub_starts' => 'required',
            'sub_ends' => 'required',
        ]);

        $timetable = Timetable::find($id);

        $timetable->update($request->all());

        return redirect()->route('timetables.edit', compact('timetable'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Timetable::find($id)->delete();

        return redirect()->route('timetables.index')
            ->with('success', 'Timetable deleted successfully.');
    }
}
