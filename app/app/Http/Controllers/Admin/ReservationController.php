<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\UserDetailModel;
use App\ReservationModel;
use App\RoomModel;
use App\RoomTypeModel;
use App\DormitoryModel;


class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservations = DB::table('Dormitory')
                ->join('Rooms','Dormitory.id','=','Rooms.Dormitory_ID')
                ->join('TypeRoom','TypeRoom.Type','=','Rooms.Roomtype_ID')
                ->select('*',"Rooms.id as roomId")
                ->whereColumn('TypeRoom.Dormitory_ID','=','Rooms.Dormitory_ID')
                ->get();

        //         ->orderBy('Rooms.Dormitory_ID')
        //         ->orderBy('Rooms.RoomCode_ID')
        //         ->get();
                // ->paginate(20);
        return view('user.reservations.index',compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {

        $reservations = DB::table('Dormitory')
        ->join('Rooms','Dormitory.id','=','Rooms.Dormitory_ID')
        ->join('TypeRoom','TypeRoom.Type','=','Rooms.Roomtype_ID')
        ->select('*','Rooms.id as id')
        ->whereColumn('TypeRoom.Dormitory_ID','=','Rooms.Dormitory_ID')
        ->where("Rooms.id","=",$id)
        ->get();


        return view('user.reservations.create',compact('reservations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reservation = new ReservationModel;

        // dd($request);
        $request->validate([
            // 'User_ID' => 'required',
            'RoomCode_ID'=>'required',
            'term'=>'required',
        ]);

        $reservation->User_ID = Auth::user()->id ;
        $reservation->RoomCode_ID = $request->RoomCode_ID;
        $reservation->term = $request->term;
        $reservation->BookingDate = $request->BookingDate;
        $reservation->DueDate = $request->DueDate;
        $reservation->Status = $request->Status;
        $reservation->Detail = $request->Detail;

        $reservation->save();

        DB::table('Rooms')
            ->where('id','=',$request->RoomCode_ID)
            ->update([
            'AtNumberPreple' =>  DB::raw('AtNumberPreple + 1'),
        ]);

        Session()->flash("success","เพื่มข้อมูลเรียบร้อยแล้ว!");
        return redirect('/home');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $user =DB::table('Rooms')
        //         ->join('Reservations','Reservations.RoomCode_ID','=','Rooms.id')
        //         ->join('UserDetails','UserDetails.User_ID','=','Reservations.User_ID')
        //         ->select('*')
        //         ->where('Rooms.id','=',$id)
        //         ->get();

        // $Reservations = DB::table('Reservations')
        //             ->join('Rooms','Rooms.id','=','Reservations.RoomCode_ID')
        //             ->get();

        $Reservations = DB::table('Dormitory')
                ->join('Rooms','Rooms.Dormitory_ID','=','Dormitory.id')
                ->join('Reservations','Reservations.RoomCode_ID','=','Rooms.id')
                ->join('TypeRoom','TypeRoom.Type','=','Rooms.Roomtype_ID')
                ->select('*','Rooms.RoomCode_ID as RoomCode_ID')
                ->where('Reservations.id','=',$id)
                ->get();
        // dd($reservations);


        return view('user.reservations.show',compact('Reservations'));
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
