@extends('admin.layouts.layout')
@section('admin_page_tittle')
    Create Sub-catergory
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
            <form action="{{ route('store.subcategory') }}" method="POST">
                @csrf
                <label for="" class="fw-bold mb-2">Give name of Your SubCategory</label>
                <input type="text" class="form-control" name="subcategory_name" value="{{ old('category_name') }}" placeholder="Computer">
                <label for="" class="fw-bold mb-2">Select Category</label>
               <select name="category_id" class="form-control" id="">
                @foreach ($categories as $categories)
                <option value="{{ $categories->id }}">{{ $categories->category_name }}</option>  
                @endforeach
                
               </select>
               
                <button type="submit" class="btn btn-primary w-100 mt-3">Add SubCategory</button>
            </form>
        </div>
    </div>
</div>
@endsection