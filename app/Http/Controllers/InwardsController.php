<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\inwards;

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
        $inwards= inwards::latest()->paginate(5);
        // return view('admin.index')->with('inwards',$inwards);
        return view('admin.index',compact('inwards'))->with('i',(request()->input('page',1)-1)*5);
    }

    public function inwards()
    {
        return view('admin.inwards');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    //    if($request->hasfile('filename'))
    //      {
    //         $file = $request->file('filename');
    //         $name=time().$file->getClientOriginalName();
    //         $file->move(public_path().'/images/', $name);
    //      }
    //     $passport= new Passport();
    //     $passport->name=$request->get('name');
    //     $passport->email=$request->get('email');
    //     $passport->number=$request->get('number');
    //     $date=date_create($request->get('date'));
    //     $format = date_format($date,"Y-m-d");
    //     $passport->date = strtotime($format);
    //     $passport->office=$request->get('office');
    //     $passport->filename=$name;
    //     $passport->save();
        
            $this->validate($request, [
                'date' => 'requiured',
                'recievedfrom' => 'requiured',
                'brand' => 'requiured',
                'quality' => 'requiured',
                'gsm' => 'requiured',
                'reelno' => 'requiured',
                'grosswt' => 'requiured',
                'netwt' => 'requiured'
                
            ]);

            $inwards = new inwards;
            $inwards->Date =$request->input('Date');
            $inwards->RecievedFrom =$request->input('RecievedFrom');
            $inwards->Brand =$request->input('Brand');
            $inwards->Quality =$request->input('Quality');
            $inwards->Gsm =$request->input('GSM');
            $inwards->ReelNo =$request->input('ReelNo');
            $inwards->GrossWt =$request->input('GrossWt');
            $inwards->NetWt =$request->input('NetWt');
            $inwards->save();
        
        return redirect('admin/create')->with('success', 'Information has been added');
    
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
        //
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
        //
    }
}
