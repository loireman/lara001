<?php

namespace App\Http\Controllers;

use App\Models\Tovary;
use Illuminate\Http\Request;

class TovaryController extends Controller
{
    /**
     * create a new instance of the class
     *
     * @return void
     */
    function __construct()
    {
         $this->middleware('permission:tovary-list|tovary-create|tovary-edit|tovary-delete', ['only' => ['index', 'show']]);
         $this->middleware('permission:tovary-create', ['only' => ['create', 'store']]);
         $this->middleware('permission:tovary-edit', ['only' => ['edit', 'update']]);
         $this->middleware('permission:tovary-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Tovary::latest()->paginate(5);

        return view('tovary.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tovary.create');
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
            'name' => 'required',
            'body' => 'required',
            'property1' => 'required|integer|min:0|max:1024',
            'property2' => 'required|integer|min:0|max:128',
            'price' => 'required|numeric|between:0,9999.99'
        ]);
        $input = $request->except(['_token']);

        Tovary::create($input);

        return redirect()->route('tovary.index')
            ->with('success','Товар успішно додано.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tovary = Tovary::find($id);

        return view('tovary.show', compact('tovary'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tovary = Tovary::find($id);

        return view('tovary.edit',compact('tovary'));
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
            'name' => 'required',
            'body' => 'required',
            'property1' => 'required|integer|min:0|max:1024',
            'property2' => 'required|integer|min:0|max:128',
            'price' => 'required|numeric|between:0,9999.99'
        ]);

        $tovary = Tovary::find($id);

        $tovary->update($request->all());

        return redirect()->route('tovary.index')
            ->with('success', 'Товар успішно оновлено.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tovary::find($id)->delete();

        return redirect()->route('tovary.index')
            ->with('success', 'Товар успішно видалено.');
    }
}
