@extends('admin.layouts.layout')

@section('title', 'Quotation Management')
@section('admin')
@section('pagetitle', 'Quotation Management')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Quotation Management</h4>
                    <div class="text-end mb-2">
                        <a href="{{ route('create.quotation')}}" class="btn btn-success">+</a>
                    </div>
                </div>
                <div class="card-body mt-3">
                  <table class="table table-bordered table-striped datatable nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Enquiry Name</th>
                            <th>Project Name</th>
                            <th>Project Location</th>
                            <th>Build up area</th>
                            <th>Total cost</th>
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


<!-- View Quotation Modal -->
<div class="modal fade" id="viewquotationModal" tabindex="-1" aria-labelledby="viewQuotationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="viewQuotationModalLabel">View Quotation</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="quotation-details">

          <div class="text-center">
              <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
<script>
    const quotationUrl = "{{ route('list.quotation') }}";
</script>
