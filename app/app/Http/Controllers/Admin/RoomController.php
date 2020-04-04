<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\RoomModel;
use App\RoomTypeModel;
use App\DormitoryModel;
use DB;
class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $count = DB::table('Reservations')
        // // SELECT COUNT(RoomCode_ID) FROM Reservations WHERE RoomCode_ID
        //     // ->select('*','COUNT(Reservations.RoomCode_ID)  as count')
        //     ->select('*',DB::raw('count(Reservations.RoomCode_ID) as count'))
        //     ->where('RoomCode_ID')
        //     // ->where('Reservations.RoomCode_ID')
            ->get();

        $room = DB::table('Dormitory')
            ->join('Rooms','Dormitory.id','=','Rooms.Dormitory_ID')
            ->join('TypeRoom','TypeRoom.Type','=','Rooms.Roomtype_ID')
            ->select('*',"Rooms.id as id")
            ->whereColumn('TypeRoom.Dormitory_ID','=','Rooms.Dormitory_ID')
            ->get();

        return view('admin.rooms.index',compact('room','count'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $arrayData = explode(":",$id) ;
        $dormitoryId =  $arrayData[0] ;
        $type =  $arrayData[1] ;

        $room = DB::table('Rooms')->get();
        // $roomtype = RoomTypeModel::orderBy('id')->get();
        $dormitory = DormitoryModel::orderBy('id')
                    ->where('Dormitory.id','=',$dormitoryId)
                    ->get();
        return view('admin.rooms.create',compact('room','type','dormitory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $room = new RoomModel;

        $request->validate([
            'RoomCode_ID' => 'required|unique:RoomCode_ID',
            'RoomCode_ID'=>'required',
            'Floor'=>'required',
            'Dormitory_ID'=>'required',
            'Roomtype_ID'=>'required',
        ]);

        $room->RoomCode_ID = $request->RoomCode_ID;
        $room->Floor = $request->Floor;
        $room->Dormitory_ID = $request->Dormitory_ID;
        $room->Roomtype_ID = $request->Roomtype_ID;
        // $room->StatusRoom = $request->StatusRoom;
        // $room->Roomtype_ID = $request->Roomtype_ID;

        $room->save();
        Session()->flash("success","เพื่มข้อมูลเรียบร้อยแล้ว!");
        return redirect('admin/rooms');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // echo("xs");
        $user =DB::table('Rooms')
                    ->join('Reservations','Reservations.RoomCode_ID','=','Rooms.id')
                    ->join('UserDetails','UserDetails.User_ID','=','Reservations.User_ID')
                    ->select('*')
                    ->where('Rooms.id','=',$id)
                    ->get();

        // $Reservations = DB::table('Reservations')
        //             ->join('Rooms','Dormitory.id','=','Rooms.Dormitory_ID')
        //             ->get();
        $room = DB::table('Dormitory')
                    ->join('Rooms','Rooms.Dormitory_ID','=','Dormitory.id')
                    ->join('TypeRoom','TypeRoom.Type','=','Rooms.Roomtype_ID')
                    ->select('*')
                    ->whereColumn('Dormitory.id','=','Rooms.Dormitory_ID')
                    ->where('Rooms.id','=',$id)
                    ->get();


        return view('admin/rooms/show',compact('room','user'));
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
    public function destroy($RoomCode_ID)
    {
        DB::table('Rooms')->where('RoomCode_ID','=',$RoomCode_ID)->delete();
        Session()->flash("success","ลบข้อมูลเรียบร้อยแล้ว!");
        return redirect('admin/rooms');
    }
}
