@extends('admin.layouts.layout')
@section('admin_page_tittle')
   Manage Sub-category
@endsection
@section('admin_layout')
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">All categories</h5>
        </div>
        <a href="{{ route('subcategory.create') }}" class="btn btn-primary w-25 ms-3">Create</a>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover my-0">
                    <thead></thead>
                        <tr>
                            <th>SN</th>
                            <th class="d-none d-xl-table-cell">SubCatergoryName</th>
                            <th class="d-none d-xl-table-cell">Catergory</th>
                            <th class="d-none d-md-table-cell">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($subcategories ) > 0)
                            @foreach ( $subcategories as $subcat )
                            <tr>
                                <td class="d-none d-xl-table-cell">{{ $subcat->id }}</td>
                                <td class="d-none d-xl-table-cell">{{ $subcat->subcategory_name }}</td>
                                <td class="d-none d-xl-table-cell">{{ $subcat->category->category_name}}</td>
                                <td><a href="{{ route('show.category',$subcat->id ) }}" class="btn btn-info">Edit</a>
                                    <form action="{{ route('delete.category',$subcat->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" value='Delete' class="btn btn-danger">
                                        {{-- <a href="" class="btn btn-danger">Delete</a> --}}

                                    </form>
                                  
                                </td>
                             
                                {{-- <td><span class="badge bg-danger">Delete</span></td> --}}
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="4" class="text-center">Sub Category available</td>
                            </tr>
                        @endif
                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection