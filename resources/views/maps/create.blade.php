@extends('layouts.app1')
@section('title','Tambah Maps')
@push('css')
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>

<style>
       <style type="text/css">
      #map {
        margin: 10px;
        width: 600px;
        height: 300px;
        padding: 10px;
      }
</style>
@endpush
@section('content')
<div class="container">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Tambah Lokasi</h4>

        </div>
        <div class="card-body">
            {{-- <form action="{{ route('lokasi.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nama Lokasi</label>
                <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror"  placeholder="Masukkan Nama Lokasi">
                <span style="color :red">@error('name'){{ $message }} @enderror</span>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Alamat</label>
                <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror"  placeholder="Masukkan Nama Alamat">
                <span style="color :red">@error('name'){{ $message }} @enderror</span>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Latitude</label>
                <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror"  placeholder="Masukkan Latitude">
                <span style="color :red">@error('name'){{ $message }} @enderror</span>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Longitude</label>
                <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror"  placeholder="Masukkan Longitude">
                <span style="color :red">@error('name'){{ $message }} @enderror</span>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary form-control">Simpan</button>
            </div>
            <div id="map"></div>
            </form> --}}

            <div id="map"></div>
        </div>
    </div>
    </div>
@endsection
@push('script')
<script>
    let map;

async function initMap() {
  const { Map } = await google.maps.importLibrary("maps");
  map = new Map(document.getElementById("map"), {
    center: { lat: -34.397, lng: 150.644 },
    zoom: 8,
  });
}

initMap();
</script>
<script async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAuRbpvVBhukeiDBQaXfBHN46f8_rHdru0
    &callback=initMap">
</script>
@endpush
