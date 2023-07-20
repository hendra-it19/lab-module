@extends('dashboardpages.layouts.main')

@section('content')
    <div>
        <h5 class="card-title fw-semibold mb-4">Data Properties</h5>
        <div class="row">
            <div class="col">
                <a href="{{ route('properties.create') }}" class="btn btn-primary my-3">Tambah Data</a>
            </div>
        </div>
        <div>
            @if ($message = Session::get('success'))
                <div class="alert alert-success" role="alert">
                    {{ $message }}
                </div>
            @endif
            <table class="table table-primary my-3">
                <thead>
                    <th>No</th>
                    <th>Foto</th>
                    <th>Nama properti</th>
                    <th>Lokasi</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @php $no=1; @endphp
                    @foreach ($data as $row)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>
                                <img src="{{ asset($row->foto) }}" alt="foto" width="40xp" height="40px">
                            </td>
                            <td>{{ $row->nama_properti }}</td>
                            <td>{{ $row->lokasi }}</td>
                            <td class="col">
                                <div class="row gap-1">
                                    <a href="{{ route('properties.show', $row->id) }}"
                                        class="col btn btn-sm btn-info">Detail</a>
                                    <a href="{{ route('properties.edit', $row->id) }}"
                                        class="col btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('properties.destroy', $row->id) }}" method="post" class="col" style="margin:0;padding:0;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger d-block" type="submit"
                                            onClick="return confirm('Yakin ingin menghapus ?')" style="width:100%;margin:0px;">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection
