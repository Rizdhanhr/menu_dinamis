@extends('layouts.app1')
@section('title','Edit Menu')
@section('content')

<div class="container">
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h4 class="m-0 font-weight-bold text-primary">Edit Menu</h4>

    </div>
    <div class="card-body">
        <form action="{{ route('menu.update',$menu->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nama Menu</label>
            <input type="text" name="name" value="{{ old('name', $menu->name) }}" class="form-control @error('name') is-invalid @enderror">
            <span style="color :red">@error('name'){{ $message }} @enderror</span>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Page</label>
            <input type="text" name="page" value="{{ old('page', $menu->page) }}" class="form-control @error('page') is-invalid @enderror">
            <span style="color :red">@error('page'){{ $message }} @enderror</span>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Parent ID</label>
            <select class="form-control @error('parent_id') is-invalid @enderror"  name="parent_id">
                <option value="0" {{ $menu->parent_id==0 ? 'selected' : '' }}>Parent</option>
                @foreach($parent as $p)
                <option value="{{ $p->id }}" {{ $menu->parent_id==$p->id ? 'selected' : '' }}>{{ $p->name }}</option>
                @endforeach
            </select>
            <span style="color : red;">@error('parent_id') {{ $message }} @enderror</span>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Published</label>
            <select class="form-control @error('published') is-invalid @enderror" name="published">
                <option value="0">Tidak Aktif</option>
                <option value="1" selected>Aktif</option>
            </select>
            <span style="color : red;">@error('published') {{ $message }} @enderror</span>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Icon</label>
            <input type="text" name="icon" value="{{ old('icon',$menu->icon) }}" class="form-control @error('icon') is-invalid @enderror"  placeholder="Masukkan Icon">
            <span style="color :red">@error('icon'){{ $message }} @enderror</span>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Ordering</label>
            <input type="number" min="1" name="ordering" value="{{ old('name',$menu->ordering ) }}" class="form-control @error('name') is-invalid @enderror"  placeholder="Masukkan Numbering">
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
