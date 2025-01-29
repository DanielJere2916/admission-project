@extends('uregistrar.layouts.layout')
@section('uregistrar_page_tittle')
    Uregistrar
@endsection
@section('uregistrar_layout')
  
     <div class="container">
        <h1>Create Faculty</h1>
        <form action="{{ route('faculties.store') }}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label for="faculty_name">Faculty Name</label>
                <input type="text" name="faculty_name" id="faculty_name" class="form-control" value="{{ old('faculty_name') }}" required>
                @error('faculty_name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <button type="submit" class="btn btn-success">Create Faculty</button>
        </form>
    </div>

@endsection