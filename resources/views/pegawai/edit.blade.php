@extends('layouts.app1')
@section('title','Edit Pegawai')
@section('content')

<div class="container">
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h4 class="m-0 font-weight-bold text-primary">Edit Pegawai</h4>

    </div>
    <div class="card-body">
        <form action="{{ route('pegawai.update',$pegawai->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nama Pegawai</label>
            <input type="text" name="name" value="{{ $pegawai->name }}" class="form-control @error('name') is-invalid @enderror"  placeholder="Masukkan Nama Pegawai">
            <span style="color :red">@error('name'){{ $message }} @enderror</span>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Pekerjaan</label>
            <select class="form-control @error('pekerjaan') is-invalid @enderror"  name="pekerjaan">
                @foreach ($pekerjaan as $p)
                <option value="{{ $p->id }}" {{ $p->id==$pegawai->id_pekerjaan ? 'selected' : '' }}>{{ $p->name }}</option>
                @endforeach
            </select>
            <span style="color :red">@error('pekerjaan'){{ $message }} @enderror</span>
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
