<?php

namespace App\Http\Controllers;

use App\outwards;
use Illuminate\Http\Request;

class OutwardsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return outwards::all();
        // $outwards = outwards::all();
        $outwards= outwards::latest()->paginate(6);
        // return view('admin.index')->with('outwards',$outwards);
        return view('admin.outwards.index',compact('outwards'))->with('i',(request()->input('page',1)-1)*5);
    }

    // public function outwards()
    // {
    //     return view('admin.outwards');
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response 
     */
    public function create()
    {
        return view('admin.outwards.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request )
    {
    //    
        
            $this->validate($request, [
                'date' => 'required|date|before:today',
                'recievedfrom' => 'required',
                'brand' => 'required',
                'quality' => 'required',
                'gsm' => 'required',
                'reelno' => 'required|unique:outwards|',
                'grosswt' => 'required',
                'netwt' => 'required'
                
            ]);
            // outwards::create($request->all());
            $outwards = new outwards;
            $outwards->Date =$request->input('date');
            $outwards->RecievedFrom =$request->input('recievedfrom');
            $outwards->Brand =$request->input('brand');
            $outwards->Quality =$request->input('quality');
            $outwards->Gsm =$request->input('gsm');
            $outwards->ReelNo =$request->input('reelno');
            $outwards->GrossWt =$request->input('grosswt');
            $outwards->NetWt =$request->input('netwt');
            $outwards->save();
        
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
        $outwards= outwards::find($id);
        return view::make('admin.outwards.edit')->with('outwards', $outwards);
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
                'date' => 'required|date|before:today',
                'recievedfrom' => 'required',
                'brand' => 'required',
                'quality' => 'required',
                'gsm' => 'required',
                'reelno' => 'required|',
                'grosswt' => 'required',
                'netwt' => 'required'
                
            ]);
            $outwards= outwards::find($id);
            $outwards->Date =$request->input('date');
            $outwards->RecievedFrom =$request->input('recievedfrom');
            $outwards->Brand =$request->input('brand');
            $outwards->Quality =$request->input('quality');
            $outwards->Gsm =$request->input('gsm');
            $outwards->ReelNo =$request->input('reelno');
            $outwards->GrossWt =$request->input('grosswt');
            $outwards->NetWt =$request->input('netwt');
            $outwards->save();
            return redirect()->route('outwards.index')->with('success','outwards updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        outwards::destroy($id);
        return redirect()->back()->with('success','Entry deleted successfully');
    }
}
