<form action="{{ isset($kategori) ? route('dashboard.kategori.update', $kategori->id) : route('dashboard.kategori.store') }}" method="POST">
    @csrf

    @if(isset($kategori))
        @method('PUT')
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ isset($kategori) ? 'Edit' : 'Tambah' }} Kategori</h6>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="nama">Nama Kategori <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" value="{{ isset($kategori) ? $kategori->nama : old('nama') }}" required>
                @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="card-footer">
            <a href="{{ route('dashboard.kategori.index') }}" class="btn btn-sm btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-sm btn-success">Simpan</button>
        </div>
    </div>
</form>