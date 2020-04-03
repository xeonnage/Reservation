@extends('layouts.admin')
@section('body')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="table-responsive">
    <p><h2>เพื่มข้อมูล ประเภทห้องพัก</h2></p>
    <form action="{{ route('roomtype.store') }}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        {{-- <div class="form-group">
            <label for="TypeName">ประเภทห้องพัก <font style="color:red;"> * </font></label>
            <input type="text" class="form-control" name="TypeName" id="TypeName" placeholder="ห้องพักปรับอากาศ ">
        </div> --}}

        <div class="form-group">
            <label for="Description">ชื่อหอพัก <label style="color:red;"> * </label></label>
            <div {{-- class = "col-sm-4" --}}>
                <select class="form-control" name="Dormitory_ID">
                    <option value="" ><label style="color:brown" >กรุณาเลือกหอพัก</label></option>
                    @foreach($dormitory as $dormitory)
                    <option value = "{{$dormitory->id}}">
                        {{$dormitory->Name_Thai}}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="Description">ประเภทห้องพัก <label style="color:red;"> * </label></label>
            <div {{-- class = "col-sm-4" --}}>
                <select class="form-control" name="Type">
                    <option value="">โปรดเลือกประเภทห้องพัก</option>
                    <option value="1">ห้องปรับอากาศ</option>
                    <option value="2">ห้องพัดลม</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="Name_TH">จำนวนคนทั้งหมด/ห้อง <label style="color:red;"> * </label></label>
            <input type="text" class="form-control" name="NumberPeople" id="NumberPeople" placeholder="จำนวนคน : 4 คน ">
        </div>



        <button type="submit" name="submit" class="btn btn-success">เพื่มข้อมูล</button>
        <button class="btn btn-secondary" type="reset">ยกเลิก</button>
    </form>
</div>
@endsection
