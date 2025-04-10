@extends('main_admin.layouts.layout')

@section('title', 'Dashboard')

@section('content')
 <!-- Permission Table -->
 <div class="card">
    <div class="card-datatable table-responsive">
      <table class="datatables-permissions table border-top">
        <thead>
          <tr>
            <th></th>
            <th></th>
            <th>Name</th>
            <th>Created Date</th>
            <th>Actions</th>
          </tr>
        </thead>
      </table>
    </div>
  </div>
  <!--/ Permission Table -->

  <!-- Modal -->
  <!-- Add Permission Modal -->
  <div class="modal fade" id="addPermissionModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-simple">
      <div class="modal-content">
        <div class="modal-body">
          <button
            type="button"
            class="btn-close btn-pinned"
            data-bs-dismiss="modal"
            aria-label="Close"></button>
          <div class="text-center mb-6">
            <h3>Add New Permission</h3>
            <p class="text-body-secondary">Permissions you may use and assign to your users.</p>
          </div>
          <form id="addPermissionForm" class="row" action="{{ route('permission.store') }}" method="POST">
            @csrf
            <div class="col-12 form-control-validation mb-4">
              <label class="form-label" for="modalPermissionName">Permission Name</label>
              <input
                type="text"
                id="modalPermissionName"
                name="name"
                class="form-control"
                placeholder="Permission Name"
                autofocus />
            </div>
            <div class="col-12 mb-2">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="corePermission" />
                <label class="form-check-label" for="corePermission"> Set as core permission </label>
              </div>
            </div>
            <div class="col-12 text-center demo-vertical-spacing">
              <button type="submit" class="btn btn-primary me-sm-4 me-1">Create Permission</button>
              <button
                type="reset"
                class="btn btn-label-secondary"
                data-bs-dismiss="modal"
                aria-label="Close">
                Discard
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!--/ Add Permission Modal -->

  <!-- Edit Permission Modal -->
  <div class="modal fade" id="editPermissionModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-simple">
      <div class="modal-content">
        <div class="modal-body">
          <button
            type="button"
            class="btn-close btn-pinned"
            data-bs-dismiss="modal"
            aria-label="Close"></button>
          <div class="text-center mb-6">
            <h3>Edit Permission</h3>
            <p class="text-body-secondary">Edit permission as per your requirements.</p>
          </div>
          <div class="alert alert-warning" role="alert">
            <h6 class="alert-heading mb-2">Warning</h6>
            <p class="mb-0">
              By editing the permission name, you might break the system permissions functionality. Please
              ensure you're absolutely certain before proceeding.
            </p>
          </div>
          <form id="editPermissionForm" class="row">
            <div class="col-sm-9 form-control-validation">
              <label class="form-label" for="editPermissionName">Permission Name</label>
              <input type="text" id="editPermissionName" name="name" class="form-control"placeholder="Permission Name"
                tabindex="-1" />
            </div>
            <div class="col-sm-3 mb-4">
              <label class="form-label invisible d-none d-sm-inline-block">Button</label>
              <button type="submit" class="btn btn-primary mt-1 mt-sm-0">Update</button>
            </div>
            <div class="col-12">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="editCorePermission" />
                <label class="form-check-label" for="editCorePermission"> Set as core permission </label>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!--/ Edit Permission Modal -->

@endsection

<script src="{{ asset('admincss/assets/vendor/libs/jquery/jquery.js') }}"></script>

    <script src="{{ asset('admincss/assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('admincss/assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('admincss/assets/vendor/libs/node-waves/node-waves.js') }}"></script>

    <script src="{{ asset('admincss/assets/vendor/libs/@algolia/autocomplete-js.js') }}"></script>

    <script src="{{ asset('admincss/assets/vendor/libs/pickr/pickr.js') }}"></script>

    <script src="{{ asset('admincss/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

    <script src="{{ asset('admincss/assets/vendor/libs/hammer/hammer.js') }}"></script>

    <script src="{{ asset('admincss/assets/vendor/libs/i18n/i18n.js') }}"></script>

    <script src="{{ asset('admincss/assets/vendor/js/menu.js') }}"></script>
 <!-- Vendors JS -->

 <script src="{{ asset('admincss/assets/vendor/libs/@form-validation/popular.js') }}"></script>
 <script src="{{ asset('admincss/assets/vendor/libs/@form-validation/bootstrap5.js') }}"></script>
 <script src="{{ asset('admincss/assets/vendor/libs/@form-validation/auto-focus.js') }}"></script>
 <script src="{{ asset('admincss/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ asset('admincss/assets/js/app-access-permission.js') }}"></script>
    <script src="{{ asset('admincss/assets/js/modal-add-permission.js') }}"></script>
    <script src="{{ asset('admincss/assets/js/modal-edit-permission.js') }}"></script>
