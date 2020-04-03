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
                    <label for="Code_ID" class="col-sm-2">ประเภทห้อง </label>
                    <input type="text" class="form-control col-sm-4" value=" {{ $room[0]->Type }}" readonly>

                </div>
                <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                    <label for="Code_ID" class="col-sm-2">หอพัก </label>
                    <input type="text" class="form-control col-sm-4" value=" {{ $room[0]->Name_Thai }}" readonly>

                </div>

            <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
            <table class="table" border="0">
                <thead class="thead-dark">
                    <th><center>#</center></th>
                    <th><center>รหัสนิสิต </center></th>
                    <th><center>ชื่อ</center></th>
                    <th><center>นามสกุล</center></th>
                    <th><center>สถานะ</center></th>
                    <th><center>การดำเนินการ</center></th>

                    {{-- <th>Operation </th> --}}
                </thead>
                <?php   $i=1;?>

                </tbody>
            </table>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection
