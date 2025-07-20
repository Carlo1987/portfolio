@extends('admin.index')

@section('pages')

    <div class="mt-3 d-flex justify-content-between align-items-center">
     
        @include('includes.flegsTexts')
 
        <div class="btnOpenModalAdd btn btn-success" data-bs-toggle="modal" data-bs-target="#storeProjectModal" 
            data-coursesLength ="{{ count( $projects ) + 1 }}" >
            Aggiungi Progetto
        </div>
    </div>

    <div class="row">
        @foreach($projects as $project)
        <div class="col-xxl-4 col-lg-6">
            <div class="d-flex justify-content-center">
                <div class="card">
                    <div class="d-flex align-items-center justify-content-start gap-1">
                        <div class="me-1">
                            #{{ $project->order }}
                        </div>
                        <div class="table__image d-flex align-items-center">
                            <img src="{{ asset('images/projects/' . $project->image) }}" alt="image_{{ $project->name }}">
                        </div>
                        <div class="fs-4">
                            {{ $project->name }}
                        </div>
                        <div class="ms-auto {{ $project->status == App\Enums\ProjectEnum::Working ? 'text-success' : 'text-danger' }}">
                            {{ $project->getStatus() }}
                        </div>
                    </div>
                    <div class="mt-1">
                        <strong> URL: </strong> <span class="card__smallText"> {{ $project->url }} </span>
                    </div>
                    <div class="mt-1">
                        <strong> Skill usate: </strong> <span class="card__smallText"> {{ $project->getSkillsName($skills) }} </span>
                    </div>
                    <div>
                        <div class="text-center"> <strong> Descrizione Portfolio </strong> </div>
                        <div class="text text_ITA"> {{ $project->description_ITA }} </div>
                        <div class="text text_ESP visually-hidden"> {{ $project->description_ESP }} </div>
                        <div class="text text_ENG visually-hidden"> {{ $project->description_ENG }} </div>
                    </div>
                    <div>
                        <div class="text-center"> <strong> Descrizione Curriculum </strong> </div>
                        <div class="text text_ITA"> {{ $project->curriculum_ITA }} </div>
                        <div class="text text_ESP visually-hidden"> {{ $project->curriculum_ESP }} </div>
                        <div class="text text_ENG visually-hidden"> {{ $project->curriculum_ENG }} </div>
                    </div>
                    <div class="mt-2 d-flex gap-2 align-items-center justify-content-end">
                        <div class="btnOpenModalEdit btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#storeProjectModal" 
                            data-id="{{ $project->id }}" data-order="{{ $project->order }}" data-name="{{ $project->name }}" data-url="{{ $project->url }}" data-image="{{ $project->image }}" 
                            data-description_ITA="{{ $project->description_ITA }}" data-description_ESP="{{ $project->description_ESP }}" data-description_ENG="{{ $project->description_ENG }}"  
                            data-curriculum_ITA="{{ $project->curriculum_ITA }}" data-curriculum_ESP="{{ $project->curriculum_ESP }}" data-curriculum_ENG="{{ $project->curriculum_ENG }}" 
                            data-status="{{ $project->status }}" data-dev_languages="{{ $project->dev_languages }}" >
                            @include('includes.buttons.button_update')
                        </div> 
                        <div class="btnOpenModalDelete btn btn-outline-danger"  data-bs-toggle="modal" data-bs-target="#deleteProjectModal"
                            data-id="{{ $project->id }}" data-name="{{ $project->name }}" >
                            @include('includes.buttons.button_delete')
                        </div>
                    </div>

                </div>
            </div>
        </div>
        @endforeach
    </div>

    @include('admin.pages.projects.modal_store')
    @include('admin.pages.projects.modal_delete')

@endsection


<script>
    document.addEventListener('DOMContentLoaded', function (){

        const datasCreate = [
            { data : 'coursesLength', input : 'order' }
        ];

        const datasUpdate = [
            { data : 'id' },
            { data : 'name' },
            { data : 'order' },
            { data : 'timeDuration' },
            { data : 'format' },
            { data : 'date' },
            { data : 'text_ITA' },
            { data : 'text_ESP' },
            { data : 'text_ENG' },
        ];

        setModalAddItem(datasCreate);
        setModalEditItem(datasUpdate);
        setModalDeleteItem();
    });
</script>

