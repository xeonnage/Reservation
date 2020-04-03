@extends('layouts.admin')
@section('body')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <div class="card">
            <div class="card-header">ประเภทห้องพัก
                {{-- <a href="#"> โอนเงิน </a> --}}
                <a  class="btn btn-success mr-2 "
                    style="position:absolute ; right:0 ; top:5px"
                    href="roomtype/create" >เพิ่มประเภทห้อพัก
                </a>
            </div>
                @csrf

        <body {{--class="text-center"--}} style="">

            <table class="table" border="0">
                <thead>
                    <th><center>#ID</center></th>
                    <th><center>ชื่อหอพัก</center></th>
                    <th><center>ประเภทหอพัก</center></th>
                    <th><center>ประเภทห้องพัก</center></th>
                    <th><center>จำนวนคน </center></th>
                    <th><center>การดำเนินการ</center></th>

                    {{-- <th>Operation </th> --}}
                </thead>
                <?php   $i=1;?>
                @foreach($roomtype as $rmty)
                <tbody>
                <tr>
                    <td>{{ $i++ }} </td>
                    {{-- <td>{{ $rmty->id}}</td> --}}
                    {{-- <td>{{ $rmty->Dormitory_ID}}</td> --}}
                    <td>{{ $rmty->Name_Thai}}</td>
                    <td>{{ $rmty->Description}}</td>
                    <td>
                        @if( $rmty->Type  == 1)
                            ห้องปรับอากาศ
                        @else
                            ห้องพัดลม
                        @endif
                        {{-- {{$rmty->Type}} --}}
                    </td>
                    <td><center> {{ $rmty->NumberPeople}} คน/ห้อง </center></td>


                    <td>
                        <center>
                        <form method="post" action="{{ route('roomtype.destroy',$rmty->roomTypeId) }}">
                            @csrf

                            <a class="btn btn-warning width:40px" href="{{ route('roomtype.edit',$rmty->roomTypeId) }}" >แก้ไขข้อมูล</a>
                            @method('DELETE')
                            <button class="btn btn-danger width:40%" type="submit">ลบข้อมูล </button>

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
