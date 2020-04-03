
@extends('layouts.app')
@section('content')
@foreach($userdetail as $usdt)

@endforeach
<div class="container">
    <div class="row justify-content-center">
        <div class="table-responsive">
        {{-- @if( sizeof($roomtype) == 0) --}}
            {{Auth::user()->id }}
            <p><h2>แก้ไขมูลประวัติส่วนตัว </h2></p>
            <form action="{{ route('UserDetail.update',$usdt->user_ID) }}" method="post" >
            {{-- <form action="/user/UserDetail/update/{{$usdt->user_ID }}" method="post"> --}}

                {{csrf_field()}}
                @method('PUT')

                <div class="form-inline">
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                       <label for="Code_ID" class="col-sm-2">รหัสประชาชน / หนังสือเดินทาง <label style="color:red;"> * </label></label>
                        <input type="text" class="form-control col-sm-10" name="Code_ID" id="Code_ID" value="{{ $usdt->Code_ID }}">
                    </div>

                    <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                        <label style="text-align:left" for="Firstname_Eng" class="col-sm-2">Firstname <label style="color:red;"> * </label></label>
                        <input type="text" class="form-control col-sm-4" name="Firstname_Eng" id="Firstname_Eng" value="{{ $usdt->Firstname_Eng }}">

                        <label for="Lastname_Eng" class="col-sm-2">Lastname <label style="color:red;"> * </label></label>
                        <input type="text" class="form-control col-sm-4" name="Lastname_Eng" id="Lastname_Eng" value="{{ $usdt->Lastname_Eng }}">
                    </div>

                    <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                        <label for="Firstname_Thai" class="col-sm-2">ชื่อจริง <label style="color:red;"> * </label></label>
                        <input type="text" class="form-control col-sm-4" name="Firstname_Thai" id="Firstname_Thai" value="{{ $usdt->Firstname_Thai }}">

                        <label for="Lastname_Thai" class="col-sm-2">นามสกุล <label style="color:red;"> * </label></label>
                        <input type="text" class="form-control col-sm-4" name="Lastname_Thai" id="Lastname_Thai" value="{{ $usdt->Lastname_Thai }}">
                    </div>

                    <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                        <label for="Status" class="col-sm-2">สถานะ  <label style="color:red;"> * </label></label>
                        <div class = "col-sm-4">
                            <select class="form-control " name="Status">
                                <option value="{{ $usdt->Status }}">สถานะปัจุบัน {{ $usdt->Status }} </option>
                                <option value="นิสิตนักศึกษา">นิสิตนักศึกษา</option>
                                <option value="อาจารย์">อาจารย์</option>
                                <option value="บุคคลภายนอก">บุคคลภายนอก</option>
                            </select>
                        </div>
                        {{-- <input type="text" class="form-control col-sm-4" name="Status" id="Status"value="{{ $usdt->NumberPeople }}"> --}}

                        <label for="Collegian_ID" class="col-sm-2">รหัสนิสิต <label style="color:red;"> * </label></label>
                        <input type="text" class="form-control col-sm-4" name="Collegian_ID" id="Collegian_ID"value=" {{ $usdt->Collegian_ID }}">
                    </div>

                    <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                        <label for="Gender" class="col-sm-2">เพศ  <label style="color:red;"> * </label></label>
                        <div class = "col-sm-4">
                            <select class="form-control " name="Gender">
                                <option value="{{ $usdt->Gender }}">สถานะปัจุบัน {{ $usdt->Gender }}</option>
                                <option value="เพศชาย">เพศชาย</option>
                                <option value="เพศหญิง">เพศหญิง</option>
                            </select>
                        </div>
                        {{-- <input type="text" class="form-control col-sm-4" name="Gender" id="Gender"value="{{ $usdt->NumberPeople }}"> --}}

                        <label for="Birth_Date" class="col-sm-2 text-left">วันเกิด <label style="color:red;"> * </label></label>
                        <input  class="form-control col-sm-4" name="Birth_Date" id="Birth_Date" value=" {{ $usdt->Birth_Date }}" >
                        {{-- <input  class="form-control col-sm-4" name="Birth_Date" id="Birth_Date" value=" {{ date('y-m-d', strtotime($usdt->Birth_Date))  }}" > --}}
                    </div>

                    <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                        <label for="ethnicity" class="col-sm-2" Style = "text-align:left">เชื้อชาติ  <label style="color:red;"> * </label></label>
                        <input type="text" class="form-control col-sm-2" name="ethnicity" id="ethnicity" value="{{ $usdt->ethnicity }}">

                        <label for="nationality" class="col-sm-2">สัญชาติ <label style="color:red;"> * </label></label>
                        <input type="text" class="form-control col-sm-2" name="nationality" id="nationality" value="{{ $usdt->nationality }}">

                        <label for="religion" class="col-sm-2">ศาสนา <label style="color:red;"> * </label></label>
                        <input type="text" class="form-control col-sm-2" name="religion" id="religion" value="{{ $usdt->religion }}">
                    </div>

                    <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                        <label for="Faculty" class="col-sm-2">คณะ  <label style="color:red;"> * </label></label>
                        <input type="text" class="form-control col-sm-2" name="Faculty" id="Faculty" value="{{ $usdt->Faculty }}">

                        <label for="Major" class="col-sm-2">สาขา <label style="color:red;"> * </label></label>
                        <input type="text" class="form-control col-sm-2" name="Major" id="Major" value="{{ $usdt->Major }}">

                        <label for="Level" class="col-sm-2">ชั้นปี <label style="color:red;"> * </label></label>
                        <input type="text" class="form-control col-sm-2" name="Level" id="Level" value="{{ $usdt->Level }}">
                    </div>

                    <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                        <label for="Phone" class="col-sm-2">เบอร์โทร  <label style="color:red;"> * </label></label>
                        <input type="text" class="form-control col-sm-4" name="Phone" id="Phone" value="{{ $usdt->Phone }}">

                        <label for="Address" class="col-sm-2">ที่อยุ่ <label style="color:red;"> * </label></label>
                        <input type="text" class="form-control col-sm-4" name="Address" id="Address" value="{{ $usdt->Address }}">
                    </div>

                    <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                        <label for="Amphures" class="col-sm-2">ตำบล  <label style="color:red;"> * </label></label>
                        <input type="text" class="form-control col-sm-4" name="Amphures" id="Amphures" value="{{ $usdt->Amphures }}">

                        <label for="Districts" class="col-sm-2">อำเภอ / เขต <label style="color:red;"> * </label></label>
                        <input type="text" class="form-control col-sm-4" name="Districts" id="Districts" value="{{ $usdt->Districts }}">
                    </div>

                    <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                        <label for="Provinces" class="col-sm-2">จังหวัด  <label style="color:red;"> * </label></label>
                        <input type="text" class="form-control col-sm-4" name="Provinces" id="Provinces" value="{{ $usdt->Provinces }}">

                        <label for="country" class="col-sm-2">ประเทศ <label style="color:red;"> * </label></label>
                        <input type="text" class="form-control col-sm-4" name="country" id="country" value="{{ $usdt->country }}">
                    </div>


                    <button type="submit" name="submit" class="btn btn-warning col-sm-2 my-3">แก้ไขมูล</button>
                    <button class="btn btn-secondary" type="reset">ยกเลิก</button>
                </div>
                {{-- <button class="btn btn-secondary" type="reset">หยกเลิก</button> --}}
            </form>
        </div>

    </div>
</div>
@endsection
