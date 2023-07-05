@extends('mhs.partials.main')

@section('container')
<div class="container-fluid mt-5">
    <div class="card-group">
      @foreach ($matkul as $matkul)
      
      <div class="card col-md-4 m-2">
        <img src="{{ asset('storage/files/'.$matkul->foto) }}" class="card-img-top mt-3" alt="{{ $matkul->foto }}" style="height: 220px";>
        <div class="card-body">
          <h4 class="card-title">{{ $matkul->matkul }}</h4>
          {{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> --}}
          <a href="{{ $matkul->url }}" class="btn btn-primary float-right mt-3">Pelajari</a>
        </div>
      </div>
        @endforeach
    </div>
</div>
@endsection