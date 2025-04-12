@extends('main_admin.layouts.layout')

@section('title', 'Dashboard')

@section('content')

<h4 class="mb-1">Roles List</h4>

              <p class="mb-6">
                A role provided access to predefined menus and features so that depending on <br />
                assigned role an administrator can have access to what user needs.
              </p>
              <!-- Role cards -->
              <div class="row g-6">
                @foreach($roles as $role)
                  <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="card">
                      <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                          <h6 class="fw-normal mb-0 text-body">Total {{ $role->users_count }} users</h6>
                          <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
                            @foreach($role->users_preview as $user)
                              <li
                                data-bs-toggle="tooltip"
                                data-popup="tooltip-custom"
                                data-bs-placement="top"
                                title="{{ $user->name }}"
                                class="avatar pull-up">
                                <img class="rounded-circle" src="{{ asset('admincss/assets/img/avatars/' . ($loop->index + 1) . '.png') }}" alt="Avatar" />
                              </li>
                            @endforeach
                            @if($role->extra_user_count > 0)
                              <li class="avatar">
                                <span class="avatar-initial rounded-circle pull-up" title="{{ $role->extra_user_count }} more">
                                  +{{ $role->extra_user_count }}
                                </span>
                              </li>
                            @endif
                          </ul>
                        </div>
                        <div class="d-flex justify-content-between align-items-end">
                          <div class="role-heading">
                            <h5 class="mb-1">{{ ucfirst($role->name) }}</h5>
                            <a href="javascript:;" class="role-edit-modal"
                            data-role-id="{{ $role->id }}"
                            data-role-name="{{ $role->name }}"
                            data-role-permissions='@json($role->permissions->pluck("name"))'
                            data-bs-toggle="modal"
                            data-bs-target="#addRoleModal">
                            <span>Edit Role</span>
                         </a>


                          </div>
                          <a href="javascript:void(0);" class="role-delete" data-role-id="{{ $role->id }}">
                            <i class="icon-base ti tabler-trash icon-md text-danger"></i>
                        </a>
                        </div>
                      </div>
                    </div>
                  </div>
                @endforeach

                <!-- Add New Role Card -->
                <div class="col-xl-4 col-lg-6 col-md-6">
                  <div class="card h-100">
                    <div class="row h-100">
                      <div class="col-sm-5 d-flex align-items-end justify-content-center">
                        <img src="{{ asset('admincss/assets/img/illustrations/add-new-roles.png') }}" class="img-fluid" alt="Image" width="83" />
                      </div>
                      <div class="col-sm-7">
                        <div class="card-body text-sm-end text-center ps-sm-0">
                          <button data-bs-target="#addRoleModal" data-bs-toggle="modal" class="btn btn-sm btn-primary mb-4 text-nowrap add-new-role">
                            Add New Role
                          </button>
                          <p class="mb-0">Add new role,<br />if it doesn't exist.</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!--/ Role cards -->

              <!-- Add Role Modal -->
              <!-- Add Role Modal -->
              <div class="modal fade" id="addRoleModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-simple modal-dialog-centered modal-add-new-role">
                  <div class="modal-content">
                    <div class="modal-body">
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      <div class="text-center mb-6">
                        <h4 class="role-title">Add New Role</h4>
                        <p class="text-body-secondary">Set role permissions</p>
                      </div>
                      <!-- Add role form -->
                      <form id="addRoleForm1" class="row g-3" method="POST" action="#">
                        @csrf
                        <input type="hidden" name="_method" id="formMethod" value="POST">
                        <input type="hidden" name="role_id" id="roleId">

                        <div class="col-12 form-control-validation mb-3">
                          <label class="form-label" for="modalRoleName">Role Name</label>
                          <input type="text" id="modalRoleName" name="name" class="form-control" placeholder="Enter a role name" />
                        </div>

                        <div class="col-12">
                          <h5 class="mb-3">Role Permissions</h5>
                          <div class="table-responsive">
                            <table class="table table-flush-spacing">
                              <tbody>
                                @foreach ($permissions as $module => $modulePermissions)
                                  <tr>
                                    <td class="text-nowrap fw-medium text-heading">
                                      {{ ucwords(str_replace('_', ' ', $module)) }}
                                    </td>
                                    <td>
                                      <div class="d-flex justify-content-end flex-wrap">
                                        @foreach ($modulePermissions as $permission)
                                          @php
                                            $action = ucfirst(str_replace($module . '_', '', $permission->name));
                                          @endphp
                                          <div class="form-check mb-0 me-4">
                                            <input
                                              class="form-check-input"
                                              type="checkbox"
                                              name="permission[]"
                                              value="{{ $permission->name }}"
                                              id="perm_{{ $permission->id }}"
                                            >
                                            <label class="form-check-label" for="perm_{{ $permission->id }}">{{ $action }}</label>
                                          </div>
                                        @endforeach
                                      </div>
                                    </td>
                                  </tr>
                                @endforeach
                              </tbody>
                            </table>
                          </div>
                        </div>

                        <div class="col-12 text-center">
                          <button type="submit" class="btn btn-primary me-sm-4 me-1">Submit</button>
                          <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                        </div>
                      </form>
                      <!--/ Add role form -->
                    </div>
                  </div>
                </div>
              </div>



@endsection
<script src="{{ asset('admincss/assets/vendor/libs/jquery/jquery.js') }}"></script>


    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('admincss/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    <script src="{{ asset('admincss/assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('admincss/assets/vendor/libs/@form-validation/popular.js') }}"></script>
    <script src="{{ asset('admincss/assets/vendor/libs/@form-validation/bootstrap5.js') }}"></script>
    <script src="{{ asset('admincss/assets/vendor/libs/@form-validation/auto-focus.js') }}"></script>

    <!-- Main JS -->

    <!-- Page JS -->
    <script src="{{ asset('admincss/assets/js/app-access-roles.js') }}"></script>
    <script src="{{ asset('admincss/assets/js/modal-add-role.js') }}"></script>

