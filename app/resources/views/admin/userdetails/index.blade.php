
@extends('layouts.admin')
@section('body')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <div class="card">
            <div class="card-header ">ข้อมูลผู้ใช้งาน
                {{-- <a  class="btn btn-success mr-2 "
                    style="position:absolute ; right:0 ; top:5px"
                    href="dormitory/create" >เพิ่มหอพัก
                </a> --}}
            </div>
                @csrf

        <body {{--class="text-center"--}} style="">

            <table class="table" border="0">
                <thead>
                    <th><center>ลำดับ</center></th>
                    {{-- <th><center>รหัสประชาชน / หนังสือเดินทาง</center></th> --}}
                    <th><center>สถานะ</center></th>
                    <th><center>รหัสนิสิต</center></th>
                    <th><center>Firstname</center></th>
                    <th><center>Lastname</center></th>
                    <th><center>เพศ</center></th>
                    <th><center>สถานะ</center></th>
                    <th><center>การดำเนินการ</center></th>

                    {{-- <th>Operation </th> --}}
                </thead>
                <?php   $i=1;?>
                @foreach($user as $usdt)
                <tbody>
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $usdt->Status}}</td>
                    <td>{{ $usdt->Collegian_ID}}</td>
                    <td>{{ $usdt->Firstname_Eng}}</td>
                    <td>{{ $usdt->Lastname_Eng}}</td>
                    <td>{{ $usdt->Gender}}</td>
                    <td>{{ $usdt->Status}}</td>


                    <td>
                        <center>
                        {{-- <a class="btn btn-primary" href="/user/UserDetail/show/{{$usdt->id}}" >แสดงข้อมูล</a> --}}

                        <a class="btn btn-primary" href="{{ route('UserDetail.show',$usdt->id) }}" >แสดงข้อมูล</a>
                        </center>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        </div>
    </div>
</div>
@endsection
