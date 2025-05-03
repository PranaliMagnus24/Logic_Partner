@extends('admin.layouts.layout')

@section('title', 'Contract Type Management')
@section('admin')
@section('pagetitle', 'Contract Management')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Contract Management</h4>
                    <div class="text-end mb-2">
                        <a href="javascript:void(0)" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#contractModal">+</a>
                    </div>
                </div>
                <div class="card-body mt-3">
                  <table class="table table-bordered table-striped contractList nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Contract Type Name</th>
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
<div class="modal fade {{ isset($editcontract) ? 'show d-block' : '' }}" id="contractModal" tabindex="-1" aria-labelledby="contractModalLabel" aria-hidden="{{ isset($editcontract) ? 'false' : 'true' }}" style="{{ isset($editcontract) ? 'background-color: rgba(0,0,0,0.5);' : '' }}">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <form action="{{ isset($editcontract) ? route('contract.update', $editcontract->id) : route('contract.store') }}" method="POST" id="contractForm">
          @csrf
          <div class="modal-header">
            <h5 class="modal-title" id="contractModalLabel">{{ isset($editcontract) ? 'Edit Contract' : 'Create Contract' }}</h5>
            <a href="{{ route('contract.index') }}" class="btn-close" aria-label="Close"></a>

          </div>
          <div class="modal-body">
            <div class="mb-3">
              <label for="contract_name" class="form-label">Contract Type Name</label>
              <input type="text" class="form-control" id="contract_name" name="contract_type_name" value="{{ isset($editcontract) ? $editcontract->contract_type_name : old('contract_type_name') }}">
              @error('contract_type_name')
              <span class="text-danger">{{$message}}</span>
              @enderror
            </div>
            <div class="mb-3">
              <label for="status" class="form-label">Status</label>
              <select class="form-select" id="status" name="status">
                <option value="active" {{ (isset($editcontract) && $editcontract->status == 'active') ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ (isset($editcontract) && $editcontract->status == 'inactive') ? 'selected' : '' }}>Inactive</option>
              </select>
              @error('status')
              <span class="text-danger">{{$message}}</span>
              @enderror
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">{{ isset($editcontract) ? 'Update' : 'Save' }}</button>
          </div>
        </form>
      </div>
    </div>
  </div>




@endsection
<script>
    const contractUrl = "{{ route('contract.index') }}";
</script>
