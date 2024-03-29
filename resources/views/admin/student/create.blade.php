@extends('admin.layouts.app')
@section('title', 'Student Create')

@section('css')

@endsection

@section('admin.student.index','active')


@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
                
            <div class="card-header pb-0">
                <h4 class="card-title mb-0">Create Student</h4>
                <div class="card-options">
                    <a class="card-options-collapse" href="javascript:void(0)" data-bs-toggle="card-collapse">
                        <i class="fe fe-chevron-up"></i>
                    </a>
                    <a class="card-options-remove" href="javascript:void(0)" data-bs-toggle="card-remove">
                        <i class="fe fe-x"></i>
                    </a>
                </div>
            </div>

            <form action="{{ route('admin.student.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 from-group mb-3">
                            <div class="mb-6">
                                <label class="form-label" for="first_name">First name <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" id="first_name" name="first_name" placeholder="First name">
                            </div>
                        </div>

                        <div class="col-md-6 from-group mb-3">
                            <div class="mb-6">
                                <label class="form-label" for="last_name">Last name <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" id="last_name" name="last_name" placeholder="Last name">
                            </div>
                        </div>
    
                        <div class="col-md-6 from-group mb-3">
                            <div class="mb-6">
                                <label class="form-label" for="avater">Avater</label>
                                <input class="form-control" name="avater" id="avater" type="file">
                            </div>
                        </div>
    
                        <div class="col-md-6 from-group mb-3">
                            <div class="mb-6">
                                <label class="form-label" for="email">Email <span class="text-danger">*</span></label>
                                <input class="form-control" id="email" name="email" type="email" placeholder="Email">
                            </div>
                        </div>
    
                        <div class="col-md-6 from-group mb-3">
                            <div class="mb-6">
                                <label class="form-label" for="phone" >Phone <span class="text-danger">*</span></label>
                                <input class="form-control" id="phone" name="phone" type="phone" placeholder="Phone">
                            </div>
                        </div>

                        <div class="col-md-6 from-group mb-3">
                            <div class="mb-6">
                                <label class="form-label" for="password" >Password <span class="text-danger">*</span></label>
                                <input class="form-control" id="password" name="password" type="password" placeholder="Password">
                            </div>
                        </div>

                        <div class="col-md-6 from-group mb-3">
                            <div class="col-sm-12">
                                <label>Select Gender <span class="text-danger">*</span></label>
                            </div>
                            <div class="m-t-15 m-checkbox-inline custom-radio-ml">

                                <div class="form-check form-check-inline radio radio-primary">
                                    <input class="form-check-input" id="radioinline1" type="radio" name="gender" value="0" checked>
                                    <label class="form-check-label mb-0" for="radioinline1">Male</label>
                                </div>

                                <div class="form-check form-check-inline radio radio-primary">
                                    <input class="form-check-input" id="radioinline2" type="radio" name="gender" value="1">
                                    <label class="form-check-label mb-0" for="radioinline2">Female</span></label>
                                </div>

                                <div class="form-check form-check-inline radio radio-primary">
                                    <input class="form-check-input" id="radioinline3" type="radio" name="gender" value="2">
                                    <label class="form-check-label mb-0" for="radioinline3">Others</span></label>
                                </div>

                            </div>
                        </div>


                        <div class="col-md-6 from-group mb-3">
                            <div class="mb-6">
                                <label class="form-label" for="password_confirmation" >Confirm Password <span class="text-danger">*</span></label>
                                <input class="form-control" id="password_confirmation" name="password_confirmation" type="password" placeholder="Confirm Password">
                            </div>
                        </div>
    
                    </div>
                </div>
                <div class="card-footer text-end">
                    <button class="btn btn-primary" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection


@section('js')
@endsection
