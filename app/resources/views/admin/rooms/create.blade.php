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
    {{ $type }}
    {{ $dormitory[0]->Name_Thai }}
    <p><h2>เพื่มข้อมูล ห้องพัก </h2></p>
    <form action="{{ route('rooms.store') }}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        {{-- <div class="form-group">
            <label for="TypeName">ประเภทห้องพัก <font style="color:red;"> * </font></label>
            <input type="text" class="form-control" name="TypeName" id="TypeName" placeholder="ห้องพักปรับอากาศ ">
        </div> --}}

        <div class="form-group">
            <label for="Dormitory_ID">ชื่อหอพัก <label style="color:red;"> * </label></label>
            <div {{-- class = "col-sm-4" --}}>
                <input type="hidden" value= "{{$dormitory[0]->id}}" class="form-control" name="Dormitory_ID" id="Dormitory_ID"/>
                <input type="text" class="form-control" name="Dormitory_NAME" id="Dormitory_NAME"
                value="{{ $dormitory[0]->Name_Thai }}" readonly>
            </div>
        </div>

        <div class="form-group">
            <label for="Roomtype_ID">ประเภทห้องพัก <label style="color:red;"> * </label></label>
            <div {{-- class = "col-sm-4" --}}>
                <input type="hidden" value= "{{$type}}" class="form-control" name="Roomtype_ID" id="Roomtype_ID" />
                <input type="text" class="form-control" name="Roomtype_NAME" id="Roomtype_NAME"

                @if( $type == 1  )
                    value="ห้องปรับอากาศ "
                @else
                    value="ห้องพัดลม  "
                @endif
                readonly
                >
            </div>
        </div>

        <div class="form-group">
            <label for="RoomCode_ID">เลขห้อง <label style="color:red;"> * </label></label>
            <input type="text" class="form-control" name="RoomCode_ID" id="RoomCode_ID" placeholder="เลขห้อง ... ">
        </div>


        <div class="form-group">
            <label for="Floor">ชั้น <label style="color:red;"> * </label></label>
            <input type="text" class="form-control" name="Floor" id="Floor" placeholder="ชั้น ...">
        </div>


        <button type="submit" name="submit" class="btn btn-success">เพื่มข้อมูล</button>
        <button class="btn btn-secondary" type="reset">ยกเลิก</button>
    </form>
</div>
@endsection
