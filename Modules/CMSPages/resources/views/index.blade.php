
@extends('admin.layouts.layout')
@section('title', 'CMS Page')
@section('admin')
@section('pagetitle', 'CMS Page')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">CMS Pages</h4>
                    <div class="text-end mb-2">
                        <button class="btn btn-success" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">+</button>
                    </div>
                </div>
                <div class="card-body mt-3">
                    <table class="table table-bordered table-striped pageList nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Summary</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Meta Title</th>
                                <th>Meta Keyword</th>
                                <th>Meta Description</th>
                                <th>OG Title</th>
                                <th>OG Description</th>
                                <th>OG Image</th>
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

<!-----------------Offcanvas form---------------->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
      <h5 id="offcanvasRightLabel">{{ isset($editPages) ? 'Edit Page' : 'Create Page' }} </h5>
      <a href=""></a>
      <a href="{{ route('page.index') }}" class="btn-close" aria-label="Close"></a>
    </div>
    <div class="offcanvas-body">
        <form id="faqForm" method="POST"
        action="{{ isset($editPages) ? route('page.update', $editPages->id) : route('page.store') }}" enctype="multipart/form-data">
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
        <label for="image" class="form-label">Image</label>

        @if(isset($editPages) && $editPages->image)
            <div class="mb-2">
                <img src="{{ asset('upload/pages/' . $editPages->image) }}" alt="Image" style="width: 100px; height: auto; border-radius: 5px;">
            </div>
        @endif

        <input type="file" class="form-control" id="image" name="image">
    </div>

    <div class="mb-3">
        <label for="metaTitle" class="form-label">Meta Title</label>
        <input type="text" class="form-control" id="metaTitle" name="meta_title" value="{{ isset($editPages) ? $editPages->meta_title : old('meta_title') }}">
    </div>
    <div class="mb-3">
        <label for="metaKeyword" class="form-label">Meta Keyword</label>
        <input type="text" class="form-control" id="metaKeyword" name="meta_keyword" value="{{ isset($editPages) ? $editPages->meta_keyword : old('meta_keyword') }}">
    </div>
    <div class="mb-3">
        <label for="metaDescription" class="form-label">Meta Description</label>
        <textarea class="form-control" id="metaDescription" name="meta_description" rows="3">{{ isset($editPages) ? $editPages->meta_description : old('meta_description') }}</textarea>
    </div>
    <div class="mb-3">
        <label for="ogTitle" class="form-label">Og Title</label>
        <input type="text" class="form-control" id="ogTitle" name="og_title" value="{{ isset($editPages) ? $editPages->og_title : old('og_title') }}">
    </div>
    <div class="mb-3">
        <label for="ogDescription" class="form-label">Og Description</label>
        <textarea class="form-control" id="ogDescription" name="og_description" rows="3">{{ isset($editPages) ? $editPages->og_description : old('og_description') }}</textarea>
    </div>
    <div class="mb-3">
        <label for="ogImage" class="form-label">Og Image</label>

        @if(isset($editPages) && $editPages->og_img)
            <div class="mb-2">
                <img src="{{ asset('upload/pages/' . $editPages->og_img) }}" alt="OG Image" style="width: 100px; height: auto; border-radius: 5px;">
            </div>
        @endif

        <input type="file" class="form-control" id="ogImage" name="og_img">
    </div>

      <div class="mb-3">
          <label for="status" class="form-label">Status</label>
          <select name="status" id="status" class="form-control">
              <option value="active" {{ (isset($editPages) && $editPages->status == 'active') ? 'selected' : '' }}>Active</option>
              <option value="inactive" {{ (isset($editPages) && $editPages->status == 'inactive') ? 'selected' : '' }}>Inactive</option>
              <option value="draft" {{ (isset($editPages) && $editPages->status == 'draft') ? 'selected' : '' }}>Drafts</option>
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
@endsection
<script>
    window.editMode = {{ isset($editPages) ? 'true' : 'false' }};
    const pageUrl = "{{ route('page.index') }}";
</script>





