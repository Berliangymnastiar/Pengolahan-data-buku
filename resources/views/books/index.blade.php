@extends('layout.main')

@section('title', 'List Book')

@section('container')
<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="my-3 text-center">List Book's</h1>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Judul Buku</th>
                        <th scope="col">Penulis</th>
                        <th scope="col">Penerbit</th>
                        <th scope="col">Tahun Terbit</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($books as $book)
                        <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                            <td scope="row">{{$book->nama}}</td>
                            <td scope="row">{{$book->penulis}}</td>
                            <td scope="row">{{$book->penerbit}}</td>
                            <td scope="row">{{$book->tahun}}</td>
                            <td scope="row">{{$book->harga}}</td>
                            <td>
                            <a href="/books/{{$book->id}}/edit" class="btn btn-success">Edit
                            </a>
                        <form action="/books/{{$book->id}}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger">Delete
                            </button>
                            </td>
                        </form>
                            
                        </tr>
                        @endforeach
        </div>
    </div>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal">
        Tambah Data
    </button>
    
    {{-- alert --}}
<div class="row">
<div class="col-6">
    @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
    @endif
</div>
</div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Buku</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form action="/books/create" method="get">
                @csrf
                @method('post')
                <div class="form-group">
                    <label for="nama">Judul Buku</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') }}">
                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>     
                        @enderror
                </div>
                <div class="form-group">
                    <label for="penulis">Penulis</label>
                    <input type="text" class="form-control @error('penulis') is-invalid @enderror" id="penulis" name="penulis" value="{{ old('penulis') }}">
                        @error('penulis')
                            <div class="invalid-feedback">{{ $message }}</div>     
                        @enderror
                </div>
                <div class="form-group">
                    <label for="penerbit">Penerbit</label>
                    <input type="text" class="form-control @error('penerbit') is-invalid @enderror" id="penerbit" name="penerbit" value="{{ old('penerbit') }}">
                        @error('penerbit')
                            <div class="invalid-feedback">{{ $message }}</div>     
                        @enderror
                </div>
                <div class="form-group">
                    <label for="tahun">Tahun Terbit</label>
                    <input type="text" class="form-control @error('tahun') is-invalid @enderror" id="tahun" name="tahun" value="{{ old('tahun') }}">
                        @error('tahun')
                            <div class="invalid-feedback">{{ $message }}</div>     
                        @enderror
                </div>
                <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="text" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga" value="{{ old('harga') }}">
                        @error('harga')
                            <div class="invalid-feedback">{{ $message }}</div>     
                        @enderror
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Tambah Data</button>
            </div>
        
        </div>
        </div>
    </form>
    </div>
</div>


@endsection