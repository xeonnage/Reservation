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
            <div class="col-md-12">
            <div class="card">
             <div class="card-header"><h4>ข้อมูลห้อง</h4></div>
             <table class="table" border="0">
                <thead class="thead-dark">
                    <th><center>#ลำดับ</center></th>
                    <th><center>เลขหอพัก</center></th>
                    <th><center>ชั้น</center></th>
                    <th><center>จำนวนคน</center></th>
                    <th><center>สถานะ</center></th>
                    <th><center>ประเภทห้องพัก </center></th>
                    <th><center>ชื่อหอพัก </center></th>


                    {{-- <th>Operation </th> --}}
                </thead>
                <?php   $i=1;?>
                @foreach ($room as $rm)
            <tbody>
                    <td>{{ $i++ }}</td>
                    <td>{{ $rm->RoomCode_ID }}</td>
                    <td>{{ $rm->Floor }}</td>
                    <td>{{ $rm->NumberPeople }} คน/ห้อง</td>
                    <td>
                        @if( $rm->NumberPeople == $rm->AtNumberPreple )
                           <p style="color: #ff1a1a"> ห้องเต็ม</p>
                        @else
                           <p style="color: #00cc00"> ว่าง {{$rm->NumberPeople - $rm->AtNumberPreple}} ที่ </p>
                        @endif

                    </td>
                    <td>
                        @if( $rm->Type  == 1)
                            ห้องปรับอากาศ
                        @else
                            ห้องพัดลม
                        @endif
                        {{-- {{ $rm->Type }} --}}
                    </td>
                    <td>{{ $rm->Name_Thai }}</td>


                @endforeach
                </tbody>
            </table>
        </div>
        </div>
    </div>
</div>
@endsection
