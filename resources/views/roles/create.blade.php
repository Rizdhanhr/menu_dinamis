@extends('layouts.app1')
@section('title','Tambah Role')
@push('css')

@endpush
@section('content')

<div class="container">
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h4 class="m-0 font-weight-bold text-primary">Tambah Role</h4>

    </div>
    <div class="card-body">
        <form action="{{ route('roles.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nama Role</label>
            <input type="text" name="role" value="{{ old('role') }}" class="form-control @error('role') is-invalid @enderror"  placeholder="Masukkan Nama Role">
            <span style="color :red">@error('role'){{ $message }} @enderror</span>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Deskripsi</label>
            <input type="text" name="description" value="{{ old('description') }}" class="form-control @error('description') is-invalid @enderror"  placeholder="Deskripsi Role">
            <span style="color :red">@error('description'){{ $message }} @enderror</span>
        </div>
        {{-- <div class="table-responsive">
            <table class="table table-bordered table-post" id="datatable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Menu</th>
                        <th width="15%">Read</th>
                        <th width="15%">Create</th>
                        <th width="15%">Update</th>
                        <th width="15%">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <td>Dashboard</td>
                    <td>
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="customSwitch1">
                            <label class="custom-control-label" for="customSwitch1">On</label>
                        </div>
                    </td>
                    <td>
                        <div class=" custom-switch">
                            <input type="checkbox" class="custom-control-input" id="customSwitch2">
                            <label class="custom-control-label" for="customSwitch2">On</label>
                        </div>
                    </td>
                    <td>
                        <div class="custom-switch">
                            <input type="checkbox" class="custom-control-input" id="customSwitch3">
                            <label class="custom-control-label" for="customSwitch3">On</label>
                        </div>
                    </td>
                    <td>
                        <div class=" custom-switch">
                            <input type="checkbox" class="custom-control-input" id="customSwitch4">
                            <label class="custom-control-label" for="customSwitch4">On</label>
                        </div>
                    </td>
                </tbody>
            </table>
        </div> --}}
        {{-- <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Password</label>
            <select class="form-control" value="{{ old('parent') }}" name="parent">
                <option value="" selected>Main Kategori</option>
                @foreach ($kategori as $k)
                <option value="{{ $k->id }}">{{ $k->nama }}</option>
                @endforeach
            </select>
        </div> --}}
        <br>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary form-control">Simpan</button>
        </div>
        </form>
    </div>
</div>
</div>

@endsection
@push('script')

  <script>
    $(document).ready( function () {
    $('#datatable').DataTable();
    });
  </script>
@endpush

