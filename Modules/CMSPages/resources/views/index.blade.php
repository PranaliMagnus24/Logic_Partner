@extends('admin.layouts.layout')

@section('title', 'CMS Page')
@section('admin')
@section('pagetitle', 'CMS Page')
<div class="container">
    <a href="#" class="btn btn-primary" id="create-faq" data-bs-toggle="modal" data-bs-target="#faqModal">+</a>
    <table id="example" class="display bg-white" style="width:100%">
        <thead>
            <tr>
                <th><input type="checkbox" id="select-all"></th>
                <th>ID</th>
                <th>Question</th>
                <th>Answer</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pages as $index => $page)
            <tr>
                <td><input type="checkbox" class="row-select"></td>
                <td>{{ $index + 1 }}</td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                    {{-- <a href="{{ route('page.edit', $faq->id) }}" class="btn btn-primary">
                        <i class="bi bi-pencil-square"></i>
                    </a>
                    <a href="{{ route('page.destroy', $faq->id) }}" class="btn btn-danger delete-confirm">
                        <i class="bi bi-trash3-fill"></i>
                    </a> --}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="modal fade {{ isset($editPages) ? 'show d-block' : '' }}" id="faqModal" tabindex="-1" aria-labelledby="faqModalLabel" aria-hidden="{{ isset($editPages) ? 'false' : 'true' }}" style="{{ isset($editPages) ? 'background-color: rgba(0,0,0,0.5);' : '' }}">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="faqModalLabel">{{ isset($editPages) ? 'Edit Page' : 'Create Page' }}</h5>
            <a href="{{ route('page.index') }}" class="btn-close" aria-label="Close"></a>
        </div>
        <div class="modal-body">
            <form id="faqForm" method="POST"
            action="{{ isset($editPages) ? route('page.update', $editPages->id) : route('page.store') }}">
          @csrf
          <div class="mb-3">
              <label for="summary" class="form-label">Title</label>
              <input type="text" class="form-control" id="title" name="title" value="{{ isset($editPages) ? $editPages->title : old('title') }}">
          </div>
          <div class="mb-3">
              <label for="summary" class="form-label">Summary</label>
              <textarea class="form-control" id="summary" name="summary" rows="3">{{ isset($editPages) ? $editPages->summary : old('summary') }}</textarea>
          </div>
          <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3">{{ isset($editPages) ? $editPages->description : old('description') }}</textarea>
        </div>
          <div class="mb-3">
              <label for="status" class="form-label">Status</label>
              <select name="status" id="status" class="form-control">
                  <option value="active" {{ (isset($editPages) && $editPages->status == 'active') ? 'selected' : '' }}>Active</option>
                  <option value="inactive" {{ (isset($editPages) && $editPages->status == 'inactive') ? 'selected' : '' }}>Inactive</option>
              </select>
          </div>
          <div class="text-center">
              <button type="submit" class="btn btn-success">
                  {{ isset($editPages) ? 'Update' : 'Save' }}
              </button>
          </div>
      </form>

        </div>
      </div>
    </div>
  </div>

@endsection




