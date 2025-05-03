@extends('admin.layouts.layout')

@section('title', 'Category Management')
@section('admin')
@section('pagetitle', 'Category Management')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Category Management</h4>
                    <div class="text-end mb-2">
                        <a href="javascript:void(0)" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#categoryModal">+</a>
                    </div>
                </div>
                <div class="card-body mt-3">
                  <table class="table table-bordered table-striped categoryList nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Category Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>

                  </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Category Modal -->
<div class="modal fade {{ isset($editCategory) ? 'show d-block' : '' }}" id="categoryModal" tabindex="-1" aria-labelledby="categoryModalLabel" aria-hidden="{{ isset($editCategory) ? 'false' : 'true' }}" style="{{ isset($editCategory) ? 'background-color: rgba(0,0,0,0.5);' : '' }}">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <form action="{{ isset($editCategory) ? route('category.update', $editCategory->id) : route('category.store') }}" method="POST" id="categoryForm">
          @csrf
          <div class="modal-header">
            <h5 class="modal-title" id="categoryModalLabel">{{ isset($editCategory) ? 'Edit Category' : 'Create Category' }}</h5>
            <a href="{{ route('category.index') }}" class="btn-close" aria-label="Close"></a>

          </div>
          <div class="modal-body">
            <div class="mb-3">
              <label for="category_name" class="form-label">Category Name</label>
              <input type="text" class="form-control" id="category_name" name="category_name" value="{{ isset($editCategory) ? $editCategory->category_name : old('category_name') }}">
              @error('category_name')
              <span class="text-danger">{{$message}}</span>
              @enderror
            </div>
            <div class="mb-3">
              <label for="status" class="form-label">Status</label>
              <select class="form-select" id="status" name="status">
                <option value="active" {{ (isset($editCategory) && $editCategory->status == 'active') ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ (isset($editCategory) && $editCategory->status == 'inactive') ? 'selected' : '' }}>Inactive</option>
              </select>
              @error('status')
              <span class="text-danger">{{$message}}</span>
              @enderror
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">   {{ isset($editCategory) ? 'Update' : 'Save' }}</button>
          </div>
        </form>
      </div>
    </div>
  </div>




@endsection
<script>
    const categoryUrl = "{{ route('category.index') }}";
</script>
