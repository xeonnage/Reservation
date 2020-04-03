
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
<div class="container">
    <div class="row justify-content-center">
        <div class="table-responsive">
            <p><h2>เพื่มหัวข้อปัญหา </h2></p>
            <form action="/admin/Problemtype" method="post" >
                {{csrf_field()}}
                <div class="form-inline">
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 my-2">
                        <label for="ProblemName" class="col-sm-2">หัวข้อปัญหา <label style="color:red;"> * </label></label>
                        <input type="text" class="form-control col-sm-8" name="ProblemName" id="ProblemName" placeholder="แจ้งซ่อม">
                        <button type="submit" name="submit" class="btn btn-success col-sm-2">ยืนยัน</button>
                    </div>
                </div>
                {{-- <button class="btn btn-secondary" type="reset">ยกเลิก</button> --}}
            </form>
        </div>
        @if($problemtype->count()>0)
            <div class="table-responsive my-3">
                <table class="table" border="0">
                    <thead class="thead-dark">
                        <th><center>ลำดับ</center></th>
                        <th><center>ประเภทหัวข้อปัญหา</center></th>
                        <th><center>การดำเนินการ</center></th>
                    </thead>
                    <?php   $i=1;?>
                    @foreach($problemtype as $pbty)
                    <tbody>
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $pbty->ProblemName}}</td>
                        <td>
                            <center>
                            <a href="/admin/Problemtype/edit/{{$pbty->id}}" class="btn btn-warning">แก้ไขข้อมูล</a>
                            <a href="/admin/Problemtype/delete/{{$pbty->id}}" onclick="return confirm('คุณต้องการลบข้อมูลหรือไม่ ?')" class="btn btn-danger">ลบข้อมูล</a>
                            </center>
                        </td>

                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="alert alert-danger col-sm-10 my-2">
                <p style="text-align:center">ไม่มีข้อมูล หัวข้อปัญหา</p>
            </div>
        @endif
    </div>
</div>
@endsection
