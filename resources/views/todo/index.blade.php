@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap5.min.css">
@endpush

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h5 class="card-title m-0 fw-bold text-dark">
                {{ __('app.my_todo') }}
                <a href="{{ route('todo.create') }}" class="ms-1 btn btn-sm btn-primary rounded-pill"><i class="bi bi-plus"></i></a>
            </h5>
            <div class="btn-group">
            </div>
        </div>
        <div class="card-body">
            <table class="table table-hover data-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Status</th>
                        <th width="100px">Action</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
@endsection

@push('scripts') 
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js"></script>
    <script type="text/javascript">
        $(function () {
            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('todo.index') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'id'},
                    {data: 'title', name: 'title'},
                    {data: 'status', name: 'status'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
            table.on('draw', function () {
                $('.btn-delete').click((element) => {

                    const todoId = element.target.attributes['data-id'].value 

                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            axios.delete(`{{ url('/todo') }}/${todoId}`).then((response) => {
                                if(response.status) {
                                    Alert('success', response.data.message)
                                } else {
                                    Alert('success', 'Something went wrong!')
                                }
                                table.clear().draw();
                            })
                        }
                    })
                })
            });
        });
    </script>
@endpush