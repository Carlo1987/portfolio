
@extends('admin.index')

@section('pages')

    <h2> Contatti </h2>

    <div class="card">
        <form method="POST" action="{{ route('contact.edit') }}">
            @csrf
            @method('PUT')

            <input type="hidden" name="id" value="{{ $contacts->id }}">

            <div class="row mb-3">
                <div class="col-sm-6">
                    <label for="web" class="form-label"> Web </label>
                    <input type="text" id="web" name="web" class="form-control"  value="{{ $contacts->web }}">
                </div>
                <div class="col-sm-6">
                    <label for="email" class="form-label"> Email </label>
                    <input type="email" id="email" name="email" class="form-control"  value="{{ $contacts->email }}">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-6">
                    <label for="phone" class="form-label"> Telefono </label>
                    <input type="text" id="phone" name="phone" class="form-control"  value="{{ $contacts->phone }}">
                </div>
                <div class="col-sm-6">
                    <label for="location" class="form-label"> Indirizzo </label>
                    <input type="text" id="location" name="location" class="form-control"  value="{{ $contacts->location }}">
                </div>
            </div>
            <div class="mb-3">
                    <label for="github" class="form-label"> Github </label>
                    <input type="text" id="github" name="github" class="form-control"  value="{{ $contacts->github }}">
            </div>
            <div class="mb-3">
                    <label for="linkedin" class="form-label"> LinkedIn </label>
                    <input type="text" id="linkedin" name="linkedin" class="form-control"  value="{{ $contacts->linkedin }}">
            </div>

            <button type="submit" class="btn btn-primary"> Salva </button>
        </form>
    </div>
  

@endsection