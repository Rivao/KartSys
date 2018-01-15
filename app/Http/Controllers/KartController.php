<?php

namespace App\Http\Controllers;

use Validator;
use App\Kart;
use Illuminate\Http\Request;
use DB;

class KartController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $karts = DB::table('karts')
                        ->orderBy('id','desc')
                        ->get();


        return view('karts.index', compact('karts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('karts.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $messages = [ //messages to show on specific errors

            'required' => 'This field is required',
            'unique' => 'This field is already in the database',
            'integer' => 'This field must be an integer',
            'max' => 'Entered value contains too many simbols',
            'usable.required_without_all' => 'This must be checked, if the kart is not on track or broken',
            'on_track.required_without_all' => 'This must be checked, if the kart is on the track at the moment',
            'broken.required_without_all' => 'This must be checked, if the kart is broken and not usabe or on track',

        ];

        $rules = [ // validation rules
            'kart_nr' => 'required|unique:karts|integer',
            'model' => 'required|max:100|string',
            'usable' => 'required_without_all:on_track,broken',
            'on_track' => 'required_without_all:usable,broken',
            'broken' => 'required_without_all:usable,on_track'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        $validator->validate(); //Validates entered data


        $kartDb = new Kart; //database object or something

        $kartDb->kart_nr = request('kart_nr');
        $kartDb->model = request('model');
        $kartDb->usable = request('usable');
        $kartDb->on_track = request('on_track');
        $kartDb->broken = request('broken');

        $kartDb->save(); //save data to database

        $karts = DB::table('karts')
                        ->orderBy('id','desc')
                        ->get();

        return view('karts.index', compact('karts'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kart  $kart
     * @return \Illuminate\Http\Response
     */
    public function show(Kart $kart_id)
    {


        $kart = DB::table('karts')->where('id', $kart_id->id)->first();

        if($kart->usable != null)$usable = 'Usable: &#10004;'; //logic for ticks and x'es
            else $usable = 'Usable: &#10006;';
        if($kart->on_track != null)$on_track = 'On Track: &#10004;';
            else $on_track = 'On Track: &#10006;';
        if($kart->broken != null)$broken = 'Broken: &#10004;';
            else $broken = 'Broken: &#10006;';

        return view('karts.kart', compact('kart', 'usable', 'on_track', 'broken'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kart  $kart
     * @return \Illuminate\Http\Response
     */
    public function edit(Kart $kart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kart  $kart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kart $kart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kart  $kart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kart $kart)
    {
        //
    }
}
