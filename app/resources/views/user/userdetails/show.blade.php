@extends('layouts.admin')
@section('body')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <label style="font-size: 20px; font-weight: bold;" >ข้อมูลประเภทหอพัก </label>&nbsp;&nbsp;
                {{-- <a href="/admin/roomtype"> แสดงประเภทห้องพักทั้งหมด </a> --}}

            </div>
                @csrf

            <div class="form-inline">
                <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                    <strong for="Firstname_Eng" class="col-sm-2">รหัสประชาชน / หนังสือเดินทาง</strong>
                    <label>{{ $userdetails[0]->Code_ID}}</label>
                </div>

                <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                    <strong for="Firstname_Eng" class="col-sm-2">Name </strong>
                    <label >{{ $userdetails[0]->Firstname_Eng}}&nbsp;&nbsp;{{ $userdetails[0]->Lastname_Eng}}</label>
                </div>

                <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                    <strong for="Firstname_Eng" class="col-sm-2">ชื่อ-นามสกุล </strong>
                    <nav >{{ $userdetails[0]->Firstname_Thai}}&nbsp;&nbsp;{{ $userdetails[0]->Lastname_Thai}}</nav>
                </div>

                <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                    <strong for="Firstname_Eng" class="col-sm-2">สถานะ</strong>
                    <nav class="col-sm-2 text-left">{{ $userdetails[0]->Status}}</nav>
                    <strong for="Firstname_Eng" class="col-sm-2">รหัสนิสิต </strong>
                    <nav class="col-sm-2 text-left">{{ $userdetails[0]->Collegian_ID}}</nav>
                </div>

                <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                    <strong for="Gender" class="col-sm-2">เพศ </strong>
                    <nav class="col-sm-2 text-left">{{ $userdetails[0]->Gender}}</nav>
                    <strong for="Firstname_Eng" class="col-sm-2">วันเกิด </strong>
                    <nav class="col-sm-2 text-left">{{ $userdetails[0]->Birth_Date}}</nav>
                </div>

                <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                    <strong for="Gender" class="col-sm-2">E-mail </strong>
                    <nav class="col-sm-2" > </nav>
                    <strong for="Firstname_Eng" class="col-sm-2">เบอร์โทร </strong>
                    <nav class="col-sm-2 text-left">{{ $userdetails[0]->Phone}}</nav>
                </div>

                <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                    <strong for="Gender" class="col-sm-2">เชื้อชาติ </strong>
                    <nav class="col-sm-2" >{{ $userdetails[0]->ethnicity}}</nav>
                    <strong for="Firstname_Eng" class="col-sm-2">สัญชาติ </strong>
                    <nav class="col-sm-2">{{ $userdetails[0]->nationality}}</nav>
                    <strong for="Firstname_Eng" class="col-sm-2">ศาสนา </strong>
                    <nav class="col-sm-2">{{ $userdetails[0]->religion}}</nav>
                </div>

                <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                    <strong for="Gender" class="col-sm-2">ที่อยุ่ </strong>
                    <nav class="col-sm-4" >{{ $userdetails[0]->Address}}</nav>
                </div>

                <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                    <strong for="Firstname_Eng" class="col-sm-2">ตำบล </strong>
                    <nav class="col-sm-2">{{ $userdetails[0]->Amphures}}</nav>
                    <strong for="Gender" class="col-sm-2">อำเภอ / เขต </strong>
                    <nav class="col-sm-2" >{{ $userdetails[0]->Districts}}</nav>
                    <strong for="Firstname_Eng" class="col-sm-2">จังหวัด </strong>
                    <nav class="col-sm-2">{{ $userdetails[0]->Provinces}}</nav>
                </div>

                <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                    <strong for="Firstname_Eng" class="col-sm-2">ประเทศ </strong>
                    <nav class="col-sm-2">{{ $userdetails[0]->country}}</nav>

                </div>

            </div>
        </div>


    </div>
</div>
@endsection
