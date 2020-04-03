<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\UserDetailModel;
use App\User;

use DB;

class UserDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userdetails = DB::table('UserDetails')
                        ->get();
        return view('admin.userdetails.index',compact('userdetails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( )
    {
        // $users = DB::table('users')
        //     ->join('users','users.email','=','UserDetails.email_ID')
        //     ->select('*')
        //     ->whereColumn('users.email','=','UserDetails.email_ID')
        //     ->get();

        $user = DB::table('users')->get();
        return view('user.userdetails.create',compact('user'));
        // return view('user.userdetails.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userdetails = new UserDetailModel;
        $request->validate([
            // 'email_ID' => 'required',
            'Code_ID' => 'required|unique:UserDetails', //รหัสประชาชน
            'Status' => 'required',//สถานะ นิสิต/บุคคลทั่วไป
            // 'Collegian_ID' => 'required|unique:UserDetails',//รหัสนิสิต
            'Firstname_Thai' => 'required',//ชืื่อ ไทย
            'Lastname_Thai' => 'required',//นามสกุล ไทย
            'Firstname_Eng' => 'required',//ชื่อ อิ้ง
            'Lastname_Eng' => 'required',//นามสกุล อิ้ง
            'Gender' => 'required',//เพศ
            'ethnicity' => 'required',//เชื้อชาติ
            'nationality' => 'required',//สัญชาติ
            'religion' => 'required',//ศาสนา
            'Birth_Date' => 'required',//วันเกิด
            'Phone' => 'required',//เบอร์โทร
            // 'Faculty' => 'required',//คณะ
            // 'Major' => 'required',//สาขา
            // 'Level' => 'required',//ชั้นปี
            'Address' => 'required',//ที่อยุ่
            'Amphures' => 'required',//ตำบล
            'Districts' => 'required',//อำเภอ
            'Provinces' => 'required',//จังหวัด
            'country' => 'required',//ประเทศ
        ]);
        $userdetails->user_ID = Auth::user()->id ;
        $userdetails->Code_ID = $request->Code_ID;//รหัสประชาชน
        $userdetails->Status = $request->Status;//สถานะ นิสิต/บุคคลทั่วไป
        $userdetails->Collegian_ID = $request->Collegian_ID;//รหัสนิสิต
        $userdetails->Firstname_Thai = $request->Firstname_Thai;//ชืื่อ ไทย
        $userdetails->Lastname_Thai = $request->Lastname_Thai;//นามสกุล ไทย
        $userdetails->Firstname_Eng = $request->Firstname_Eng;//ชื่อ อิ้ง
        $userdetails->Lastname_Eng = $request->Lastname_Eng;//นามสกุล อิ้ง
        $userdetails->Gender = $request->Gender;//เพศ
        $userdetails->ethnicity = $request->ethnicity;//เชื้อชาติ
        $userdetails->nationality = $request->nationality;//สัญชาติ
        $userdetails->religion = $request->religion;//ศาสนา
        $userdetails->Birth_Date = $request->Birth_Date;//วันเกิด
        $userdetails->Phone = $request->Phone;//เบอร์โทร
        $userdetails->Faculty = $request->Faculty;//คณะ
        $userdetails->Major = $request->Major;//สาขา
        $userdetails->Level = $request->Level;//ชั้นปี
        $userdetails->Address = $request->Address;//ที่อยุ่
        $userdetails->Amphures = $request->Amphures;//ตำบล
        $userdetails->Districts = $request->Districts;//อำเภอ
        $userdetails->Provinces = $request->Provinces;//จังหวัด
        $userdetails->country = $request->country;//ประเทศ

        $userdetails->save();
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
        $userdetails = DB::table('UserDetails')
                        ->where('id','=',$id)
                        ->get();
        return view('user.userdetails.show',compact('userdetails'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $problemtype = find($id);
        $id = Auth::user()->id;

        $userdetail = DB::table('UserDetails')
                        // ->join('users','users.id','=','UserDetails.user_ID')
                        // ->selcet('*')
                        ->where('user_ID','=',$id)
                        ->get();
        return view('user.userdetails.edit',compact('userdetail'));


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
            // 'user_ID'=> $request->Auth::user()->id,
            'Code_ID' => 'required|unique:UserDetails', //รหัสประชาชน
            'Status' => 'required',//สถานะ นิสิต/บุคคลทั่วไป
            'Collegian_ID' => 'required|unique:UserDetails',//รหัสนิสิต
            'Firstname_Thai' => 'required',//ชืื่อ ไทย
            'Lastname_Thai' => 'required',//นามสกุล ไทย
            'Firstname_Eng' => 'required',//ชื่อ อิ้ง
            'Lastname_Eng' => 'required',//นามสกุล อิ้ง
            'Gender' => 'required',//เพศ
            'ethnicity' => 'required',//เชื้อชาติ
            'nationality' => 'required',//สัญชาติ
            'religion' => 'required',//ศาสนา
            'Birth_Date' => 'required',//วันเกิด
            'Phone' => 'required',//เบอร์โทร
            'Faculty' => 'required',//คณะ
            'Major' => 'required',//สาขา
            'Level' => 'required',//ชั้นปี
            'Address' => 'required',//ที่อยุ่
            'Amphures' => 'required',//ตำบล
            'Districts' => 'required',//อำเภอ
            'Provinces' => 'required',//จังหวัด
            'country' => 'required',//ประเทศ
        ]);

        DB::table('UserDetails')
            ->where('user_ID','=',$id)
            ->update([
            // 'user_ID'=> $request->user_ID,
            'Code_ID' => $request->Code_ID,//รหัสประชาชน
            'Status' => $request->Status,//สถานะ นิสิต/บุคคลทั่วไป
            'Collegian_ID' => $request->Collegian_ID,//รหัสนิสิต
            'Firstname_Thai' => $request->Firstname_Thai,//ชืื่อ ไทย
            'Lastname_Thai' => $request->Lastname_Thai,//นามสกุล ไทย
            'Firstname_Eng' => $request->Firstname_Eng,//ชื่อ อิ้ง
            'Lastname_Eng' => $request->Lastname_Eng,//นามสกุล อิ้ง
            'Gender' => $request->Gender,//เพศ
            'ethnicity' => $request->ethnicity,//เชื้อชาติ
            'nationality' => $request->nationality,//สัญชาติ
            'religion' => $request->religion,//ศาสนา
            'Birth_Date' => $request->Birth_Date,//วันเกิด
            'Phone' => $request->Phone,//เบอร์โทร
            'Faculty' => $request->Faculty,//คณะ
            'Major' => $request->Major,//สาขา
            'Level' => $request->Level,//ชั้นปี
            'Address' => $request->Address,//ที่อยุ่
            'Amphures' => $request->Amphures,//ตำบล
            'Districts' => $request->Districts,//อำเภอ
            'Provinces' => $request->Provinces,//จังหวัด
            'country' => $request->country,//ประเทศ
        ]);
        // $userdetail=UserDetailModel::find($id);

        Session()->flash("success","อัพเดทข้อมูลเรียบร้อยแล้ว!");

        return redirect('user/UserDetail/create');
        // return view('home');
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
    public function delete($id)
    {
        UserDetailModel::destroy($id);
        // return redirect('/user/UserDetail');
    }
}
