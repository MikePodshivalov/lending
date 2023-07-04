@extends('layouts.backend')
@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="card-body">
                <div class="block-content block-content-full">
                    <button class="btn-hero btn-primary mb-3" onclick="window.location='#'">
                        Создать новый проект
                    </button>
                </div>
                <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12 col-md-6"></div>
                        <div class="col-sm-12 col-md-6"></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="example2" class="table table-bordered table-hover dataTable dtr-inline"
                                   aria-describedby="example2_info">
                                <thead>
                                <tr>
                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1"
                                        colspan="1" aria-sort="ascending"
                                        aria-label="Rendering engine: activate to sort column descending">ID
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                        aria-label="Browser: activate to sort column ascending">Наименование
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                        aria-label="Platform(s): activate to sort column ascending">Тип
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                        aria-label="Engine version: activate to sort column ascending" style="">Сумма, млн. руб.
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                        aria-label="CSS grade: activate to sort column ascending" style="">Статус
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                        aria-label="CSS grade: activate to sort column ascending" style="">
                                        Действия
                                    </th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($projects as $project)
                                    <tr class="odd">
                                        <td>{{ $project['id'] }}</td>
                                        <td>{{ $project['name'] }}</td>
                                        <td>{{ $project['type'] }}</td>
                                        <td>{{ $project['amount'] }}</td>
                                        <td>{{ $project['status'] }}</td>
                                        <td class="text-center">
                                            <div class="align-middle" style="height: 20px;">
                                                <form action="{{ route('project.delete', $project) }}" method="post" id="form-id-{{ $project->id }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    {{--                                        <a data-tooltip="Подробнее" style="font-size: x-small;" href="{{ route('loans.show', $loan) }}">--}}
                                                    {{--                                            <i class="far fa-2x fa-eye"></i>--}}
                                                    {{--                                        </a>--}}

                                                    <a data-tooltip="Подробнее" style="font-size: x-small;" href="#">
                                                        <i class="far fa-2x fa-eye"></i>
                                                    </a>
                                                    <a data-tooltip="Редактирование" style="font-size: x-small;" href="№">
                                                        <i class="far fa-2x fa-edit"></i>
                                                    </a>
                                                    <a data-tooltip="Удаление" style="font-size: x-small;" href="#" onclick="document.getElementById('form-id-{{ $project->id }}').submit();">
                                                        <i class="far fa-2x fa-window-close"></i>
                                                    </a>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th rowspan="1" colspan="1">ID</th>
                                    <th rowspan="1" colspan="1">Наименование</th>
                                    <th rowspan="1" colspan="1">Тип</th>
                                    <th rowspan="1" colspan="1" style="">Сумма, млн. руб.</th>
                                    <th rowspan="1" colspan="1" style="">Статус</th>
                                </tr>
                                <div class="d-flex">
                                    {!! $projects->links() !!}
                                </div>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
