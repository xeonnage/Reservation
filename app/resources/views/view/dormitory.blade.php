
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
             <div class="card-header"><h4>ข้อมูลรายชื่อหอพัก</h4></div>
             <div class="table-responsive my-3">
                <table class="table" border="0">
                    <thead class="thead-dark">
                        <th><center>#ID</center></th>
                        <th><center>ชื่อหอพัก ภาษาอังกฤษ</center></th>
                        <th><center>ชื่อหอพัก ภาษาไทย</center></th>
                        <th><center>ประเภทหอพัก</center></th>


                        {{-- <th>Operation </th> --}}
                    </thead>
                    @foreach($dormitory as $dorm)
                    <tbody>
                    <tr>
                        <td>{{ $dorm->id}}</td>
                        <td>{{ $dorm->Name_Eng}}</td>
                        <td>{{ $dorm->Name_Thai}}</td>
                        <td>{{ $dorm->Description}}</td>

                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>
    @endsection
