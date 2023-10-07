<?php

namespace App\Http\Controllers;

use App\Models\Doctorant;
use App\Models\Prof;
use Illuminate\Http\Request;

class DoctorantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $doctorants = Doctorant::latest()->paginate(5);
      
        return view('doctorants.index',compact('doctorants'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $profs=Prof::all();
        return view("doctorants.create",compact('profs'));
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
            'prof_id' => 'required',
        ]);
      
        Doctorant::create($request->all());
        return redirect()->route('doctorants.index')
                        ->with('success','PhD student created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Doctorant  $doctorant
     * @return \Illuminate\Http\Response
     */
    public function show(Doctorant $doctorant)
    {
        //
        return view('doctorants.show',compact('doctorant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Doctorant  $doctorant
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctorant $doctorant)
    {
        return view('doctorants.edit',compact('doctorant'));
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Doctorant  $doctorant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Doctorant $doctorant)
    {
        //
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
        ]);
      
        $doctorant->update($request->all());
      
        return redirect()->route('doctorants.index')
                        ->with('success','PhD student updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Doctorant  $doctorant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctorant $doctorant)
    {
        //
        $doctorant->delete();
       
        return redirect()->route('doctorants.index')
                        ->with('success','PhD student deleted successfully');
    }
    public function viewProf($prof_id)
    {
    $prof = Prof::find($prof_id);
    return view('prof-view', compact('prof'));
    }
}
    

