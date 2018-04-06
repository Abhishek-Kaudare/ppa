<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\inwards;
use App\reel;
use App\brand;
use App\quality;
use App\supplier;
use View;
use DB;
use Yajra\Datatables\Datatables;

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
        $column = 'created_at';
        $inwards= inwards::orderBy($column,'desc')->get();
        // return view('admin.index')->with('inwards',$inwards);
        return view('admin.inwards.index',compact('inwards'))->with('i',(request()->input('page',1)-1)*5);
    }

    /**
     * Displays datatables front end view
     *
     * @return \Illuminate\View\View
     */
    public function getIndex()
    {
        return view('datatables.index');
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function anyData()
    {
        return Datatables::of(User::query())->make(true);
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
    public function store(Request $request )
    {
    //    
            $this->validate($request,[
                'date' => 'required|date|before:today',
                'recievedfrom' => 'required',
                'brand' => 'required',
                'quality' => 'required',
                'gsm' => 'required|numeric|min:0',
                'reelno' => 'required|unique:inwards',
                'grosswt' => 'required|numeric|min:0',
                'netwt' => 'numeric|min:0'
            ]);
            
            $inwards = new inwards;
            $inwards->Date =$request->input('date');
            $inwards->RecievedFrom =$request->input('recievedfrom');
            $inwards->Brand =$request->input('brand');
            $inwards->Quality =$request->input('quality');
            $inwards->Gsm =$request->input('gsm');
            $inwards->ReelNo =$request->input('reelno');
            $inwards->GrossWt =$request->input('grosswt');
            $inwards->NetWt =$request->input('netwt');
            $inwards->outwards_id=null;
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
        $this->validate($request, [
                'date' => 'required|date|before:today',
                'recievedfrom' => 'required',
                'brand' => 'required',
                'quality' => 'required',
                'gsm' => 'required|numeric|min:0',
                'reelno' => 'required',
                'grosswt' => 'required|numeric|min:0',
                'netwt' => 'numeric|min:0'
            ]);
        
       
        
        $inwards= inwards::find($id);
        if($inwards->ReelNo ==  $request->input('reelno')) //checks the uniqueness of reelno
        {
            $inwards->Date =$request->input('date');
            $inwards->RecievedFrom =$request->input('recievedfrom');
            $inwards->Brand =$request->input('brand');
            $inwards->Quality =$request->input('quality');
            $inwards->Gsm =$request->input('gsm');
            $inwards->ReelNo =$request->input('reelno');
            $inwards->GrossWt =$request->input('grosswt');
            $inwards->NetWt =$request->input('netwt');
            $inwards->save();

            if($inwards->outwards_id != null)
            {
                global $id,$pass;
                $find=$inwards->outwards_id;
                $outwards= outwards::find($find);
                $outwards->remaining_wt=$inwards->GrossWt- $outwards->Weight ;
                $pass=$outwards->remaining_wt;
                $outwards->save();
                check:if($pass>0)
                {   $id=$outwards->next_outwards_id;
                    while ($id != null)
                    {   
                        $outwards= outwards::find($id);
                        $outwards->remaining_wt=$pass- $outwards->GrossWt ;
                        $pass=$outwards->remaining_wt;
                        $outwards->save();
                        $id=$outwards->next_outwards_id;
                        if($pass>0)
                        {
                            continue;
                        }
                        else
                        {
                            goto check;
                        }
                    }
                }
                else
                {
                    while ($id != null)
                    {   
                        $outwards= outwards::find($id);
                        $id=$outwards->next_outwards_id;
                        outwards::destroy($id);
                    }
                }
            }
            return redirect()->route('inwards.index')->with('success','Inwards updated successfully');
        }
        else
        {
            $this->validate($request, [
                'reelno' => 'unique:inwards'
            ]);
                
            $inwards->Date =$request->input('date');
            $inwards->RecievedFrom =$request->input('recievedfrom');
            $inwards->Brand =$request->input('brand');
            $inwards->Quality =$request->input('quality');
            $inwards->Gsm =$request->input('gsm');
            $inwards->ReelNo =$request->input('reelno');
            $inwards->GrossWt =$request->input('grosswt');
            $inwards->NetWt =$request->input('netwt');
            $inwards->save();

            if($inwards->outwards_id != null)
            {
                $id=$inwards->outwards_id;
                while($id != null)
                    {   
                        $outwards= outwards::find($id);
                        $id=$outwards->next_outwards_id;
                        outwards::destroy($id);
                    }
            }
            return redirect()->route('inwards.index')->with('success','Inwards updated successfully');
        }
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

    /**
     * Update the reels resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
}
