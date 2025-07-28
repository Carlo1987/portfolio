@extends('admin.index')

@section('pages')

    <div class="container__btnAdd my-3">
        <div class="btnOpenModalAdd btn btn-success" data-bs-toggle="modal" data-bs-target="#storeJobModal" 
            data-jobsLength ="{{ count( $jobs ) + 1 }}" >
            Aggiungi
        </div>
    </div>

    <table class="table__fullPage">
        <tr>
            <th class="px-3">#</th>
            <td class="td__strong">Nome</td>
            <td class="td__strong">Data</td>
            <td class="td__strong"> 
                <div> Testi </div>
                @include('includes.flegsTexts') 
            </td>
            <td class="td__strong"> Azioni </td>
        </tr>
        @foreach($jobs as $job)
        <tr>
            <th class="px-3"> {{ $job->order }} </th>
            <td> {{ $job->name }} </td>
            <td> {{ $job->time($job->from, $job->to) }} </td>
            <td>
                <div class="text text_ITA"> {{ substr($job->text_ITA, 0 ,40) }}... </div>
                <div class="text text_ESP visually-hidden"> {{ substr($job->text_ESP, 0, 40) }}... </div>
                <div class="text text_ENG visually-hidden"> {{ substr($job->text_ENG, 0, 40) }}... </div>
            </td>
            <td class="d-flex gap-2 align-items-center justify-content-center">
                <div class="btnOpenModalEdit btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#storeJobModal" 
                    data-id="{{ $job->id }}" data-order="{{ $job->order }}" data-name="{{ $job->name }}" data-from="{{ $job->from }}" 
                    data-to="{{ $job->to }}" data-text_ITA="{{ $job->text_ITA }}" data-text_ESP="{{ $job->text_ESP }}" data-text_ENG="{{ $job->text_ENG }}"  >
                    @include('includes.buttons.button_update')
                </div> 
                <div class="btnOpenModalDelete btn btn-outline-danger"  data-bs-toggle="modal" data-bs-target="#deleteJobModal"
                     data-id="{{ $job->id }}" data-name="{{ $job->name }}" >
                    @include('includes.buttons.button_delete')
                </div>
            </td>
            </tr>
        @endforeach
    </table>

    @include('admin.pages.jobs.modal_store')
    @include('admin.pages.jobs.modal_delete')

@endsection


<script>
    document.addEventListener('DOMContentLoaded', function (){

        const datasCreate = [
            { data : 'jobsLength', input : 'order' }
        ];

        const datasUpdate = [
            { data : 'id' },
            { data : 'name' },
            { data : 'order' },
            { data : 'from' },
            { data : 'to' },
            { data : 'text_ITA' },
            { data : 'text_ESP' },
            { data : 'text_ENG' },
        ];

        setModalAddItem(datasCreate);
        setModalEditItem(datasUpdate);
        setModalDeleteItem();
    });
</script>

