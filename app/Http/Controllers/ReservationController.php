<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Reservation;
use Auth;
use Validator;
Use DB;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $today = false;

        $reservations = DB::table('reservations')
                        ->orderBy('date','asc')
                        ->get();

        $users = DB::table('users')
                ->orderBy('id','asc')
                ->get();

        return view('reservations.index', compact('today', 'reservations', 'users'));
    }

    public function today()
    {
        $today = true;

        $reservations = DB::table('reservations')
                        ->orderBy('date','asc')
                        ->get();

        $users = DB::table('users')
                ->orderBy('id','asc')
                ->get();

        return view('reservations.index', compact('today','reservations', 'users'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $edit = false;

        return view('reservations.addRes', compact('edit'));
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
        $min = 'Entered value is too small';

        if(Auth::user()->lang == 'lv') {
            $required = 'Šis lauks ir obligāts';
            $unique = 'Šis datums un laiks jau ir aizņemts';
            $integer = 'Ir jāievada skaitlis';
            $max = 'Ievadītā vērtība ir par lielu';
            $min = 'Ievadītā vērtība ir par mazu';
        }

        $messages = [ //messages to show on specific errors

            'required' => $required,
            'unique' => $unique,
            'integer' => $integer,
            'max' => $max,
            'min' => $min
        ];

        $rules = [ // validation rules
            'first_name' => 'required|max:100|string',
            'last_name' => 'required|max:100|string',
            'number' => 'required|min:20000000|max:29999999|integer',
            'date' => 'required|date',
            'hours' => 'required|integer',
            'minutes' => 'required|integer',
            'length' => 'required|integer',
            'numberRiders' => 'required|min:1|integer'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        $validator->validate(); //Validates entered data

        $res= DB::table('reservations') //check if tome is not already taken
                            ->where([
                                ['date', '=', $request->date],
                                ['hours', '=', $request->hours],
                                ['minutes', '=', $request->minutes],
                            ])->get();
                            
        if(!$res->isEmpty()) {

                $resExists = "Time already reserved";
                return back()->with(compact('resExists'));
        }

        $today = false;
        $resDb = new Reservation; //database object or something

        $resDb->first_name = request('first_name');
        $resDb->last_name = request('last_name');
        $resDb->number = request('number');
        $resDb->date = request('date');
        $resDb->hours = request('hours');
        $resDb->minutes = request('minutes');
        $resDb->length = request('length');
        $resDb->numberRiders = request('numberRiders');
        $resDb->employee_id = Auth::user()->id;

        $resDb->save(); //save data to database

        $reservations = DB::table('reservations')
                        ->orderBy('date','asc')
                        ->get();

        $users = DB::table('users')
                ->orderBy('id','asc')
                ->get();
        

        return view('reservations.index', compact('reservations', 'today', 'users'));
                        

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
    public function edit(Reservation $reservation)
    {
        $edit = true;

        return view('reservations.addRes', compact('edit','reservation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservation $reservation)
    {
       
        $required = 'This field is required';
        $unique = 'This date and time is already taken';
        $integer = 'This field must be an integer';
        $max = 'Entered value contains too many simbols';
        $min = 'Entered value is too small';
    
        if(Auth::user()->lang == 'lv') {
            $required = 'Šis lauks ir obligāts';
            $unique = 'Šis datums un laiks jau ir aizņemts';
            $integer = 'Ir jāievada skaitlis';
            $max = 'Ievadītā vērtība ir par lielu';
            $min = 'Ievadītā vērtība ir par mazu';
        }

        $messages = [ //messages to show on specific errors

            'required' => $required,
            'unique' => $unique,
            'integer' => $integer,
            'max' => $max,
            'min' => $min
        ];


        $rules = [ // validation rules
            'first_name' => 'required|max:100|string',
            'last_name' => 'required|max:100|string',
            'number' => 'required|min:20000000|max:29999999|integer',
            'date' => 'required|date',
            'hours' => 'required|integer',
            'minutes' => 'required|integer',
            'length' => 'required|integer',
            'numberRiders' => 'required|min:1|integer'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        $validator->validate(); //Validates entered data

        $res= DB::table('reservations') //check if tome is not already taken
                            ->where([
                                ['date', '=', $request->date],
                                ['hours', '=', $request->hours],
                                ['minutes', '=', $request->minutes],
                            ])->get();
        if(!$res->isEmpty()) {
                if($reservation->date != request('date') || $reservation->hours != request('hours') || $reservation->minutes != request('minutes')) {

                $resExists = "Time already reserved";
                return back()->with(compact('resExists'));
            }

        }


        $reservation->first_name = request('first_name');
        $reservation->last_name = request('last_name');
        $reservation->number = request('number');
        $reservation->date = request('date');
        $reservation->hours = request('hours');
        $reservation->minutes = request('minutes');
        $reservation->length = request('length');
        $reservation->numberRiders = request('numberRiders');

        $reservation->save();

        return redirect()->route('reservIndex');

        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reservation = Reservation::find($id);
        $reservation->delete();

        $reservation = \App\Reservation::all();

        return back(); //redirect()->route('view-users', $users);
    }
}
