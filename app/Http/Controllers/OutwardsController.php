<?php

namespace App\Http\Controllers;

use App\outwards;

use App\inwards;
use Illuminate\Http\Request;
use View;

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
            'cname' => 'required',
            'dod' => 'required|date|before:today',
            'tdn' => 'required',
            'odn' => 'required',
            'weight' => 'required|numeric|min:0',
            'meter' => 'required|numeric|min:0',
            'ReelNo' => 'required',
            'remarks' 
            
        ]);
       
        $inwards=inwards::where('ReelNo',$request->input('ReelNo'))->first();
        // return view('admin.eg',compact('outwards'));
        
        if(!$inwards)
        {
            return redirect()->back()->with('warning', 'Reel No does not exist in inwards');
        }
        else 
        {
            if($inwards->outwards_id==null)
            {
                $outwards = new outwards;
                $outwards->CustomerName =$request->input('cname');
                $outwards->DateOfDispatch =$request->input('dod');
                $outwards->TheirDesignNo =$request->input('tdn');
                $outwards->OurDesignNo =$request->input('odn');
                $outwards->Weight =$request->input('weight');
                $outwards->Meter =$request->input('meter');
                $outwards->ReelNo =$request->input('ReelNo');
                $outwards->Remarks =$request->input('remarks');
                $outwards->inwards_id =$inwards->id;
                $outwards->remaining_wt =$inwards->GrossWt-$request->input('weight');
                $outwards->next_outwards_id=null;
                $outwards->save();
                $inwards->outwards_id =$outwards->id;
                $inwards->save();
                
            }
            else
            {
                // global $pass,$id;
                $find =$inwards->outwards_id;
                $outwards =outwards::find($find);
                $pass =$outwards->remaining_wt;
                $id=$outwards->next_outwards_id;
                while ($id != null)
                {   
                    // return view('admin.eg');
                    $outwards= outwards::find($id);
                    $pass=$outwards->remaining_wt;
                    $id=$outwards->next_outwards_id;
                }
                if($pass>0)
                {
                    $outwards1 = new outwards;
                    $outwards1->CustomerName =$request->input('cname');
                    $outwards1->DateOfDispatch =$request->input('dod');
                    $outwards1->TheirDesignNo =$request->input('tdn');
                    $outwards1->OurDesignNo =$request->input('odn');
                    $outwards1->Weight =$request->input('weight');
                    $outwards1->Meter =$request->input('meter');
                    $outwards1->ReelNo =$request->input('ReelNo');
                    $outwards1->Remarks =$request->input('remarks');
                    $outwards1->inwards_id =$inwards->id;
                    $outwards1->remaining_wt =$pass-$request->input('weight');
                    $outwards1->next_outwards_id=null;
                    $outwards1->save();
                    $outwards->next_outwards_id =$outwards1->id;
                    $outwards->save();
                    return redirect()->back()->with('success', 'Information has been added');
                }
                else
                {
                    return redirect()->back()->with('error', 'Reel with Reel No. '.$inwards->ReelNo .' is already Empty.');
                }
            }
            
        }
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
            'cname' => 'required',
            'dod' => 'required|date|before:today',
            'tdn' => 'required',
            'odn' => 'required',
            'weight' => 'required|numeric|min:0',
            'meter' => 'required|numeric|min:0',            
        ]);
        
       
        
        $outwards= outwards::find($id);
        if($outwards->ReelNo ==  $request->input('ReelNo')) //checks the uniqueness of reelno
        {
            $outwards->CustomerName =$request->input('cname');
            $outwards->DateOfDispatch =$request->input('dod');
            $outwards->TheirDesignNo =$request->input('tdn');
            $outwards->OurDesignNo =$request->input('odn');
            $outwards->Weight =$request->input('weight');
            $outwards->Meter =$request->input('meter');
            $outwards->ReelNo =$request->input('ReelNo');
            $outwards->Remarks =$request->input('remarks');
            $outwards->save();
            return redirect()->route('outwards.index')->with('success','Outwards updated successfully');
            
            
        }
        else
        {
            $inwards=inwards::where('ReelNo',$request->input('ReelNo'))->get();
        
            if(count($inwards)==0)
            {
                return redirect()->back()->with('warning', 'Reel No does not exist in inwards');
            }
            else 
            {
                $outwards->CustomerName =$request->input('cname');
                $outwards->DateOfDispatch =$request->input('dod');
                $outwards->TheirDesignNo =$request->input('tdn');
                $outwards->OurDesignNo =$request->input('odn');
                $outwards->Weight =$request->input('weight');
                $outwards->Meter =$request->input('meter');
                $outwards->ReelNo =$request->input('ReelNo');
                $outwards->Remarks =$request->input('remarks');
                $outwards->save();
                return redirect()->route('outwards.index')->with('success','Outwards updated successfully');
            }
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
        outwards::destroy($id);
        return redirect()->back()->with('success','Entry deleted successfully');
    }
}
