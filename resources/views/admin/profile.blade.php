@extends('admin.layouts.app')
@section('title', 'Profile')

@section('css')

@endsection

@section('admin.users.index')
active
@endsection

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
                
            <div class="card-header pb-0">
                <h4 class="card-title mb-0">Update user</h4>
                <div class="card-options">
                    <a class="card-options-collapse" href="javascript:void(0)" data-bs-toggle="card-collapse">
                        <i class="fe fe-chevron-up"></i>
                    </a>
                    <a class="card-options-remove" href="javascript:void(0)" data-bs-toggle="card-remove">
                        <i class="fe fe-x"></i>
                    </a>
                </div>
            </div>

            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="card-body">
                    <div class="row">
    
                        <div class="col-md-6 from-group mb-3">
                            <div class="mb-6">
                                <label class="form-label" for="avater">Avater <span class="text-danger">*</span></label>
                                <input class="form-control" name="avater" id="avater" type="file">
                            </div>
                        </div>
    
                        <div class="col-md-6 from-group mb-3">
                            <div class="mb-6">
                                <label class="form-label" for="name">Name <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" id="name" name="name" value="{{ Auth::user()->name }}" placeholder="Name">
                            </div>
                        </div>
    
                        <div class="col-md-6 from-group mb-3">
                            <div class="mb-6">
                                <label class="form-label" for="email">Email <span class="text-danger">*</span></label>
                                <input class="form-control" id="email" name="email" type="email" value="{{ Auth::user()->email }}"  placeholder="Email">
                            </div>
                        </div>
    
                        <div class="col-md-6 from-group mb-3">
                            <div class="mb-6">
                                <label class="form-label" for="phone" >Phone <span class="text-danger">*</span></label>
                                <input class="form-control" id="phone" name="phone" type="phone" value="{{ Auth::user()->phone }}"  placeholder="Phone">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <button class="btn btn-warning" type="submit">Update</button>
                </div>
            </form>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-header pb-0">
                <h4 class="card-title mb-0">Update Password</h4>
                <div class="card-options">
                    <a class="card-options-collapse" href="javascript:void(0)" data-bs-toggle="card-collapse">
                        <i class="fe fe-chevron-up"></i>
                    </a>
                    <a class="card-options-remove" href="javascript:void(0)" data-bs-toggle="card-remove">
                        <i class="fe fe-x"></i>
                    </a>
                </div>
            </div>
    
            <form action="{{ route('password.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
    
                        <div class="col-12 from-group mb-3">
                            <div class="mb-12">
                                <label class="form-label" for="current_password">Current Password <span class="text-danger">*</span></label>
                                <input type="password" class="form-control" name="current_password" id="current_password" placeholder="Current Password" >
                            </div>
                        </div>
    
                        <div class="col-12 from-group mb-3">
                            <div class="mb-12">
                                <label class="form-label" for="password">New Password <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" id="password" name="password" placeholder="New Password">
                            </div>
                        </div>
    
                        <div class="col-12 from-group mb-3">
                            <div class="mb-12">
                                <label class="form-label" for="password_confirmation">Confirm Password <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password">
                            </div>
                        </div>
    
                    </div>
                </div>
                <div class="card-footer text-end">
                    <button class="btn btn-warning" type="submit">Update password</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection


@section('js')
@endsection
