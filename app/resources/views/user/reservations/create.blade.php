
@extends('layouts.app')
@section('content')
@foreach($reservations as $room)


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
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h4>จองห้อง</h4></div>
            {{-- <form action="{{ route('reservation.store') }}" method="post" > --}}
                {{-- <form action="/user/reservations/create/{{Auth::user()->id}}" method="post" > --}}
                <form action="/user/reservations/store" method="post" >

                {{csrf_field()}}
                <input type="hidden" name="RoomCode_ID" id="RoomCode_ID" value = "{{$room->id}}" >

                <div class="form-inline">

                {{-- <strong for="Description" class="col-sm-2">หอพัก <font style="color:red;"> * </font></strong>
                <nav class = "col-sm-8">
                    <select class="form-control" name="RoomCode_ID">
                        @foreach($reservations as $room)
                        <option value = "{{$room->id}}">
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
                </nav>--}}
                {!! Auth::user()->id !!}
                     <div class="form-group col-xs-12 col-sm-12 col-md-12 my-3">
                        <strong for="Description" class="col-sm-2">Email ผู้ใช้</strong>
                        <input type="text" class="form-control col-sm-10"  value = "{{Auth::user()->email }}" readonly>
                    </div>

                    <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                        <strong for="Description" class="col-sm-2">ชื่อหอพักหอพัก <font style="color:red;"> * </font></strong>
                        <input type="text" class="form-control col-sm-10"  value = "{{$room->Name_Thai}}" readonly>
                    </div>

                    <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                        <strong for="Description" class="col-sm-2">ประเภทห้อง <font style="color:red;"> * </font></strong>
                        <input type="text" class="form-control col-sm-10"
                        value =
                            @if( $room->Roomtype_ID == 1 )
                                "ห้องปรับอากาศ"
                            @else
                                "ห้องพัดลม"
                            @endif readonly >
                    </div>
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                        <strong for="Description" class="col-sm-2">รหัสห้อง <font style="color:red;"> * </font></strong>
                        <input type="text" class="form-control col-sm-10" value = "{{$room->RoomCode_ID}} " readonly>
                    </div>

                    <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                        <strong for="Description" class="col-sm-2">ภาคเรียน <font style="color:red;"> * </font></strong>
                        <nav class = "col-sm-10">
                            <select class="form-control col-sm-10" name="term" >
                                <option value=" ">
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    ------------------------------
                                    โปรดเลือกภาคเรียนที่จองห้อง
                                    ------------------------------
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                                </option>
                                <option value="ภาคเรียนต้น">
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                    ภาคเรียนต้น
                                </option>
                                <option value="ภาคเรียนปลาย">
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                    ภาคเรียนปลาย
                                </option>
                                <option value="ภาคเรียนฤดูร้อน">
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                    ภาคเรียนฤดูร้อน
                                </option>
                            </select>
                        </nav>
                    </div>


                </div>
                <div class="form-group col-xs-12 col-sm-12 col-md-12 my-4"><center>
                    <button type="submit" name="submit" class="btn btn-success">จองห้อง</button>
                    <button class="btn btn-secondary" type="reset">ยกเลิก</button>
                    </center>
                </div>

            </form>
            </div>
        </div>
        </div>
        </div>
    </div>
</div>
@endforeach
@endsection
