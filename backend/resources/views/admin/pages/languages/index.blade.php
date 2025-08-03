@extends('admin.index')

@section('pages')
    <div class="card mt-4">
        <form method="POST" action="{{ route('language.edit') }}">
            @csrf
            @method('PUT')
                @foreach($languages as $language)
                    <div class="input-group flex-nowrap align-items-center mb-3">
                        <label for="value" class="me-2 w-50"> {{ $language->text_ITA }} </label>
                        <input type="number" class="form-control" name="value_{{ $language->id }}" value="{{ $language->value }}" aria-describedby="addon-wrapping">
                        <span class="input-group-text" id="addon-wrapping"> % </span>
                    </div>
          
                @endforeach
            <button type="submit" class="btn btn-primary"> Salva </button>
        </form>
    </div>
@endsection