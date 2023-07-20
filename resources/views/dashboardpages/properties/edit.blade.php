@extends('dashboardpages.layouts.main')

@section('content')
    <div>
        <h5 class="card-title fw-semibold mb-4">Data Properties</h5>
        <div>
            <form class="container-fluid" method="post" action="{{ route('properties.update', $property->id) }}"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3 row">
                    <div class="col-12 col-md-6">
                        <div class="row">
                            <div class="col">
                                <label for="foto" class="form-label">Foto properti</label>
                                <input type="file" class="form-control @error('foto') is-invalid @enderror"
                                    id="foto" accept="image/*" name="foto"
                                    value="{{ old('foto', $property->foto) }}">
                                @error('foto')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col">
                                <img src="{{ asset($property->foto) }}" alt="preview" id="previewImage"
                                    height="50px" class="img-responsive img img-thumbnail">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-12 col-md-6">
                        <label for="nama_properti" class="form-label">Nama Properti</label>
                        <input type="text" class="form-control @error('nama_properti') is-invalid @enderror"
                            id="nama_properti" name="nama_properti"
                            value="{{ old('nama_properti', $property->nama_properti) }}">
                        @error('nama_properti')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-12 col-md-6">
                        <label for="lokasi" class="form-label">Lokasi</label>
                        <input type="text" class="form-control @error('lokasi') is-invalid @enderror" id="lokasi"
                            name="lokasi" value="{{ old('lokasi', $property->lokasi) }}">
                        @error('lokasi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-12 col-md-6">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <textarea type="text" class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" rows="6"
                            name="keterangan">{{ old('keterangan', $property->keterangan) }}</textarea>
                        @error('keterangan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12 col-md-6 d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('properties.index') }}" class="btn btn-danger">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        const input = document.querySelector('#foto');
        const previewImage = document.querySelector('#previewImage');

        input.addEventListener('change', function() {
            updatePreview();
        });

        function updatePreview() {
            const file = input.files[0];
            if (file) {
                const reader = new FileReader();
                reader.readAsDataURL(file);
                reader.addEventListener('load', function() {
                    previewImage.src = this.result;
                });
            }
        }
    </script>
@endsection
