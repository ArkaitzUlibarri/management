@extends('layouts.app')

@section('headJs')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/b-1.5.2/datatables.min.css"/>
@endsection

@section('breadcrumbs', Breadcrumbs::render('users.index'))

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">

            @include('flash::message')

            <div class="card">
                <div class="card-header">
                    <h2 class="float-left">
                        <i class="fa fa-users"></i> Users
                    </h2>
                    <a href="{{ route('users.create') }}" class="btn btn-primary float-right m-0">
                        <i class="fa fa-user-plus"></i> New User
                    </a>
                </div>
                <div class="card-body">
                    {!! $dataTable->table(['class' => 'table table-bordered']) !!}
                </div>
            </div>

        </div>
    </div>
</div>

@endsection

@section('innerJs')
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/b-1.5.2/datatables.min.js"></script>
<script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>
{!! $dataTable->scripts() !!}
<script src="{{ asset('js/datatables/buttons.js') }}"></script>
@endsection
