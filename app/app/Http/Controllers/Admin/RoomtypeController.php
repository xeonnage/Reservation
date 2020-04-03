<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DormitoryModel;
use App\RoomTypeModel;
use DB;


class RoomTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roomtype = DB::table('TypeRoom')
                    ->join('Dormitory','Dormitory.id','=','TypeRoom.Dormitory_ID')
                    ->orderBy('Dormitory.id')
                    ->orderBy('TypeRoom.Type')
                    ->select("*","TypeRoom.id as roomTypeId")
                    ->get();
        return view('admin.roomtype.index',compact('roomtype'));
        // return view('admin.dormitory.show',compact('roomtype','dormitory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roomtype = DB::table('TypeRoom')->get();
        $dormitory = DormitoryModel::orderBy('id')->get();
        return view('admin.roomtype.create',compact('roomtype','dormitory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Roomtype = new RoomTypeModel;

        $request->validate([
            'Type'=>'required',
            'NumberPeople'=>'required',
            'Dormitory_ID'=>'required',

        ]);

        $Roomtype->Type = $request->Type;
        $Roomtype->NumberPeople = $request->NumberPeople;
        $Roomtype->Dormitory_ID = $request->Dormitory_ID;

        $Roomtype->save();
        Session()->flash("success","เพื่มข้อมูลเรียบร้อยแล้ว!");
        return redirect('admin/roomtype');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $arrayData = explode(":",$id) ;
        $dormitoryId =  $arrayData[0] ;
        $type =  $arrayData[1] ;
        $roomtypeData = RoomTypeModel::select('*')->get();

        $dormitory = DormitoryModel::select('*')
        ->where('Dormitory.id','=',$dormitoryId)
        ->get(); // ส่งไปcompact
        $roomtype = DB::table('Dormitory') // ส่งไปcompact
        ->join('Rooms','Dormitory.id','=','Rooms.Dormitory_ID')
        ->join('TypeRoom','TypeRoom.Type','=','Rooms.Roomtype_ID')
        ->select('*')
        ->where('TypeRoom.Dormitory_ID','=',$dormitoryId)
        ->where('TypeRoom.Type','=',$type)

        ->whereColumn('TypeRoom.Dormitory_ID','=','Rooms.Dormitory_ID')
        ->get();

        return view('admin/roomtype/show',
                compact('roomtype','dormitory','type'));

        // return view('admin/roomtype/show',
        // ['roomtype' => RoomTypeModel::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $roomtype = DB::table('Roomtype')->get();
        // $dormitory = DormitoryModel::orderBy('id')->get();
        // return view('admin.roomtype.edit',compact('roomtype','dormitory'));

        $dormitory = DormitoryModel::orderBy('id')->get();
        $roomtype = DB::table("TypeRoom")
                    ->where('id','=',$id)
                    ->get();
        return view('admin/roomtype/edit',compact('roomtype','dormitory'));
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
        $request->validate([
            'Type'=>'required',
            'NumberPeople'=>'required',
            'Dormitory_ID'=>'required',

        ]);
        DB::table('TypeRoom')
            ->where('id','=',$id)
            ->update([
            'Type' => $request->Type,
            'NumberPeople' => $request->NumberPeople,
            'Dormitory_ID' => $request->Dormitory_ID,
        ]);
        Session()->flash("success","อัพเดทข้อมูลเรียบร้อยแล้ว!");
        return redirect('admin/roomtype');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $roomtype=RoomTypeModel::find($id);
        // if($roomtype->room->count()>0){
        //     return redirect()->back();
        // }

        DB::table('TypeRoom')->where('id','=',$id)->delete();
        Session()->flash("success","ลบข้อมูลเรียบร้อยแล้ว!");
        return redirect('admin/roomtype');
    }
}
