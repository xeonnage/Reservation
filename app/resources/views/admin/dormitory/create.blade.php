@extends('layouts.admin')
@section('body')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                {{-- {{Session()->get('success')}} --}}
            @endforeach
        </ul>
    </div>
@endif

<div class="table-responsive">
    <p><h2>เพื่มข้อมูล หอพักนิสิต</h2></p>
    <form action="{{ route('dormitory.store') }}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
            <label for="Name_EN">ชื่อหอพักภาษาอังกฤษ <label style="color:red;"> * </label></label>
            <input type="text" class="form-control" name="Name_Eng" id="Name_Eng" placeholder="Tao-Thong Student Dormitory">
        </div>
        <div class="form-group">
            <label for="Name_TH">ชื่อหอพักภาษาไทย <label style="color:red;"> * </label></label>
            <input type="text" class="form-control" name="Name_Thai" id="Name_Thai" placeholder="หอพักนักศึกษา เทา-ทอง">
        </div>
        <div class="form-group">
            <label for="Description">ประเภทหอพัก <label style="color:red;"> * </label></label>
            <div {{-- class = "col-sm-4" --}}>
                <select class="form-control" name="Description">
                    <option value="">โปรดเลือกประเภทหอพัก</option>
                    <option value="หอพักนิสิต ชาย">หอพักนิสิต ชาย</option>
                    <option value="หอพักนิสิต หญิง">หอพักนิสิต หญิง</option>
                </select>
            </div>
            {{-- <input type="text" class="form-control" name="Description" id="Description" placeholder="ประเภท"> --}}
        </div>

        <button type="submit" name="submit" class="btn btn-success">เพื่มข้อมูล</button>
        <button class="btn btn-secondary" type="reset">ยกเลิก</button>
    </form>
</div>
@endsection
