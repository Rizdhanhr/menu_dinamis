@extends('layouts.app1')
@section('title','Edit Pegawai')
@section('content')

<div class="container">
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h4 class="m-0 font-weight-bold text-primary">Show Pegawai</h4>

    </div>
    <div class="card-body">

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nama Pegawai</label>
            <h1>{{ $pegawai->name }}</h1>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Pekerjaan</label>
            <h1>{{ $pegawai->pekerjaan->name }}</h1>
        </div>

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
