@extends('layouts.app')

@section('title', 'Manage Jadwal Dokter')
@section('desc', ' On this page you can manage Jadwal Dokter. ')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Jadwal Dokter List</h4>
            <div class="card-header-action">
                <a href="{{ route('jadwal-dokter.create') }}" class="btn btn-primary">
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
                            <th>Id Dokter</th>
                            <th>Hari</th>
                            <th>Id Ruangan</th>
                            <th>Jam Mulai</th>
                            <th>jam selesai</th>
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
                {data: 'id_dokter', name: 'id_dokter'},
                {data: 'hari', name: 'hari'},
                {data: 'id_ruangan', name: 'id_ruangan'},
                {data: 'jam_mulai', name: 'jam_mulai'},
                {data: 'jam_selesai', name: 'jam_selesai'},
               
            ],
            columnDefs: [
                {
                    targets: 2,
                    render: function(data, type, row, meta) {
                        return `
                            ${data}
                            <form action="/jadwal dokter/${row.id}" method="POST" class="table-links">
                                @method('DELETE')
                                @csrf
                                <a href="/jadwal dokter/${row.id}/edit" class="btn btn-sm">Edit</a>
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
