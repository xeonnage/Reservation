@extends('layouts.admin')
@section('body')
@foreach($problemtype as $pbty)
@endforeach
<div class="table-responsive">

    <p><h2>แก้ไข้ หัวข้อปัญหา</h2></p>
    <form action="/admin/Problemtype/update/{{$pbty->id }}" method="post">
        {{csrf_field()}}
        {{-- @method('PUT') --}}

            <div class="form-group">
                <label for="ProblemName">หัวข้อปัญหา <label style="color:red;"> * </label></label>
                <input type="text" class="form-control" name="ProblemName" id="ProblemName" value="{{ $pbty->ProblemName }}">
            </div>

            <button type="submit" name="submit" class="btn btn-warning">แก้ไขข้อมูล</button>
            <button class="btn btn-secondary" type="reset">ยกเลิก</button>
        </form>

    </form>
</div>
@endsection
