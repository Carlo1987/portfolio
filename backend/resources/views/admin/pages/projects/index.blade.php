@extends('admin.index')

@section('pages')

    <div class="container__btnAdd my-3">
        <div class="btnOpenModalAdd btn btn-success" data-bs-toggle="modal" data-bs-target="#storeProjectModal" 
            data-coursesLength ="{{ count( $projects ) + 1 }}" >
            Aggiungi
        </div>
    </div>

    <table class="table__fullPage">
        <tr>
            <th class="px-3">#</th>
            <td class="td__strong">Nome</td>
            <td class="td__strong">URL</td>
            <td class="td__strong"> @include('includes.flegsTexts') </td>
            <td class="td__strong"> @include('includes.flegsTexts') </td>
            <td class="td__strong"> Skill usate </td>
            <td class="td__strong"> Stato </td>
            <td class="td__strong"> Azioni </td>
        </tr>
        @foreach($projects as $project)
        <tr>
            <th class="px-3"> {{ $project->order }} </th>
            <td class="d-flex justify-content-center gap-2">
                <div> {{ $project->name }} </div>
                <div> <img src="{{ asset('images/projects/' . $project->image) }}" alt="image_{{ $project->name }}" style="width:30px; height:30px;"> </div>
            </td>
            <td> {{ $project->url }} </td>
            <td>
                <div class="text text_ITA"> {{ $project->description_ITA }} </div>
                <div class="text text_ESP visually-hidden"> {{ $project->description_ESP }} </div>
                <div class="text text_ENG visually-hidden"> {{ $project->description_ENG }} </div>
            </td>
            <td>
                <div class="text text_ITA"> {{ $project->curriculum_ITA }} </div>
                <div class="text text_ESP visually-hidden"> {{ $project->curriculum_ESP }} </div>
                <div class="text text_ENG visually-hidden"> {{ $project->curriculum_ENG }} </div>
            </td>
            <td> {{ $project->getSkillsName($skills) }} </td>
            <td> {{ $project->getStatus() }} </td>
            <td class="d-flex gap-2 align-items-center justify-content-center">
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
            </td>
            </tr>
        @endforeach
    </table>

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

