@extends('layouts.web')

@section('content')
    <section>
        <div class="row">
            <div class="col-xl-6">
                <h1>{{ $model->name }}</h1>
                {!! $model->text !!}
            </div>
        </div>
    </section>
@endsection
