@extends('dashboardpages.layouts.main')

@section('content')
    <div>
        <h5 class="card-title fw-semibold mb-4">Detail Data {{ $property->nama_properti }}</h5>
        <div class="container-fluid">
            <div class="row">
                <img src="{{ asset($property->foto) }}" alt="" class="img img-thumbnail img-responsive"
                    style="width:300px">
            </div>
            <div class="row mt-3">
                <h5>Lokasi</h5>
                <p>{{ $property->lokasi }}</p>
            </div>
            <div class="row">
                <h5>Keterangan</h5>
                <p>{{ $property->keterangan }}</p>
            </div>
            <div class="row mt-5">
                <a href="{{ route('properties.index') }}" class="btn btn-sm btn-danger col-md-1 col-6">Kembali</a>
            </div>
        </div>
    </div>
@endsection
