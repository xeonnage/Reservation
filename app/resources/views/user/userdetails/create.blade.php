
@extends('layouts.app')
@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="table-responsive">
        {{-- @if( sizeof($roomtype) == 0) --}}
            {{Auth::user()->id }}
            <p><h2>เพื่มข้อมูลประวัติส่วนตัว </h2></p>
            <form action="{{ route('UserDetail.store') }}" method="post">
            {{-- <form action="/user/UserDetail/create" method="post" > --}}
                {{csrf_field()}}
                <div class="form-inline">
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                       <label for="Code_ID" class="col-sm-2">รหัสประชาชน / หนังสือเดินทาง <label style="color:red;"> * </label></label>
                        <input type="text" class="form-control col-sm-10" name="Code_ID" id="Code_ID" placeholder=" ">
                    </div>

                    <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                        <label style="text-align:left" for="Firstname_Eng" class="col-sm-2">Firstname <label style="color:red;"> * </label></label>
                        <input type="text" class="form-control col-sm-4" name="Firstname_Eng" id="Firstname_Eng" placeholder=" ">

                        <label for="Lastname_Eng" class="col-sm-2">Lastname <label style="color:red;"> * </label></label>
                        <input type="text" class="form-control col-sm-4" name="Lastname_Eng" id="Lastname_Eng" placeholder=" ">
                    </div>

                    <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                        <label for="Firstname_Thai" class="col-sm-2">ชื่อจริง <label style="color:red;"> * </label></label>
                        <input type="text" class="form-control col-sm-4" name="Firstname_Thai" id="Firstname_Thai" placeholder=" ">

                        <label for="Lastname_Thai" class="col-sm-2">นามสกุล <label style="color:red;"> * </label></label>
                        <input type="text" class="form-control col-sm-4" name="Lastname_Thai" id="Lastname_Thai" placeholder=" ">
                    </div>

                    <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                        <label for="Status" class="col-sm-2">สถานะ  <label style="color:red;"> * </label></label>
                        <div class = "col-sm-4">
                            <select class="form-control " name="Status">
                                <option value="">โปรดเลือกสถานะของท่าน</option>
                                <option value="นิสิตนักศึกษา">นิสิตนักศึกษา</option>
                                <option value="อาจารย์">อาจารย์</option>
                                <option value="บุคคลภายนอก">บุคคลภายนอก</option>
                            </select>
                        </div>
                        {{-- <input type="text" class="form-control col-sm-4" name="Status" id="Status" placeholder=" "> --}}

                        <label for="Collegian_ID" class="col-sm-2">รหัสนิสิต <label style="color:red;"> * </label></label>
                        <input type="text" class="form-control col-sm-4" name="Collegian_ID" id="Collegian_ID" placeholder=" ">
                    </div>

                    <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                        <label for="Gender" class="col-sm-2">เพศ  <label style="color:red;"> * </label></label>
                        <div class = "col-sm-4">
                            <select class="form-control " name="Gender">
                                <option value="">โปรดเลือกเพศของท่าน</option>
                                <option value="เพศชาย">เพศชาย</option>
                                <option value="เพศหญิง">เพศหญิง</option>
                            </select>
                        </div>
                        {{-- <input type="text" class="form-control col-sm-4" name="Gender" id="Gender" placeholder=" "> --}}

                        <label for="Birth_Date" class="col-sm-2 text-left">วันเกิด <label style="color:red;"> * </label></label>
                        <input type="date" class="form-control col-sm-4" name="Birth_Date" id="Birth_Date" placeholder=" ">
                    </div>

                    <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                        <label for="ethnicity" class="col-sm-2" Style = "text-align:left">เชื้อชาติ  <label style="color:red;"> * </label></label>
                        <input type="text" class="form-control col-sm-2" name="ethnicity" id="ethnicity" placeholder=" ">

                        <label for="nationality" class="col-sm-2">สัญชาติ <label style="color:red;"> * </label></label>
                        <input type="text" class="form-control col-sm-2" name="nationality" id="nationality" placeholder=" ">

                        <label for="religion" class="col-sm-2">ศาสนา <label style="color:red;"> * </label></label>
                        <input type="text" class="form-control col-sm-2" name="religion" id="religion" placeholder=" ">
                    </div>

                    <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                        <label for="Faculty" class="col-sm-2">คณะ  <label style="color:red;"> * </label></label>
                        <input type="text" class="form-control col-sm-2" name="Faculty" id="Faculty" placeholder=" ">

                        <label for="Major" class="col-sm-2">สาขา <label style="color:red;"> * </label></label>
                        <input type="text" class="form-control col-sm-2" name="Major" id="Major" placeholder=" ">

                        <label for="Level" class="col-sm-2">ชั้นปี <label style="color:red;"> * </label></label>
                        <input type="text" class="form-control col-sm-2" name="Level" id="Level" placeholder=" ">
                    </div>

                    <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                        <label for="Phone" class="col-sm-2">เบอร์โทร  <label style="color:red;"> * </label></label>
                        <input type="text" class="form-control col-sm-4" name="Phone" id="Phone" placeholder=" ">

                        <label for="Address" class="col-sm-2">ที่อยุ่ <label style="color:red;"> * </label></label>
                        <input type="text" class="form-control col-sm-4" name="Address" id="Address" placeholder=" ">
                    </div>

                    <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                        <label for="Amphures" class="col-sm-2">ตำบล  <label style="color:red;"> * </label></label>
                        <input type="text" class="form-control col-sm-4" name="Amphures" id="Amphures" placeholder=" ">

                        <label for="Districts" class="col-sm-2">อำเภอ / เขต <label style="color:red;"> * </label></label>
                        <input type="text" class="form-control col-sm-4" name="Districts" id="Districts" placeholder=" ">
                    </div>

                    <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                        <label for="Provinces" class="col-sm-2">จังหวัด  <label style="color:red;"> * </label></label>
                        <input type="text" class="form-control col-sm-4" name="Provinces" id="Provinces" placeholder=" ">

                        <label for="country" class="col-sm-2">ประเทศ <label style="color:red;"> * </label></label>
                        <input type="text" class="form-control col-sm-4" name="country" id="country" placeholder=" ">
                    </div>



                    <button type="submit" name="submit" class="btn btn-success col-sm-2 my-3">ยืนยัน</button>
                </div>
                {{-- <button class="btn btn-secondary" type="reset">ยกเลิก</button> --}}
            </form>
        </div>

    </div>
</div>
@endsection
