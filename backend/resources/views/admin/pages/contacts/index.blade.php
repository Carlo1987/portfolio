
@extends('admin.index')

@section('pages')

    <h2> Contatti </h2>

    <div class="card">
        <form method="POST" action="{{ route('contact.edit') }}">
            @csrf
            @method('PUT')

            <input type="hidden" name="id" value="{{ $contacts->id }}">
            <div class="mb-3">
                <input type="text" name="web" class="form-control"  value="{{ $contacts->web }}">
            </div>
            <div class="mb-3">
                <input type="email" name="email" class="form-control"  value="{{ $contacts->email }}">
            </div>
            <div class="mb-3">
                <input type="text" name="phone" class="form-control"  value="{{ $contacts->phone }}">
            </div>
            <div class="mb-3">
                <input type="text" name="location" class="form-control"  value="{{ $contacts->location }}">
            </div>

            <button type="submit" class="btn btn-primary"> Salva </button>
        </form>
    </div>
  

@endsection