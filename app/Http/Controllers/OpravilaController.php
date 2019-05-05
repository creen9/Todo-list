<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Opravilo;
use App\Oseba;

class OpravilaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $opravila = Opravilo::all();

        $date = date('Y-m-d', time());

        foreach ($opravila as $opravilo) {
            if ($opravilo->datum_zakljucka <= $date) {
                $opravilo->je_zakljucen = 1;
                $opravilo->save();
            }
        }

        return view('home')->with('opravila', $opravila);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $osebe = Oseba::all();

        return view('addtodo')->with('osebe', $osebe);
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
            'naziv' => 'required',
            'oseba' => 'required',
            'opis' => 'required',
            'datum_zakljucka' => 'required|date|after:yesterday'
        ]);

        $opravilo = new Opravilo;
        $opravilo->naziv = $request->input('naziv');
        $opravilo->oseba = $request->input('oseba');
        $opravilo->opis = $request->input('opis');
        $opravilo->datum_zakljucka = $request->input('datum_zakljucka');
        
        $opravilo->save();
        
        // Redirect
        return redirect('/opravila')->with('success', 'Opravilo dodano');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $opravilo = Opravilo::find($id);
        return view('showtodo')->with('opravilo', $opravilo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $osebe = Oseba::all();
        $opravilo = Opravilo::find($id);
        return view('edittodo')->with('opravilo', $opravilo)->with('osebe', $osebe);
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
            'naziv' => 'required',
            'oseba' => 'required',
            'opis' => 'required',
            'datum_zakljucka' => 'required|date|after:yesterday'
        ]);

        $opravilo = Opravilo::find($id);
        $opravilo->naziv = $request->input('naziv');
        $opravilo->oseba = $request->input('oseba');
        $opravilo->opis = $request->input('opis');
        $opravilo->datum_zakljucka = $request->input('datum_zakljucka');
        
        $opravilo->save();
        
        // Redirect
        return redirect('/opravila')->with('success', 'Opravilo urejeno');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $opravilo = Opravilo::find($id);
        $opravilo->delete();

        return redirect('/opravila')->with('success', 'Opravilo izbrisano');
    }

    public function zakljuci($id)
    {
        $opravilo = Opravilo::find($id);
        $opravilo->je_zakljucen = 1;
        $opravilo->save();
        return redirect('/opravila');
    }
}
