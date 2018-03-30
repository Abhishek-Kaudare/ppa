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
    public function store(Request $request )
    {
    //    
            $this->validate($request,[
                'date' => 'required|date|before:today',
                'recievedfrom' => 'required',
                'brand' => 'required',
                'quality' => 'required',
                'gsm' => 'required|numeric|min:0',
                'reelno' => 'required|unique:inwards|',
                'grosswt' => 'required|numeric|min:0',
                'netwt' => 'numeric|min:0'
            ]);
            // inwards::create($request->all());
            // reel::firstorCreate(array('ReelNo'=> $request->input('reelno'),'outwards_id'=> null,'remaining_wt'=> $request->input('grosswt')));
            $reel = new reel;
            $reel->ReelNo =$request->input('reelno');
            $reel->outwards_id =null;
            $reel->remaining_wt =$request->input('grosswt');
            $reel->save();

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
        $this->validate($request, [
                'date' => 'required|date|before:today',
                'recievedfrom' => 'required',
                'brand' => 'required',
                'quality' => 'required',
                'gsm' => 'required',
                'reelno' => 'required',
                'grosswt' => 'required',
                'netwt'
                
            ]);
        $reel= DB::table('reels')->where('ReelNo', '=', $request->input('reelno'))->orderBy('created_at', 'desc');
        $c=$reel->count();
        // if (count($reel)==1) 
        // {
        //     $reel = new reel;
        //     $reel->ReelNo =$request->input('reelno');
        //     $reel->outwards_id =$reel->outwards_id;
        //     $reel->remaining_wt =$request->input('grosswt');
        //     $reel->save();
        // }
        // else
        
        $inwards= inwards::find($id);
        if($inwards->ReelNo ==  $request->input('reelno'))
        {
            if($c>0)
            {
                $rz = $reel->remaining_wt;
                $r = $request->input('grosswt');
                foreach ($reel as $re) {
                    $re->ReelNo =$request->input('reelno');
                    $re->outwards_id =$reel->outwards_id;
                    $re->remaining_wt =$request->input('grosswt') + $r;
                    $re->save();
                }
            }
            else
            {
                $reel = new reel;
                $reel->ReelNo =$request->input('reelno');
                $reel->outwards_id =$reel->outwards_id;
                $reel->remaining_wt =$request->input('grosswt');
                $reel->save();
            }
            $inwards->Date =$request->input('date');
            $inwards->RecievedFrom =$request->input('recievedfrom');
            $inwards->Brand =$request->input('brand');
            $inwards->Quality =$request->input('quality');
            $inwards->Gsm =$request->input('gsm');
            $inwards->ReelNo =$request->input('reelno');
            $inwards->GrossWt =$request->input('grosswt');
            $inwards->NetWt =$request->input('netwt');
            $inwards->save();
            return redirect()->route('inwards.index')->with('success','Inwards updated successfully');
        }
        else
        {
            $this->validate($request, [
                'reelno' => 'unique:inwards'
            ]);
            if($c>0)
            {
                $r = $request->input('grosswt') - $reel->remaining_wt;
                foreach ($reel as $reel) {
                    $reel = new reel;
                    $reel->ReelNo =$request->input('reelno');
                    $reel->outwards_id =$reel->outwards_id;
                    $reel->remaining_wt =$request->input('grosswt') + $r;
                    $reel->save();
                }
            }
            else
            {
                $reel = new reel;
                $reel->ReelNo =$request->input('reelno');
                $reel->outwards_id =$reel->outwards_id;
                $reel->remaining_wt =$request->input('grosswt');
                $reel->save();
            }
            $inwards->Date =$request->input('date');
            $inwards->RecievedFrom =$request->input('recievedfrom');
            $inwards->Brand =$request->input('brand');
            $inwards->Quality =$request->input('quality');
            $inwards->Gsm =$request->input('gsm');
            $inwards->ReelNo =$request->input('reelno');
            $inwards->GrossWt =$request->input('grosswt');
            $inwards->NetWt =$request->input('netwt');
            $inwards->save();
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
}
