@extends('layout.main')

@section('title', 'Form Tambah Buku')

@section('container')
<div class="container">
    <div class="row">
        <div class="col-8">
            <h1 class="my-3 text-center">Form Tambah Data Buku</h1>

            <form action="/books/{{$book->id}}/update" method="post">
                @csrf
                <div class="form-group">
                    <label for="nama">Judul Buku</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{$book->nama}}">
                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>     
                        @enderror
                </div>
                <div class="form-group">
                    <label for="penulis">Penulis</label>
                    <input type="text" class="form-control @error('penulis') is-invalid @enderror" id="penulis" name="penulis" value="{{$book->penulis}}">
                        @error('penulis')
                            <div class="invalid-feedback">{{ $message }}</div>     
                        @enderror
                </div>
                <div class="form-group">
                    <label for="penerbit">Penerbit</label>
                    <input type="text" class="form-control @error('penerbit') is-invalid @enderror" id="penerbit" name="penerbit" value="{{ $book->penerbit }}">
                        @error('penerbit')
                            <div class="invalid-feedback">{{ $message }}</div>     
                        @enderror
                </div>
                <div class="form-group">
                    <label for="tahun">Tahun Terbit</label>
                    <input type="text" class="form-control @error('tahun') is-invalid @enderror" id="tahun" name="tahun" value="{{ $book->tahun }}">
                        @error('tahun')
                            <div class="invalid-feedback">{{ $message }}</div>     
                        @enderror
                </div>
                <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="text" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga" value="{{ $book->harga }}">
                        @error('harga')
                            <div class="invalid-feedback">{{ $message }}</div>     
                        @enderror
                </div>
                <button type="submit" class="btn btn-primary">edit</button>
                </form>
            </div>
        </div>
    </div>
    
    {{-- alert
<div class="row">
<div class="col-6">
    @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
    @endif
</div>
</div> --}}


@endsection