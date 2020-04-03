<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
        // $arrayData = explode(":",$id) ;
        // $dormitoryId =  $arrayData[0] ;
        // $type =  $arrayData[1] ;

        // $room = DB::table('Rooms')->get();
        // $roomtype = RoomTypeModel::orderBy('id')->get();
        // $dormitory = DormitoryModel::orderBy('id')
        //             ->where('Dormitory.id','=',$dormitoryId)
        //             ->get();

        // $room = DB::table('Dormitory')
        // ->join('Rooms','Dormitory.id','=','Rooms.Dormitory_ID')
        // ->join('TypeRoom','TypeRoom.Type','=','Rooms.Roomtype_ID')
        // ->select('*')
        // ->whereColumn('TypeRoom.Dormitory_ID','=','Rooms.Dormitory_ID')
        // // ->get();
        // ->orderBy('Rooms.RoomCode_ID')
        // ->orderBy('Rooms.Dormitory_ID')
        // // $room =DB::table('Rooms')
        // //     ->join('Dormitory','Dormitory.id','=','Rooms.Dormitory_ID')
        // //     ->join('TypeRoom','TypeRoom.Type','=','Rooms.Roomtype_ID')
        // //     ->select('*')
        // //     ->whereColumn('Dormitory.id','=','Rooms.Dormitory_ID')
        // //     ->whereColumn('TypeRoom.Type','=','Rooms.Roomtype_ID')
        // //     ->orderBy('Rooms.Dormitory_ID')
        // //     ->orderBy('Rooms.RoomCode_ID')
        $reservations = DB::table('Dormitory')
        ->join('Rooms','Dormitory.id','=','Rooms.Dormitory_ID')
        ->join('TypeRoom','TypeRoom.Type','=','Rooms.Roomtype_ID')
        ->select('*')
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

        $request->validate([
            'RoomCode_ID' => 'required',
            'RoomCode_ID'=>'required',
            'Floor'=>'required',
            'Dormitory_ID'=>'required',
            'Roomtype_ID'=>'required',
        ]);

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
