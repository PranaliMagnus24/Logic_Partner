@extends('admin.layouts.layout')

@section('title', 'Design Management')
@section('admin')
@section('pagetitle', 'Design Management')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Design Management</h4>
                    <div class="text-end mb-2">
                        <a href="javascript:void(0)" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#designModal">+</a>
                    </div>
                </div>
                <div class="card-body mt-3">
                  <table class="table table-bordered table-striped designList nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Design Name</th>
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

<!-- contract Modal -->
<div class="modal fade {{ isset($editdesign) ? 'show d-block' : '' }}" id="designModal" tabindex="-1" aria-labelledby="designModalLabel" aria-hidden="{{ isset($editdesign) ? 'false' : 'true' }}" style="{{ isset($editdesign) ? 'background-color: rgba(0,0,0,0.5);' : '' }}">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <form action="{{ isset($editdesign) ? route('design.update', $editdesign->id) : route('design.store') }}" method="POST" id="designForm">
          @csrf
          <div class="modal-header">
            <h5 class="modal-title" id="designModalLabel">{{ isset($editdesign) ? 'Edit Design' : 'Create Design' }}</h5>
            <a href="{{ route('design.index') }}" class="btn-close" aria-label="Close"></a>

          </div>
          <div class="modal-body">
            <div class="mb-3">
              <label for="contract_name" class="form-label">Design Name</label>
              <input type="text" class="form-control" id="design_name" name="design_name" value="{{ isset($editdesign) ? $editdesign->design_name : old('design_name') }}">
              @error('design_name')
              <span class="text-danger">{{$message}}</span>
              @enderror
            </div>
            <div class="mb-3">
              <label for="status" class="form-label">Status</label>
              <select class="form-select" id="status" name="status">
                <option value="active" {{ (isset($editdesign) && $editdesign->status == 'active') ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ (isset($editdesign) && $editdesign->status == 'inactive') ? 'selected' : '' }}>Inactive</option>
              </select>
              @error('status')
              <span class="text-danger">{{$message}}</span>
              @enderror
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">{{ isset($editdesign) ? 'Update' : 'Save' }}</button>
          </div>
        </form>
      </div>
    </div>
  </div>




@endsection
<script>
    const designUrl = "{{ route('design.index') }}";
</script>
