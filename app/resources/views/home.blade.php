@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">My Profile</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{-- You are logged in! --}}

                    <p><strong>id : </strong>{!! Auth::user()->id !!}</p>
                    <p><strong>Name : </strong>{!! Auth::user()->name !!}</p>
                    <p><strong>Email : </strong>{!! Auth::user()->email !!}</p>

                    <center>
                    @if( Auth::user()->checkIsAdmin() )
                        <a href="admin/dormitory" class="btn btn-primary">Management</a>
                    @endif
                    {{-- {{$detail->user_ID}} --}}

                    @if(  sizeof($userdetail ) == 1  )
                        <a href="{{ route('UserDetail.edit',Auth::user()->id ) }} " class="btn btn-warning">แก้ไขข้อมูลส่วนตัว</a>
                    @else
                        <a href="{{ route('UserDetail.create') }} " class="btn btn-info">เพื่มข้อมูลส่วนตัว</a>
                    @endif
                        {{-- {{ sizeof($5) }} --}}

                    @if(sizeof($userdetail ) == 0)
                        <a href="{{Auth::user()->id}}" onclick="return confirm('คุณยังไม่ได้เพื่มข้อมูลส่วนตัว \nกรุณาเพื่มข้อมูลส่วนตัวก่อน ไม่งั้นจะจองห้องไม่ได้ค่ะ')" class="btn btn-danger">จองห้อง</a>
                    @elseif(  sizeof($Reservations ) == 1)
                        <a href="/user/reservations/show/{{$Reservations[0]->id}}" class="btn btn-primary">ข้อมูลการจอง</a>
                    @else
                        <a href="/user/reservations/index" class="btn btn-success">จองห้อง</a>

                    @endif

{{--
                    <a href="" class="btn btn-success">Home</a> --}}
                    </center>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

