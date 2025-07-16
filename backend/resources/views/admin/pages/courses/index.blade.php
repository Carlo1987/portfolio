@extends('admin.index')

@section('pages')

    <div class="container__btnAdd my-3">
        <div class="btn btn-success">
            Aggiungi
        </div>
    </div>

    <table class="tableCourses">
        <tr>
            <th class="px-3">#</th>
            <td class="td__strong">Nome</td>
            <td class="td__strong">Durata</td>
            <td class="td__strong">Data</td>
            <td class="td__strong"> @include('includes.flegsTexts') </td>
            <td class="td__strong"> Azioni </td>
        </tr>
        @foreach($courses as $course)
        <tr>
            <th class="px-3"> {{ $course->order }} </th>
            <td> {{ $course->name }} </td>
            <td> {{ $course->time() }} </td>
            <td> {{ $course->date }} </td>
            <td>
                <div class="text text_ITA"> {{ $course->text_ITA }} </div>
                <div class="text text_ESP visually-hidden"> {{ $course->text_ESP }} </div>
                <div class="text text_ENG visually-hidden"> {{ $course->text_ENG }} </div>
            </td>
            <td class="d-flex gap-2 align-items-center justify-content-center">
                <div class="btn btn-outline-primary">
                    @include('includes.buttons.button_update')
                </div> 
                <div class="btn btn-outline-danger">
                    @include('includes.buttons.button_delete')
                </div>
            </td>
            </tr>
        @endforeach
    </table>
@endsection

