@extends('layouts.app1')
@section('title','Tambah')
@section('content')

<div class="container">
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h4 class="m-0 font-weight-bold text-primary">Tambah Pekerjaan</h4>

    </div>
    <div class="card-body">
        <form action="{{ route('pekerjaan.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nama Pekerjaan</label>
            <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror"  placeholder="Masukkan Nama User">
            <span style="color :red">@error('name'){{ $message }} @enderror</span>
        </div>
        {{-- <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Password</label>
            <select class="form-control" value="{{ old('parent') }}" name="parent">
                <option value="" selected>Main Kategori</option>
                @foreach ($kategori as $k)
                <option value="{{ $k->id }}">{{ $k->nama }}</option>
                @endforeach
            </select>
        </div> --}}
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
