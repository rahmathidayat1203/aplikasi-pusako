@extends('layouts.app')

@section('title', 'Manage Antrean')
@section('desc', ' On this page you can manage Antrean. ')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Antrean List</h4>
            <div class="card-header-action">
                <a href="{{ route('antrean.create') }}" class="btn btn-primary">
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
                            <th>Nomor Antrean</th>
                            <th>Waktu Antrean</th>
                            <th>Waktu Panggil</th>
                            <th>Waktu Keluar</th>
                            <th>Rating</th>
                            <th>Komentar</th>
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
                {data: 'nomor_antrean', name: 'nomor_antrean'},
                {data: 'waktu_antrean', name: 'waktu_antrean'},
                {data: 'waktu_panggil', name: 'waktu_panggil'},
                {data: 'waktu_keluar', name: 'waktu_keluar'},
                {data: 'rating', name: 'rating'},
                {data: 'komentar', name: 'komentar'},
            ],
            columnDefs: [
                {
                    targets: 2,
                    render: function(data, type, row, meta) {
                        return `
                            ${data}
                            <form action="/antrean/${row.id}" method="POST" class="table-links">
                                @method('DELETE')
                                @csrf
                                <a href="/antrean/${row.id}/edit" class="btn btn-sm">Edit</a>
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
