<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\inwards;
use View;

class InwardsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return inwards::all();
        // $inwards = inwards::all();
        $inwards= inwards::latest()->paginate(6);
        // return view('admin.index')->with('inwards',$inwards);
        return view('admin.inwards.index',compact('inwards'))->with('i',(request()->input('page',1)-1)*5);
    }

    // public function inwards()
    // {
    //     return view('admin.inwards');
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.inwards.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    //    
        
            $this->validate($request, [
                'date' => 'required|date|before:today',
                'recievedfrom' => 'required',
                'brand' => 'required',
                'quality' => 'required',
                'gsm' => 'required',
                'reelno' => 'required|unique:inwards|',
                'grosswt' => 'required',
                'netwt' => 'required'
                
            ]);
            // inwards::create($request->all());
            $inwards = new inwards;
            $inwards->Date =$request->input('date');
            $inwards->RecievedFrom =$request->input('recievedfrom');
            $inwards->Brand =$request->input('brand');
            $inwards->Quality =$request->input('quality');
            $inwards->Gsm =$request->input('gsm');
            $inwards->ReelNo =$request->input('reelno');
            $inwards->GrossWt =$request->input('grosswt');
            $inwards->NetWt =$request->input('netwt');
            $inwards->save();
        
        return redirect()->back()->with('success', 'Information has been added');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $inwards= inwards::find($id);
        return view::make('admin.inwards.edit')->with('inwards', $inwards);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        inwards::destroy($id);
        return redirect()->back()->with('success','Entry deleted successfully');
    }
}
