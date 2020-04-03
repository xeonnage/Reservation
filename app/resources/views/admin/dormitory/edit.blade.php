@extends('layouts.admin')
@section('body')
@foreach($dormitory as $dorm)
@endforeach
<div class="table-responsive">

    <p><h2>แก้ไข้ข้อมูล หอพักนิสิต</h2></p>
    <form action="{{ route('dormitory.update',$dorm->id) }}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        @method('PUT')


        <div class="form-group">
            <label for="Name_EN">ชื่อหอพักภาษาอังกฤษ <label style="color:red;"> * </label></label>
            <input type="text" class="form-control" name="Name_Eng" id="Name_Eng" value="{{ $dorm->Name_Eng }}">
        </div>
        <div class="form-group">
            <label for="Name_TH">ชื่อหอพักภาษาไทย <label style="color:red;"> * </label></label>
            <input type="text" class="form-control" name="Name_Thai" id="Name_Thai" value="{{ $dorm->Name_Thai }}">
        </div>
        <div class="form-group">
            <label for="Description">ประเภทหอพัก <label style="color:red;"> * </label></label>
            <div {{-- class = "col-sm-4" --}}>
                <select class="form-control" name="Description">
                    <option value="{{ $dorm->Description }}">สถานะปัจบัน: {{ $dorm->Description }} </option>
                    <option value="หอพักนิสิต ชาย">แก้ไขเป็น: หอพักนิสิต ชาย</option>
                    <option value="หอพักนิสิต หญิง">แก้ไขเป็น: หอพักนิสิต หญิง</option>
                </select>
            </div>
            {{-- <input type="text" class="form-control" name="Description" id="Description" placeholder="ประเภท"> --}}
        </div>


        <button type="submit" name="submit" class="btn btn-warning">แก้ไขข้อมูล</button>
        <button class="btn btn-secondary" type="reset">ยกเลิก</button>


</div>
@endsection
