@extends('admin.layouts.app')
@section('title', 'Users')

@section('css')

@endsection

@section('admin.student.index','active')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <div class="d-md-flex d-sm-block">
                    <div class="form-group d-flex mb-0">
                        <h5>Student</h5>
                    </div>
                    <div class="flex-grow-1 text-end">
                        <a class="btn btn-primary" href="{{ route('admin.student.create') }}"> 
                            Add New
                        </a>
                    </div>
                </div>
            </div> 
            <div class="table-responsive table-hover">
                <table class="table">
                    <thead>
                        <tr class="border-bottom-primary">
                            <th scope="col">Id</th>
                            <th scope="col">Avater</th>
                            <th scope="col">First name</th>
                            <th scope="col">Last name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Created at</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($users as $user )
                            <tr>

                                <td scope="row">
                                    {{ $user->id }}
                                </th>
                                <td>
                                    @if ($user->avater)
                                    <img src="{{ asset($user->avater) }}" alt="avater" width="50px" height="50px">
                                    @else
                                    <img src="{{ asset('uploads/admin/avater/demo_avater.png') }}" alt="avater" width="50px" height="50px">
                                    @endif
                                </td>
                                <td>
                                    {{ $user->first_name }}
                                </td>
                                <td>
                                    {{ $user->last_name }}
                                </td>
                                <td>
                                    {{ $user->email }}
                                </td>
                                <td>
                                    @if ($user->phone)
                                        {{ $user->phone }}
                                    @else
                                        <span class="text-danger">N/A</span>
                                    @endif
                                </td>

                                <td>
                                    @if ($user->gender == 0)
                                        <span class="badge bg-success">Male</span>
                                    @endif
                                    @if ($user->gender == 1)
                                        <span class="badge bg-info">Female</span>
                                    @endif
                                    @if ($user->gender == 2)
                                        <span class="badge bg-warning">Other</span>
                                    @endif
                                </td>

                                <td>
                                    {{ \Carbon\Carbon::parse($user->created_at)->diffForHumans() }}
                                </td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        {{-- <button class="btn btn-outline-warning" type="button">Edit</button> --}}
                                        <a class="btn btn-outline-warning" href="{{ route('admin.student.edit', $user->id) }}" >Edit</a>
                                        <button class="btn btn-outline-danger sweet-6" data-id="{{ $user->id }}" type="button">Delete</button>
                                    </div>
                                </td>

                            </tr>
                            
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-body">
            {{ $users->render() }}
        </div>


    </div>
</div>
@endsection


@section('js')

<script>
    $(document).ready(function () {
        $('.sweet-6').click(function (e) { 
            e.preventDefault();
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-danger',
                    cancelButton: 'btn btn-primary'
                },
                    buttonsStyling: false
                })

                swalWithBootstrapButtons.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No, cancel!',
                    reverseButtons: true
                }).then((result) => {
                if (result.isConfirmed) {

                    var success = true;
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    
                    $.ajax({
                        type: "delete",
                        url: "{{ route('admin.student.destroy',':id') }}".replace(':id', $(this).attr('data-id')),
                        dataType: "dataType",

                        statusCode: {
                            202: function (response) {
                                // Handle the 202 status code as success
                                swalWithBootstrapButtons.fire({

                                    title: 'Accepted!',
                                    text: JSON.parse(response.responseText).success || 'The request has been accepted for processing.',
                                    icon: 'success',
                                    allowOutsideClick: false,
                                    allowEscapeKey: false,
                                    
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        location.reload();
                                    }
                                });
                            },
                        },

                        error: function (response) {
                            
                            swalWithBootstrapButtons.fire(
                                'Error!',
                                JSON.parse(response.responseText).error || 'Something went wrong!',
                                'error'
                            );
                        }
                    });
                } 
            })
                        
        });
    });
</script>

@endsection
