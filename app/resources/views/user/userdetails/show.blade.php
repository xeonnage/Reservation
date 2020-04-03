@extends('layouts.admin')
@section('body')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <div class="card">
            <div class="card-header">ข้อมูลผู้ใช้ </div>
                @csrf

            <div class="form-inline">
                <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                    <nav for="Firstname_Eng" class="col-sm-2">รหัสประชาชน / หนังสือเดินทาง</nav>
                    <nav>{{ $userdetails[0]->Code_ID}}</nav>
                </div>

                <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                    <nav for="Firstname_Eng" class="col-sm-2">Name </nav>
                    <nav >{{ $userdetails[0]->Firstname_Eng}}&nbsp;&nbsp;&nbsp;&nbsp;{{ $userdetails[0]->Lastname_Eng}}</nav>
                </div>

                <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                    <nav for="Firstname_Eng" class="col-sm-2">ชื่อ-นามสกุล </nav>
                    <nav >{{ $userdetails[0]->Firstname_Thai}}&nbsp;&nbsp;&nbsp;&nbsp;{{ $userdetails[0]->Lastname_Thai}}</nav>
                </div>

                <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                    <nav for="Firstname_Eng" class="col-sm-2">สถานะ</nav>
                    <nav class="col-sm-2 text-left">{{ $userdetails[0]->Status}}</nav>
                    <nav for="Firstname_Eng" class="col-sm-2">รหัสนิสิต </nav>
                    <nav class="col-sm-2 text-left">{{ $userdetails[0]->Collegian_ID}}</nav>
                </div>

                <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                    <nav for="Gender" class="col-sm-2">เพศ </nav>
                    <nav class="col-sm-2 text-left">{{ $userdetails[0]->Gender}}</nav>
                    <nav for="Firstname_Eng" class="col-sm-2">วันเกิด </nav>
                    <nav class="col-sm-2 text-left">{{ $userdetails[0]->Birth_Date}}</nav>
                </div>

                <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                    <nav for="Gender" class="col-sm-2">E-mail </nav>
                    <nav class="col-sm-2" > </nav>
                    <nav for="Firstname_Eng" class="col-sm-2">เบอร์โทร </nav>
                    <nav class="col-sm-2 text-left">{{ $userdetails[0]->Phone}}</nav>
                </div>

                <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                    <nav for="Gender" class="col-sm-2">เชื้อชาติ </nav>
                    <nav class="col-sm-2" >{{ $userdetails[0]->ethnicity}}</nav>
                    <nav for="Firstname_Eng" class="col-sm-2">สัญชาติ </nav>
                    <nav class="col-sm-2">{{ $userdetails[0]->nationality}}</nav>
                    <nav for="Firstname_Eng" class="col-sm-2">ศาสนา </nav>
                    <nav class="col-sm-2">{{ $userdetails[0]->religion}}</nav>
                </div>

                <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                    <nav for="Gender" class="col-sm-2">ที่อยุ่ </nav>
                    <nav class="col-sm-4" >{{ $userdetails[0]->Address}}</nav>
                </div>

                <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                    <nav for="Firstname_Eng" class="col-sm-2">ตำบล </nav>
                    <nav class="col-sm-2">{{ $userdetails[0]->Amphures}}</nav>
                    <nav for="Gender" class="col-sm-2">อำเภอ / เขต </nav>
                    <nav class="col-sm-2" >{{ $userdetails[0]->Districts}}</nav>
                    <nav for="Firstname_Eng" class="col-sm-2">จังหวัด </nav>
                    <nav class="col-sm-2">{{ $userdetails[0]->Provinces}}</nav>
                </div>

                <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                    <nav for="Firstname_Eng" class="col-sm-2">ประเทศ </nav>
                    <nav class="col-sm-2">{{ $userdetails[0]->country}}</nav>

                </div>

            </div>
        </div>


    </div>
</div>
@endsection
