
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
            {{Auth::user()->email }}

            <p><h2>จองหอห้อง</h2></p>
            <form action="{{ route('dormitory.store') }}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}


                <div class="form-inline">
                    <div class="form-group col-xs-10 col-sm-10 col-md-10 my-2">
                    <strong for="Description" class="col-sm-2">หอพัก <font style="color:red;"> * </font></strong>
                    <nav class = "col-sm-8">
                        <select class="form-control" name="RoomCode_ID">
                            <option value="" ><label style="color:brown" >กรุณาเลือกหอพัก</label></option>
                            @foreach($reservations as $room)
                            <option value = "{{$room->id}}">
                                {{-- {{$room->Name_Thai}} --}}
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                {{$room->RoomCode_ID}}
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                {{$room->Name_Thai}}
                                    &nbsp;&nbsp;&nbsp;&nbsp;

                                @if( $room->Roomtype_ID == 1 )
                                    ห้องปรับอากาศ
                                @else
                                    ห้องพัดลม
                                @endif
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                    เหลือที่ว่าง
                                {{$room->AtNumberPreple}}
                                    ที่




                            </option>
                            @endforeach
                        </select>
                    </nav>
                    </div>

                    <div class="form-group col-xs-10 col-sm-10 col-md-10 my-2">
                    <strong for="Description" class="col-sm-2">ภาคเรียน <font style="color:red;"> * </font></strong>
                    <nav class = "col-sm-8">
                        <select class="form-control" name="Type">
                            <option value="">โปรดเลือกภาคเรียน</option>
                            <option value="ภาคเรียนปลาย">ภาคเรียนปลาย</option>
                            <option value="ภาคเรียนปลาย">ภาคเรียนปลาย</option>
                            <option value="ภาคเรียนฤดูร้อน">ภาคเรียนฤดูร้อน</option>
                        </select>
                    </nav>
                    </div>
                </div>



                <button type="submit" name="submit" class="btn btn-success">เพื่มข้อมูล</button>
                <button class="btn btn-secondary" type="reset">ยกเลิก</button>
            </form>
        </div>
    </div>
</div>
@endsection
