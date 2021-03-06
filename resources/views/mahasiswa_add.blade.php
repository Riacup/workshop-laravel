@extends('layout')

@section('content')

    <div class="row">
        <div class="col-md-6 offset-md-3" style="padding: 2%">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="/students_add" method="POST">
                @csrf
                <br>
                <div class="form-group">
                    <label for="nim" >NIM</label>
                    <input type="text" class="form-control" name="nim" value="{{ old('nim') }}">    
                    <!-- value digunakan untuk saat pengisian tidak hilang ketika dalam pengisian form salah -->
                    @error('nim')
                        {{ $message }}
                    @enderror
                </div>

                <div class="form-group">
                    <label for="nama" >Nama</label>
                    <input type="text" class="form-control" name="nama" value="{{ old('nama') }}">
                    @error('nama')
                        {{ $message }}
                    @enderror
                </div>

                <div class="form-group">
                    <label for="angkatan" >Angkatan</label>
                    <input type="text" class="form-control" name="angkatan" value="{{ old('angkatan') }}"> 
                    @error('angkatan')
                        {{ $message }}
                    @enderror
                </div>
                
                <button type="submit" class="btn btn-primary">Tambah Mahasiswa</button>
            </form>
        </div>
    </div>
    
@endsection