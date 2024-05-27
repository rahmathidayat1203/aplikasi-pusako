@extends('layouts.app')

@section('title', 'Manage Pasien')
@section('desc', ' On this page you can manage Pasien. ')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Pasien List</h4>
            <div class="card-header-action">
                <a href="{{ route('pasien.create') }}" class="btn btn-primary">
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
                            <th>Nama</th>
                            <th>NIK</th>
                            <th>Email</th>
                            <th>No Handphone</th>
                            <th>Jenis Kelamin</th>
                            <th>Tanggal Lehir</th>
                            <th>Tinggi Badan</th>
                            <th>Berat Badan</th>
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
                {data: 'nama', name: 'nama'},
                {data: 'nik', name: 'nik'},
                {data: 'email', name: 'email'},
                {data: 'nohp', name: 'nohp'},
                {data: 'jenis_kelamin', name: 'jenis_kelamin'},
                {data: 'tanggal_lahir', name: 'tanggal_lahir'},
                {data: 'tinggi_badan', name: 'tinggi_badan'},
                {data: 'berat_badan', name: 'berat_badan'},
            ],
            columnDefs: [
                {
                    targets: 2,
                    render: function(data, type, row, meta) {
                        return `
                            ${data}
                            <form action="/pasien/${row.id}" method="POST" class="table-links">
                                @method('DELETE')
                                @csrf
                                <a href="/pasien/${row.id}/edit" class="btn btn-sm">Edit</a>
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
