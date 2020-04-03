
@extends('layouts.admin')
@section('body')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <div class="card">
            <div class="card-header">หอพักนิสิต
                {{-- <a href="#"> โอนเงิน </a> --}}
                <a  class="btn btn-success mr-2 "
                    style="position:absolute ; right:0 ; top:5px"
                    href="dormitory/create" >เพิ่มหอพัก
                </a>
            </div>
                @csrf

        <body {{--class="text-center"--}} style="">

            <table class="table" border="0">
                <thead>
                    <th><center>#ID</center></th>
                    <th><center>ชื่อหอพัก ภาษาอังกฤษ</center></th>
                    <th><center>ชื่อหอพัก ภาษาไทย</center></th>
                    <th><center>ประเภทหอพัก</center></th>
                    <th><center>การดำเนินการ</center></th>

                    {{-- <th>Operation </th> --}}
                </thead>
                @foreach($dormitory as $dorm)
                <tbody>
                <tr>
                    <td>{{ $dorm->id}}</td>
                    <td>{{ $dorm->Name_Eng}}</td>
                    <td>{{ $dorm->Name_Thai}}</td>
                    <td>{{ $dorm->Description}}</td>

                    <td>
                        <center>
                        <form method="post" action="{{ route('dormitory.destroy',$dorm->id) }}">
                            @csrf

                            <a class="btn btn-primary" href="{{ route('dormitory.show',$dorm->id) }}" >แสดงข้อมูล</a>
                            <a class="btn btn-warning" href="{{ route('dormitory.edit',$dorm->id) }}" >แก้ไขข้อมูล</a>

                            @method('DELETE')
                            {{-- <button class="btn btn-danger" type="submit">ลบข้อมูล</button> --}}

                        </form>
                        </center>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        </div>
    </div>
</div>
@endsection
