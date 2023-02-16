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
            <div class="row align-items-center">
                <div class="col">Filters</div>
                <div class="col">
                    <select id="status_filter" class="form-select-sm border">
                        <option value="">-- choose --</option>
                        <option value="0">Pending</option>
                        <option value="1">Completed</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-hover data-table table-centered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Action</th>
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
            renderOnTableDraw = (table) => {
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
                    $('.btn-change-status').click((element) => {
                        const todoId = element.target.attributes['data-id'].value 
                        axios.post(`{{ url('/todo/update-status') }}/${todoId}`).then((response) => {
                            if(response.status) {
                                Alert('success', response.data.message)
                            } else {
                                Alert('success', 'Something went wrong!')
                            }
                            table.clear().draw();
                        })
                    })
                    $('#status_filter').change((element) => {
                        table.destroy();
                        renderTable(element.target.value ?? null)
                    })
                });
            }
            renderTable = (status) => {
                var table = $('.data-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url  :"{{ route('todo.index') }}",
                        data : {
                            status : status
                        }
                    },
                    columnDefs: [
                        { "width": "25px", "targets": 0 },
                        { "width": "100px", "targets": 2 }, 
                        { "width": "100px", "targets": 3 }
                    ],
                    columns: [
                        {data: 'DT_RowIndex', name: 'id'},
                        {data: 'title', name: 'title'},
                        {data: 'status_flag', name: 'status'},
                        {data: 'action', name: 'action', orderable: false, searchable: false},
                    ]
                });
                renderOnTableDraw(table)
            }
            renderTable(status) 
        });
    </script>
@endpush