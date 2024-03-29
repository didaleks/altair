@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-md-10">
            <table class="table table-striped">
                <thead>
                <tr>
                    <td>#</td>
                    <td>Имя</td>
                    <td>Телефон</td>
                    <td>Почта</td>
                    <td>Тип</td>
                    <td class="text-right">
                    </td>
                </tr>
                </thead>
                <tbody>

                    @foreach ($models as $model)
                        <tr>
                            <td>{{ $model->id }}</td>
                            <td>{{ $model->name }}</td>
                            <td>{{ $model->phone }}</td>
                            <td>{{ $model->email }}</td>
                            <td>{{ $model->type_word() }}</td>
                            <td class="text-right">
                                <a href="{{ route($name . '.edit', ['id' => $model->id]) }}" class="mr-3"><span data-feather="eye"></span></a>
                                <a href="{{ route($name . '.delete', ['id' => $model->id]) }}" onclick="return confirm('Действительно удалить &quot;{{ $model->name }}&quot; ?')"><span data-feather="trash"></span></a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>

            <div class="row">
                <div class="col-md-12 d-flex justify-content-end">
                    {{ $models->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection
