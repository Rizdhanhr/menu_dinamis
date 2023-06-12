@extends('layouts.app1')
@section('title','Tambah Menu')
@section('content')

<div class="container">
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h4 class="m-0 font-weight-bold text-primary">Tambah Menu</h4>

    </div>
    <div class="card-body">
        <form action="{{ route('menu.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nama Menu</label>
            <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror"  placeholder="Masukkan Nama Menu">
            <span style="color :red">@error('name'){{ $message }} @enderror</span>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Page</label>
            <input type="text" name="page" value="{{ old('page') }}" class="form-control @error('page') is-invalid @enderror"  placeholder="Masukkan Route Pages">
            <span style="color :red">@error('page'){{ $message }} @enderror</span>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Parent ID</label>
            <select class="form-control" value="{{ old('parent') }}" name="parent_id">
                <option value="0" selected>Parent</option>
                @foreach($parent as $p)
                <option value="{{ $p->id }}">{{ $p->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Published</label>
            <select class="form-control" value="{{ old('parent') }}" name="published">
                <option value="0">Tidak Aktif</option>
                <option value="1" selected>Aktif</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Icon</label>
            <input type="text" name="icon" value="{{ old('icon') }}" class="form-control @error('icon') is-invalid @enderror"  placeholder="Masukkan Icon">
            <span style="color :red">@error('icon'){{ $message }} @enderror</span>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Ordering</label>
            <input type="number" min="1" name="ordering" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror"  placeholder="Masukkan Numbering">
            <span style="color :red">@error('name'){{ $message }} @enderror</span>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary form-control">Simpan</button>
        </div>
        </form>
    </div>
</div>
</div>

@endsection
@once
@push('script')
{{-- <script>
    $(document).ready(function() {
    $('.js-example-basic-single').select2();
});
</script> --}}
@endpush
@endonce
