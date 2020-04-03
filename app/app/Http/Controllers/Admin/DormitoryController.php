<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DormitoryModel;
use App\RoomTypeModel;
use DB;

class DormitoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dormitory = DB::table('Dormitory')->get();
        return view('admin.dormitory.index',compact('dormitory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/dormitory/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // เก็บข้อมูลผ่าน DB
        // $request->validate([
        //     'Name_EN' => 'required|unique:Name_EN',
        //     'Name_TH' => 'required',
        //     'Description' => 'required',

        // ]);

        // DB::table('Dormitory')
        //     ->insert([
        //     'Name_EN' => $request->Name_EN,
        //     'Name_TH' => $request->Name_TH,
        //     'Description' => $request->Description,


        // ]);
        // return redirect('admin/dormitory');


        //เก็บข้อมูลผ่าน Model(ใช้บันทึกเวลาเพื่มข้อมูล)
        $Dormitory = new DormitoryModel;

        $request->validate([
            // 'Name_Eng' => 'required|unique:Dormitory',
            // 'Name_Thai' => 'required|unique:Dormitory',
            'Name_Eng' => 'required',
            'Name_Thai' => 'required',
            'Description' => 'required',

        ]);

        $Dormitory->Name_Eng = $request->Name_Eng;
        $Dormitory->Name_Thai = $request->Name_Thai;
        $Dormitory->Description = $request->Description;

        $Dormitory->save();
        Session()->flash("success","เพื่มข้อมูลเรียบร้อยแล้ว!");
        return redirect('admin/dormitory');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dormitoryData =DB::table('Dormitory')
                    ->where('Dormitory.id','=',$id)
                    ->get();
        $dormitory = DB::table('Dormitory')
                    ->join('TypeRoom','TypeRoom.Dormitory_ID','=','Dormitory.id')
                    // ->select("*","Dormitory.id as DormitoryID")
                    ->select('*')
                    ->where('Dormitory.id','=',$id)
                    ->get();
        return view('admin/dormitory/show',compact('dormitory','dormitoryData'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dormitory = DB::table("Dormitory")->where('id','=',$id)->get();
        return view('admin/dormitory/edit',compact('dormitory'));
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
            'Name_Eng' => 'required',
            'Name_Thai' => 'required',
            'Description' => 'required',

        ]);

        DB::table('Dormitory')
            ->where('id','=',$id)
            ->update([
            'Name_Eng' => $request->Name_Eng,
            'Name_Thai' => $request->Name_Thai,
            'Description' => $request->Description,

        ]);
        Session()->flash("success","อัพเดทข้อมูลเรียบร้อยแล้ว!");
        return redirect('admin/dormitory');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        DB::table('Dormitory')->where('id','=',$id)->delete();
        Session()->flash("success","ลบข้อมูลเรียบร้อยแล้ว!");
        return redirect('admin/dormitory');
    }

    // public function roomtype($id)
    // {
    //     // DB::table('Dormitory')->where('id','=',$id)->delete();
    //     return redirect('admin/dormitory/roomtype',compact('dormitory'));
    // }
}
