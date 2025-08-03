@extends('admin.index')

@section('pages')

    <div class="container__btnAdd my-3">
        <div class="btnOpenModalAdd btn btn-success" data-bs-toggle="modal" data-bs-target="#storeCourseModal" 
            data-coursesLength ="{{ count( $courses ) + 1 }}" >
            Aggiungi
        </div>
    </div>

    <table class="table__fullPage">
        <tr>
            <th class="px-3">#</th>
            <td class="td__strong">Nome</td>
            <td class="td__strong">Durata</td>
            <td class="td__strong">Data</td>
            <td class="td__strong"> 
                <div> Testi </div>
                @include('includes.flegsTexts') 
            </td>
            <td class="td__strong"> Azioni </td>
        </tr>
        @foreach($courses as $course)
        <tr>
            <th class="px-3"> {{ $course->order }} </th>
            <td> {{ $course->name }} </td>
            <td> {{ $course->time }} </td>
            <td> {{ $course->date }} </td>
            <td>
                <div class="text text_ITA"> {{ $course->text_ITA }} </div>
                <div class="text text_ESP visually-hidden"> {{ $course->text_ESP }} </div>
                <div class="text text_ENG visually-hidden"> {{ $course->text_ENG }} </div>
            </td>
            <td class="d-flex gap-2 align-items-center justify-content-center">
                <div class="btnOpenModalEdit btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#storeCourseModal" 
                    data-id="{{ $course->id }}" data-order="{{ $course->order }}" data-name="{{ $course->name }}" data-timeDuration="{{ $course->timeDuration }}" 
                    data-format="{{ $course->format }}" data-date="{{ $course->date }}" data-text_ITA="{{ $course->text_ITA }}" data-text_ESP="{{ $course->text_ESP }}" data-text_ENG="{{ $course->text_ENG }}"  >
                    @include('includes.buttons.button_update')
                </div> 
                <div class="btnOpenModalDelete btn btn-outline-danger"  data-bs-toggle="modal" data-bs-target="#deleteCourseModal"
                     data-id="{{ $course->id }}" data-name="{{ $course->name }}" >
                    @include('includes.buttons.button_delete')
                </div>
            </td>
            </tr>
        @endforeach
    </table>

    @include('admin.pages.courses.modal_store')
    @include('admin.pages.courses.modal_delete')

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

