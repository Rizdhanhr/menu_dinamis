@extends('layouts.app1')
@section('title','Tambah Kategori')
@section('content')

<div class="container">
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h4 class="m-0 font-weight-bold text-primary">Tambah User</h4>

    </div>
    <div class="card-body">
        <form action="{{ route('user.update',$user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nama</label>
            <input type="text" name="name" value="{{ old('name',$user->name) }}" class="form-control @error('name') is-invalid @enderror"  placeholder="Masukkan Nama User">
            <span style="color :red">@error('name'){{ $message }} @enderror</span>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email</label>
            <input type="email" name="email" value="{{ old('email',$user->email) }}" class="form-control @error('email') is-invalid @enderror"  placeholder="Masukkan Email">
            <span style="color :red">@error('email'){{ $message }} @enderror</span>
        </div>
        {{-- <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Password</label>
            <input type="password" name="password" value="{{ old('password') }}" class="form-control @error('password') is-invalid @enderror" placeholder="Masukkan Password" >
            <span style="color :red">@error('password'){{ $message }} @enderror</span>
        </div> --}}
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Role</label>
            <select class="form-control @error('role') is-invalid @enderror"  name="role">
                @foreach ($role as $r)
                <option value="{{ $r->id }}" {{ $r->id==$user->role_id ? 'selected' : '' }}>{{ $r->rolename }}</option>
                @endforeach
            </select>
            <span style="color: red;">@error('role') {{ $message }} @enderror</span>
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
