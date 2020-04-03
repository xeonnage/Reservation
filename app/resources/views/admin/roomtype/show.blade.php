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

                    href="{{ route('rooms.create',$dormitory[0]->id.":".$type) }}" >เพิ่มหอพัก
                </a>
            </div>
                @csrf

        <body {{--class="text-center"--}} style="">

            <table class="table" border="0">
                <thead>
                    <tr>
                        <td>ชื่อหอพักภาษาอังกฤษ</td>
                        <td>{{ $dormitory[0]->Name_Eng}}</td>
                    </tr>
                    <tr>
                        <td>ชื่อหอพักภาษาไทย</td>
                        <td>{{ $dormitory[0]->Name_Thai}}</td>
                    </tr>
                    <tr>
                        <td>ประเภทหอพัก</td>
                        <td>{{ $dormitory[0]->Description}}</td>
                    </tr>
                    <tr>
                        <td>ประเภทหอห้องพัก</td>
                        <td>
                            @if ( $type == 1 )
                                ห้องปรับอากาศ
                            @else
                                ห้องพัดลม
                            @endif
                        </td>
                    </tr>
                </thead>
                <thead>
                    <th><center>#ลำดับ</center></th>
                    <th><center>เลขห้อง</center></th>
                    <th><center>ชั้น</center></th>
                    <th><center>จำนวนคน</center></th>
                    <th><center>สถานะ</center></th>
                    <th><center>การดำเนินการ</center></th>

                    {{-- <th>Operation </th> --}}
                </thead>
                <?php   $i=1;?>
                @if( sizeof($roomtype) != 0)
                @foreach($roomtype as $rmty)
                    <tbody>
                    <tr>
                        <td>{{ $i++ }} </td>
                        {{-- <td>{{ $rmty->id}}</td> --}}
                        {{-- <td>{{ $rmty->Dormitory_ID}}</td> --}}
                        <td>{{ $rmty->RoomCode_ID}}</td>
                        <td>{{ $rmty->Floor}}</td>
                        <td><center> {{$rmty->AtNumberPreple}} คน/ห้อง </center></td>
                        <td> {{ $rmty->StatusRoom}} </td>


                        <td>
                            <center>
                            <form method="post" action="{{ route('roomtype.destroy',$rmty->RoomCode_ID) }}">
                                @csrf

                                <a class="btn btn-warning width:40px" href="{{ route('roomtype.edit',$rmty->RoomCode_ID) }}" >แก้ไขข้อมูล</a>
                                @method('DELETE')
                                <button class="btn btn-danger width:40%" type="submit">ลบข้อมูล </button>

                            </form>
                            </center>
                        </td>
                    </tr>
                    </tbody>
                @endforeach
                @else
                <tr>
                    <td colspan="6"><h4 style="text-align:center"><label style="color: #ff5050"> --- ไม่มีข้อมูลประเภทหอพัก ---</label></h4></td>
                </tr>
                @endif
            </table>

        </div>


    </div>
</div>
@endsection
