@extends('admin.index')

@section('pages')
   <div class="row mt-4">
    <div class="col-md-4">
        <div class="d-flex justify-content-center">
            <a href="{{ route('curriculum.show', [ 'lang' => 'it' ]) }}" target="_blank" class="btn__showCurriculum card">
                <img src="{{ asset('images/flags/bandiera_italia.png') }}" alt="img_bandieraItalia" class="table__image">
                Curriculum italiano
            </a>
        </div>
    </div>
    <div class="col-md-4">
        <div class="d-flex justify-content-center">
            <a href="{{ route('curriculum.show', [ 'lang' => 'es' ]) }}" target="_blank" class="btn__showCurriculum card">
                <img src="{{ asset('images/flags/bandiera_spagna.png') }}" alt="img_bandieraSpagna" class="table__image">
                Curriculum spagnolo
            </a>
        </div>
    </div>
    <div class="col-md-4">
        <div class="d-flex justify-content-center">
            <a href="{{ route('curriculum.show', [ 'lang' => 'en' ]) }}" target="_blank" class="btn__showCurriculum card">
                <img src="{{ asset('images/flags/bandiera_inghilterra.png') }}" alt="img_bandieraInglese" class="table__image">
                Curriculum inglese
            </a>
        </div>
    </div>
   </div>
@endsection