@extends('admin.layouts.layout')
@section('admin_page_tittle')
   Create Category
@endsection
@section('admin_layout')
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">Create category</h5>
        </div>
        <div class="card-body">
            
            @if ($errors->any())
                <div class="alert alert-warning alert-dismissible fade show">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
 
<!-- Create Post Form -->
            <form action="{{ route('store.category') }}" method="POST">
                @csrf
                <label for="" class="fw-bold mb-2">Give name of Your Category</label>
                <input type="text" class="form-control" name="category_name" value="{{ old('category_name') }}" placeholder="Computer">
                <button type="submit" class="btn btn-primary w-100 mt-3">Add Category</button>
            </form>
        </div>
    </div>
</div>



@endsection