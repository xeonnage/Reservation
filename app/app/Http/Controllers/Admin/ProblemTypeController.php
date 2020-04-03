<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ProblemTypeModel;
use DB;
use Symfony\Component\HttpFoundation\Session\Session;

class ProblemTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $problemtype = ProblemTypeModel::all();
        $problemtype = DB::table('ProblemType')
                        ->get();
        return view('admin.problemtype.create',compact('problemtype'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.problemtype.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $problemtype = new ProblemTypeModel;

        $request->validate([
            'ProblemName' => 'required|unique:ProblemType',
        ]);

        $problemtype->ProblemName = $request->ProblemName;

        $problemtype->save();
        Session()->flash("success","เพื่มข้อมูลเรียบร้อยแล้ว!");
        return redirect('/admin/Problemtype');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
        $problemtype = DB::table("ProblemType")
                        ->where('id','=',$id)->get();
        return view('admin.problemtype.edit',compact('problemtype'));
        // return view('admin.problemtype.edit',['problemtype'=> $problemtype]);

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
            'ProblemName' => 'required|unique:ProblemType',
        ]);

        DB::table('ProblemType')
            ->where('id','=',$id)
            ->update([
            'ProblemName' => $request->ProblemName,
        ]);
        Session()->flash("success","อัพเดทข้อมูลเรียบร้อยแล้ว!");
        return redirect('/admin/Problemtype');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // ProblemTypeModel::destroy($id);
        Session()->flash("success","ลบข้อมูลเรียบร้อยแล้ว!");
        DB::table('ProblemType')->where('id','=',$id)->delete();
        return redirect('/admin/problemtype');
    }
    public function delete($id)
    {
        ProblemTypeModel::destroy($id);
        Session()->flash("success","ลบข้อมูลเรียบร้อยแล้ว!");
        return redirect('/admin/Problemtype');
    }
}
