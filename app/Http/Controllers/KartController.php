<?php

namespace App\Http\Controllers;

use Validator;
use App\Kart;
use Illuminate\Http\Request;
use DB;
use CommentController;
use App\User;

use Auth;

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
                        ->whereNull('deleted_at')
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
        $edit = false;
        return view('karts.add', compact('edit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
       
        $required = 'This field is required';
        $unique = 'This date and time is already taken';
        $integer = 'This field must be an integer';
        $max = 'Entered value contains too many simbols';

        $usable = 'This must be checked, if the kart is not on track or broken';
        $on_track = 'This must be checked, if the kart is on the track at the moment';
        $broken = 'This must be checked, if the kart is broken and not usabe or on track';

        if(Auth::user()->lang == 'lv') {
            $required = 'Šis lauks ir obligāts';
            $unique = 'Šis datums un laiks jau ir aizņemts';
            $integer = 'Ir jāievada skaitlis';
            $max = 'Ievadītā vērtība ir par lielu';
    
            $usable = 'Šim jābūt atzīmētam, ja kartings nav trasē un nav saplīsis';
            $on_track = 'Šim jābūt atzīmētam, ja kartings šobrīd atrodas trasē';
            $broken = 'Šim jābūt atzīmētam, ja kartings ir saplīsis';

        }

        $messages = [ //messages to show on specific errors

            'required' => $required,
            'unique' => $unique,
            'integer' => $integer,
            'max' => $max,
            'usable.required_without_all' => $usable,
            'on_track.required_without_all' => $on_track,
            'broken.required_without_all' => $broken,
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

        if($request->image){

            $photoName = time() . '.Kart.png';
            $request->image->move(public_path('kart_images'), $photoName);
            $kartDb->image = $photoName;

        }

        $kartDb->kart_nr = request('kart_nr');
        $kartDb->model = request('model');
        $kartDb->usable = request('usable');
        $kartDb->on_track = request('on_track');
        $kartDb->broken = request('broken');

        $kartDb->save(); //save data to database

        $karts = DB::table('karts')
                        ->orderBy('id','desc')
                        ->whereNull('deleted_at')
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

        if($kart->usable != null)$usable = ' &#10004;'; //logic for ticks and x'es
            else $usable = ' &#10006;';
        if($kart->on_track != null)$on_track = ' &#10004;';
            else $on_track = ' &#10006;';
        if($kart->broken != null)$broken = ' &#10004;';
            else $broken = ' &#10006;';

        $comments = DB::table('comments')
                        ->where('kart_id', $kart_id->id)
                        ->orderBy('created_at','desc')
                        ->get();
        foreach($comments as $comment){

            $kartComment = DB::table('users')->where('id', $comment->employee_id)->first();
            $commentArr[] = $kartComment;
        }
        $n = 0;

        return view('karts.kart', compact('kart', 'usable', 'on_track', 'broken', 'comments','commentArr', 'n'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kart  $kart
     * @return \Illuminate\Http\Response
     */
    public function edit(Kart $kart)
    {
        $edit = true;

        return view('karts.add', compact('edit','kart'));
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
        $required = 'This field is required';
        $unique = 'This date and time is already taken';
        $integer = 'This field must be an integer';
        $max = 'Entered value contains too many simbols';

        $usable = 'This must be checked, if the kart is not on track or broken';
        $on_track = 'This must be checked, if the kart is on the track at the moment';
        $broken = 'This must be checked, if the kart is broken and not usabe or on track';

        if(Auth::user()->lang == 'lv') {
            $required = 'Šis lauks ir obligāts';
            $unique = 'Šis datums un laiks jau ir aizņemts';
            $integer = 'Ir jāievada skaitlis';
            $max = 'Ievadītā vērtība ir par lielu';
    
            $usable = 'Šim jābūt atzīmētam, ja kartings nav trasē un nav saplīsis';
            $on_track = 'Šim jābūt atzīmētam, ja kartings šobrīd atrodas trasē';
            $broken = 'Šim jābūt atzīmētam, ja kartings ir saplīsis';

        }

        $messages = [ //messages to show on specific errors

            'required' => $required,
            'unique' => $unique,
            'integer' => $integer,
            'max' => $max,
            'usable.required_without_all' => $usable,
            'on_track.required_without_all' => $on_track,
            'broken.required_without_all' => $broken,
        ];

        if($kart->kart_nr != request('kart_nr')) {

            $kartVal = 'required|unique:karts|integer';
        }
        else $kartVal = 'required|integer';

        $rules = [ // validation rules
            'kart_nr' => $kartVal,
            'model' => 'required|max:100|string',
            'usable' => 'required_without_all:on_track,broken',
            'on_track' => 'required_without_all:usable,broken',
            'broken' => 'required_without_all:usable,on_track'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        $validator->validate(); //Validates entered data

        if($request->image){

            $photoName = time() . '.Kart.png';
            $request->image->move(public_path('kart_images'), $photoName);
            $kart->image = $photoName;

        }

        $kart->kart_nr = request('kart_nr');
        $kart->model = request('model');
        $kart->usable = request('usable');
        $kart->on_track = request('on_track');
        $kart->broken = request('broken');
        $kart->save();

        return redirect()->route('kart', $kart->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kart  $kart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kart $kart)
    {
        $kart->kart_nr = 0;
        $kart->delete();

        $karts = DB::table('karts')
                        ->orderBy('id','desc')
                        ->whereNull('deleted_at')
                        ->get();

        return redirect()->route('kartPage', $kart);
    }
}
