@extends('layouts.app')

@section('title', 'Manage Rekam Medis')
@section('desc', ' On this page you can manage Rekam Medis. ')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Rekam Medis List</h4>
            <div class="card-header-action">
                <a href="{{ route('rekam-medis.create') }}" class="btn btn-primary">
                    <i class="fa fa-plus"></i>
                    Add New
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped w-100" id="datatable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Id Pasien</th>
                            <th>Id Dokter</th>
                            <th>Keluhan</th>
                            <th>Diagnosa</th>
                            <th>Resep</th>
                            <th>Tindakan</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    $(function() {
        var datatable = $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            ordering: true,
            ajax: {
                url: "{!! url()->current() !!}"
            },
            lengthMenu: [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, 'ALL']
            ],
            responsive: true,
            order: [
                [0, 'desc'],
            ],
            columns: [
                {data: 'id', name: 'id'},
                {data: 'id_pasien', name: 'id_pasien'},
                {data: 'id_dokter', name: 'id_dokter'},
                {data: 'keluhan', name: 'keluhan'},
                {data: 'diagnosa', name: 'diagnosa'},
                {data: 'resep', name: 'resep'},
                {data: 'tindakan', name: 'tindakan'},
            ],
            columnDefs: [
                {
                    targets: 2,
                    render: function(data, type, row, meta) {
                        return `
                            ${data}
                            <form action="/rekam medis/${row.id}" method="POST" class="table-links">
                                @method('DELETE')
                                @csrf
                                <a href="/rekam medis/${row.id}/edit" class="btn btn-sm">Edit</a>
                                <button type="submit" class="text-danger btn-delete btn btn-sm">Delete</button>
                            </form>
                        `;
                    }
                }
            ],
            rowId: function(a) {
                return a;
            },
            rowCallback: function(row, data, iDisplayIndex) {
                var info = this.fnPagingInfo();
                var page = info.iPage;
                var length = info.iLength;
                var index = page * length + (iDisplayIndex + 1);
                $('td:eq(0)', row).html(index);
            },
        });
    });
</script>

@endpush()
