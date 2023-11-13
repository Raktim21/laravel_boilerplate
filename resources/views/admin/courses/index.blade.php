@extends('admin.layouts.app')
@section('title', 'Course')

@section('css')

@endsection

@section('admin.course.index','active')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <div class="d-md-flex d-sm-block">
                    <div class="form-group d-flex mb-0">
                        <h5>Course</h5>
                    </div>
                    <div class="flex-grow-1 text-end">
                        <a class="btn btn-primary" href="#!" data-bs-toggle="modal" data-bs-target="#add_course"> 
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
                            <th scope="col">Title</th>
                            <th scope="col">Duration</th>
                            <th scope="col">Totla units</th>
                            <th scope="col">File name</th>
                            <th scope="col">Created at</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($courses as $course )
                            <tr>

                                <td scope="row">
                                    {{ $course->id }}
                                </th>

                                <td>
                                    {{ $course->title }}
                                </td>

                                <td>
                                    {{ $course->duration }} hour
                                </td>

                                <td>
                                    {{ $course->units->count() }}
                                </td>

                                <td>
                                    {{ $course->file_name }}
                                </td>

                                <td>
                                    {{ \Carbon\Carbon::parse($course->created_at)->diffForHumans() }}
                                </td>

                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        {{-- <button class="btn btn-outline-warning" type="button">Edit</button> --}}
                                        <a class="btn btn-outline-warning" href="#!" data-bs-toggle="modal" data-bs-target="#edit_course" >Edit</a>
                                        <button class="btn btn-outline-danger sweet-6" data-id="{{ $course->id }}" type="button">Delete</button>
                                    </div>
                                </td>

                            </tr>


                            <div class="modal fade" id="edit_course" tabindex="-1" aria-labelledby="edit_course" aria-modal="true" role="dialog">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit Course</h5>
                                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('admin.course.update', $course->id) }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-body">
                                                <div>
                                                    <label for="file" class="form-label">Upload zip file <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="file" name="file" aria-label="file example" required="">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                                                <button class="btn btn-primary" type="submit">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-body">
            {{ $courses->render() }}
        </div>
    </div>
</div>




<div class="modal fade" id="add_course" tabindex="-1" aria-labelledby="add_course" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Course</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.course.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div>
                        <label for="file" class="form-label">Upload zip file <span class="text-danger">*</span></label>
                        <input class="form-control" type="file" name="file" aria-label="file example" required="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="submit">Save</button>
                </div>
            </form>
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
                        url: "{{ route('admin.course.destroy',':id') }}".replace(':id', $(this).attr('data-id')),
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
