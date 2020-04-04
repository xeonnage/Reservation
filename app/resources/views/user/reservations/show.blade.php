
@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <div class="card">
            <div class="card-header">ข้อมูลการจองห้องของผู้ใช้ </div>
                @csrf


            <div class="form-inline">
                <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                    <nav for="Firstname_Eng" class="col-sm-2">ห้องที่จอง</nav>
                    <input type="text" class="form-control col-sm-8" value=" {{ $Reservations[0]->RoomCode_ID }}" readonly>
                </div>

                <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">


                    <nav for="Firstname_Eng" class="col-sm-2">ชั้น</nav>
                    <input type="text" class="form-control col-sm-8" value="  {{ $Reservations[0]->Floor }}" readonly>
                </div>

                <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                    <nav for="Firstname_Eng" class="col-sm-2">ประเภทห้อง</nav>
                    <input type="text" class="form-control col-sm-8"
                        @if( $Reservations[0]->Type  == 1)
                            value="ห้องปรับอากาศ "
                        @else
                            value="ห้องพัดลม"
                        @endif readonly>
                </div>

                <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                    <nav for="Firstname_Eng" class="col-sm-2">ชื่อหอพัก</nav>
                    <input type="text" class="form-control col-sm-8" value="  {{ $Reservations[0]->Name_Thai }}" readonly>
                </div>


                <div class="form-group col-xs-12 col-sm-12 col-md-12 my-4"><center>
                    <a class="btn btn-primary" href="/home" >หน้าหลัก</a>
                    </center>
                </div>

            </div>
        </div>


    </div>
</div>
@endsection
