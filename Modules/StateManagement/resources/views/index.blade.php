@extends('admin.layouts.layout')

@section('title', 'State Management')
@section('admin')
@section('pagetitle', 'State Management')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">State Management</h4>
                    <div class="text-end mb-2">
                        <a href="#" class="btn btn-success" id="create-state" data-bs-toggle="modal" data-bs-target="#stateModal">+</a>
                    </div>
                </div>
                <div class="card-body mt-3">
                  <table class="table table-bordered table-striped state nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>State Name</th>
                            <th>Country</th>
                            <th>Stamp Duty</th>
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


<div class="modal fade {{ isset($editState) ? 'show d-block' : '' }}" id="stateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="{{ isset($editState) ? 'false' : 'true' }}"  style="{{ isset($editState) ? 'background-color: rgba(0,0,0,0.5);' : '' }}">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">{{ isset($editState) ? 'Edit State' : 'Create State' }}</h5>
          <a href="{{ route('state.index') }}" class="btn-close" aria-label="Close"></a>
        </div>
        <div class="modal-body">
            <form action="{{ isset($editState) ? route('state.update', $editState->id) : route('state.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" value="{{ isset($editState) ? $editState->name : old('name') }}">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Country</label>
                <select name="country_id" id="" class="form-control">
                    <option value="">--Select Country--</option>
                    @foreach ($countries as $country)
                    <option value="{{ $country->id }}"
                        @if(old('country_id') !== null)
                            {{ old('country_id') == $country->id ? 'selected' : '' }}
                        @elseif(isset($editState))
                            {{ $editState->country_id == $country->id ? 'selected' : '' }}
                        @else
                            {{ $country->id == 14 ? 'selected' : '' }}
                        @endif
                    >
                        {{ $country->name }}
                    </option>

                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Country Code</label>
                <input type="text" class="form-control" name="country_code" value="{{ isset($editState) ? $editState->country_code : old('country_code') }}">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Fips Code</label>
                <input type="text" class="form-control" name="fips_code" value="{{ isset($editState) ? $editState->fips_code : old('fips_code') }}">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Iso2</label>
                <input type="text" class="form-control" name="iso2" value="{{ isset($editState) ? $editState->iso2 : old('iso2') }}">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Type</label>
                <input type="text" class="form-control" name="type" value="{{ isset($editState) ? $editState->type : old('type') }}">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Latitude</label>
                <input type="text" class="form-control" name="latitude" value="{{ isset($editState) ? $editState->latitude : old('latitude') }}">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Longitude</label>
                <input type="text" class="form-control" name="longitude" value="{{ isset($editState) ? $editState->longitude : old('longitude') }}">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Flag</label>
                <input type="text" class="form-control" name="flag" value="{{ isset($editState) ? $editState->flag : old('flag') }}">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">wikiData</label>
                <input type="text" class="form-control" name="wikiDataId" value="{{ isset($editState) ? $editState->wikiDataId : old('wikiDataId') }}">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Stamp Duty</label>
                <input type="text" class="form-control" name="stamp_duty" value="{{ isset($editState) ? $editState->stamp_duty : old('stamp_duty') }}">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">{{ isset($editState) ? 'Update' : 'Save' }}</button>
            </div>
        </form>
        </div>
      </div>
    </div>
  </div>
@endsection

<script>
    const stateUrl = "{{ route('state.index') }}";
</script>
