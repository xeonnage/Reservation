@extends('layouts.admin')
@section('body')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <div class="card">
            <div class="card-header">ห้องพักทั้งหมด
                {{-- <a href="#"> โอนเงิน </a> --}}
                {{-- <a  class="btn btn-success mr-2 "
                    style="position:absolute ; right:0 ; top:5px"
                    href="rooms/create" >เพิ่มห้องพัก
                    href="{{ route('rooms.create',$dormitory[0]->id.":".$type) }}" >เพิ่มหอพัก
                </a> --}}
            </div>
                @csrf

        <body {{--class="text-center"--}} style="">

            <table class="table" border="0">
                <thead>
                    <th><center>#ลำดับ</center></th>
                    <th><center>เลขหอพัก</center></th>
                    <th><center>ชั้น</center></th>
                    <th><center>จำนวนคน</center></th>
                    <th><center>สถานะ</center></th>
                    <th><center>ประเภทห้องพัก </center></th>
                    <th><center>ชื่อหอพัก </center></th>
                    <th><center>การดำเนินการ</center></th>

                    {{-- <th>Operation </th> --}}
                </thead>
                <?php   $i=1;?>
                @foreach ($room as $rm)
            <tbody>
                    <td>{{ $i++ }}</td>
                    <td>{{ $rm->RoomCode_ID }}</td>
                    <td>{{ $rm->Floor }}</td>
                    <td>{{ $rm->NumberPeople }} คน/ห้อง</td>
                    <td>
                        @if( $rm->NumberPeople == $rm->AtNumberPreple )
                           <p style="color: #ff1a1a"> ห้องเต็ม</p>
                        @else
                           <p style="color: #00cc00"> ว่าง {{$rm->NumberPeople - $rm->AtNumberPreple}} ที่ </p>
                        @endif

                    </td>
                    <td>
                        @if( $rm->Type  == 1)
                            ห้องปรับอากาศ
                        @else
                            ห้องพัดลม
                        @endif
                        {{-- {{ $rm->Type }} --}}
                    </td>
                    <td>{{ $rm->Name_Thai }}</td>
                    <td>
                        <center>
                        <form method="post" action="{{ route('rooms.destroy',$rm->RoomCode_ID) }}">
                            @csrf

                            <a class="btn btn-warning width:40px" href="{{ route('rooms.edit',$rm->RoomCode_ID) }}" >แก้ไขข้อมูล</a>
                            @method('DELETE')
                            <button class="btn btn-danger width:40%" type="submit">ลบข้อมูล </button>

                        </form>
                        </center>
                    </td>

                @endforeach
                </tbody>
            </table>
        </div>
        </div>
    </div>
</div>
@endsection
