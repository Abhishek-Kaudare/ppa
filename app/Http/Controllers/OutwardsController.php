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
       
        $outwards=outwards::where('ReelNo',$request->input('ReelNo'))->get();
        // return view('admin.eg',compact('outwards'));
        
        if(count($outwards)==0)
        {
            return redirect()->back()->with('warning', 'Reel No does not exist in outwards');
        }
        else 
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
            $outwards->save();
            return redirect()->back()->with('success', 'Information has been added');
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
            
            // $outwards=outwards::where('ReelNo',$request->input('ReelNo'))->get();
            // return view('admin.eg',compact('outwards'));
            // if(count($outwards)==0)
            // {
            //     return redirect()->back()->with('warning', 'Reel No does not exist in outwards');
            // }
            // $in = outwards::find($id);
            // $reel= reel::where('ReelNo', $in->ReelNo )
            //         ->oldest();
            // $c=$reel->count();
            // if($c>0)
            // {
            //     $g = $in->GrossWt - $reel->remaining_wt ;
            //     // $reel->remaining_wt =$reel->remaining_wt + $g;
            //     $reel->update(['remaining_wt'=>$reel->remaining_wt + $g]);
            //     // DB::table('reels')->whereIn('ReelNo', $in->ReelNo)->update($update);
            //     $reel->save();
            //     foreach ($reel as $re) {
            //         // $re->ReelNo =$re->ReelNo;
            //         // $re->outwards_id =$re->outwards_id;
            //         // $re->remaining_wt =$in->GrossWt + $g;
            //         // $re->save();
            //     }
            // }
            // else
            // {
            //     $reel = new reel;
            //     $reel->ReelNo =$re->ReelNo;
            //     $reel->outwards_id =$re->outwards_id;
            //     $reel->remaining_wt =$in->GrossWt ;
            //     $reel->save();
            // }
            // return redirect()->route('outwards.index')->with('success','outwards updated successfully');
        }
        else
        {
            $this->validate($request, [
                'reelno' => 'unique:outwards'
            ]);

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
