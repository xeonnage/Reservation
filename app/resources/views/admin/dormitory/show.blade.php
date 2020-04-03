@extends('layouts.admin')
@section('body')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <label style="font-size: 20px; font-weight: bold;" >ข้อมูลประเภทหอพัก </label>&nbsp;&nbsp;
                <a href="/admin/roomtype"> แสดงประเภทห้องพักทั้งหมด </a>
                <a  class="btn btn-success mr-2 "
                    style="position:absolute ; right:0 ; top:12px; text-align:right"
                    {{-- href="roomtype/create" >เพิ่มประเภทหอ --}}
                    href="/admin/roomtype/create" >เพิ่มประเภทหอพัก
                </a>
            </div>
                @csrf

        <body {{--class="text-center"--}} style="">

            <table class="table" border="0">
                <thead>
                    <tr>
                        <td>ชื่อหอพักภาษาอังกฤษ</td>
                        <td>{{ $dormitoryData[0]->Name_Eng}}</td>
                    </tr>
                    <tr>
                        <td>ชื่อหอพักภาษาไทย</td>
                        <td>{{ $dormitoryData[0]->Name_Thai}}</td>
                    </tr>
                    <tr>
                        <td>ประเภทหอพัก</td>
                        <td>{{ $dormitoryData[0]->Description}}</td>
                    </tr>
                </thead>
                <thead>
                    <th><center>#ลำดับ</center></th>
                    <th><center>ประเภทห้องพัก</center></th>
                    <th><center>จำนวนคน</center></th>

                    <th><center>การดำเนินการ</center></th>

                    {{-- <th>Operation </th> --}}
                </thead>
                <?php   $i=1;?>

                <tbody>
                    @if(sizeof($dormitory) != 0)
                        @foreach($dormitory as $dorm)
                            <tr>
                                <td>{{ $i++ }} </td>
                                <td>
                                    @if( $dorm->Type == 1 )
                                        ห้องปรับอากาศ
                                    @else
                                        ห้องพัดลม
                                    @endif
                                    {{-- {{ $dorm->Type}} --}}
                                </td>
                                <td><center>{{ $dorm->NumberPeople}} คน/ห้อง</center></td>
                                <td>
                                    <center>
                                    <form method="post" action="{{ route('dormitory.destroy',$dorm->id) }}">
                                        @csrf

                                        <a class="btn btn-primary" href="{{ route('roomtype.show',$dorm->Dormitory_ID.":".$dorm->Type ) }}" >แสดงข้อมูล</a>
                                        <a class="btn btn-warning" href="{{ route('dormitory.edit',$dorm->id) }}" >แก้ไขข้อมูล</a>

                                        @method('DELETE')
                                        {{-- <button class="btn btn-danger" type="submit">ลบข้อมูล</button> --}}

                                    </form>
                                    </center>
                                </td>

                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4"><h4 style="text-align:center"><label style="color: #ff5050"> --- ไม่มีข้อมูลประเภทหอพัก ---</label></h4></td>
                        </tr>
                    @endif
                </tbody>
            </table>

        </div>


    </div>
</div>
@endsection
