@extends('layouts.admin')
@section('body')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <div class="card">
            <div class="card-header">ข้อมูลผู้อยู่อาศัย
                {{-- <a href="#"> โอนเงิน </a> --}}
                {{-- <a  class="btn btn-success mr-2 "
                    style="position:absolute ; right:0 ; top:5px"
                    href="rooms/create" >เพิ่มห้องพัก
                    href="{{ route('rooms.create',$dormitory[0]->id.":".$type) }}" >เพิ่มหอพัก
                </a> --}}
            </div>
                @csrf

            <div class="form-inline">
                <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                    <label for="Code_ID" class="col-sm-2">รหัสห้อง </label>
                    <input type="text" class="form-control col-sm-4" value=" {{ $room[0]->RoomCode_ID }}" readonly>
                    <label for="Code_ID" class="col-sm-2">ชั้น </label>
                    <input type="text" class="form-control col-sm-4" value=" {{ $room[0]->Floor }}" readonly>
                </div>
                <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                    <label for="Code_ID" class="col-sm-2">หอพัก </label>
                    <input type="text" class="form-control col-sm-4" value=" {{ $room[0]->Name_Thai }}" readonly>
                    <label for="Code_ID" class="col-sm-2">ประเภทห้อง </label>
                    <input type="text" class="form-control col-sm-4"
                    @if($room[0]->Type == 1  )
                        value="ห้องปรับอากาศ "
                    @else
                        value="ห้องพัดลม  "
                    @endif
                    readonly>
                </div>
                <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                    <label for="Code_ID" class="col-sm-2">ประเภทห้อง </label>
                    <input type="text" class="form-control col-sm-10" value=" {{ $room[0]->Description }}" readonly>

                </div>

            <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
            <table class="table" border="0">
                <thead class="thead-dark">
                    <th><center>#</center></th>
                    <th><center>รหัสนิสิต </center></th>
                    <th><center>ชื่อ</center></th>
                    <th><center>นามสกุล</center></th>
                    {{-- <th><center>สถานะ</center></th> --}}
                    <th><center>การดำเนินการ</center></th>

                    {{-- <th>Operation </th> --}}
                </thead>
                <?php   $i=1;?>
                <tbody>
                    @if(sizeof($user) != 0)
                        @foreach($user as $user)
                            <tr>
                                <td>{{ $i++ }} </td>
                                {{-- <td>{{ $user->User_ID }} </td> --}}
                                <td>{{ $user->Collegian_ID }} </td>
                                <td>{{ $user->Firstname_Thai }} </td>
                                <td>{{ $user->Lastname_Thai }} </td>

                                <td>
                                    <center>
                                    <a class="btn btn-primary" href="{{ route('UserDetail.show',$user->id) }}" >แสดงข้อมูล</a>
                                    </center>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5"><h4 style="text-align:center"><label style="color: #ff5050"> --- ไม่มีข้อมูลผู้อาศัย ---</label></h4></td>
                        </tr>
                    @endif
                </tbody>
            </table>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection
