<?php

namespace App\Http\Controllers;

use App\Models\Prof;
use Illuminate\Http\Request;

class ProfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $profs = Prof::latest()->paginate(5);
      
        return view('profs.index',compact('profs'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("profs.create");
}


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
        ]);
      
        Prof::create($request->all());
       
        return redirect()->route('profs.index')
                        ->with('success','prof created successfully.');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Prof  $prof
     * @return \Illuminate\Http\Response
     */
    public function show(Prof $prof)
    {
        //
        return view('profs.show',compact('prof'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Prof  $prof
     * @return \Illuminate\Http\Response
     */
    public function edit(Prof $prof)
    {
        return view('profs.edit',compact('prof'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Prof  $prof
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prof $prof)
    {
        //
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
        ]);
      
        $prof->update($request->all());
      
        return redirect()->route('profs.index')
                        ->with('success','prof updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prof  $prof
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prof $prof)
    {
        //
        $prof->delete();
       
        return redirect()->route('profs.index')
                        ->with('success','prof deleted successfully');
    }
}
