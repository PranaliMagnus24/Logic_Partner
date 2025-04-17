@extends('admin.layouts.layout')

@section('title', 'FAQ')
@section('admin')
@section('pagetitle', 'FAQ')
<style>

</style>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">FAQ</h4>
                </div>
                <div class="card-body mt-3">
                  <div class="text-end mb-2">
                    <a href="#" class="btn btn-primary" id="create-faq" data-bs-toggle="modal" data-bs-target="#faqModal">+</a>
                  </div>
                  <table class="table table-bordered table-striped faqList nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Question</th>
                            <th>Answer</th>
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

<div class="modal fade {{ isset($editFaq) ? 'show d-block' : '' }}" id="faqModal" tabindex="-1" aria-labelledby="faqModalLabel" aria-hidden="{{ isset($editFaq) ? 'false' : 'true' }}" style="{{ isset($editFaq) ? 'background-color: rgba(0,0,0,0.5);' : '' }}">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="faqModalLabel">{{ isset($editFaq) ? 'Edit FAQ' : 'Create FAQ' }}</h5>
            <a href="{{ route('faq.index') }}" class="btn-close" aria-label="Close"></a>
        </div>
        <div class="modal-body">
            <form id="faqForm" method="POST"
            action="{{ isset($editFaq) ? route('faq.update', $editFaq->id) : route('faq.store') }}">
          @csrf
          <div class="mb-3">
              <label for="question" class="form-label">Question</label>
              <input type="text" class="form-control" id="question" name="question" value="{{ isset($editFaq) ? $editFaq->question : old('question') }}">
          </div>
          <div class="mb-3">
              <label for="answer" class="form-label">Answer</label>
              <textarea class="form-control" id="answer" name="answer" rows="3">{{ isset($editFaq) ? $editFaq->answer : old('answer') }}</textarea>
          </div>
          <div class="mb-3">
              <label for="status" class="form-label">Status</label>
              <select name="status" id="status" class="form-control">
                  <option value="active" {{ (isset($editFaq) && $editFaq->status == 'active') ? 'selected' : '' }}>Active</option>
                  <option value="inactive" {{ (isset($editFaq) && $editFaq->status == 'inactive') ? 'selected' : '' }}>Inactive</option>
              </select>
          </div>
          <div class="text-center">
              <button type="submit" class="btn btn-success">
                  {{ isset($editFaq) ? 'Update' : 'Save' }}
              </button>
          </div>
      </form>

        </div>
      </div>
    </div>
  </div>

@endsection
<script>
    const faqUrl = "{{ route('faq.index') }}";
</script>


