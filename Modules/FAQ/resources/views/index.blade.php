@extends('admin.layouts.layout')

@section('title', 'FAQ')
@section('admin')
@section('pagetitle', 'FAQ')
<div class="container">
    <div class="text-end">
        <a href="#" class="btn btn-primary" id="create-faq" data-bs-toggle="modal" data-bs-target="#faqModal">+</a>
    </div>

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
            @foreach($faqs as $index => $faq)
            <tr>
                <td><input type="checkbox" class="row-select" value="{{ $faq->id }}"></td>
                <td>{{ $index + 1 }}</td>
                <td>{{$faq->question}}</td>
                <td>{{$faq->answer}}</td>
                <td>{{$faq->status}}</td>
                <td>
                    <a href="{{ route('faq.edit', $faq->id) }}" class="btn btn-primary">
                        <i class="bi bi-pencil-square"></i>
                    </a>
                    <a href="{{ route('faq.destroy', $faq->id) }}" class="btn btn-danger delete-confirm">
                        <i class="bi bi-trash3-fill"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
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



