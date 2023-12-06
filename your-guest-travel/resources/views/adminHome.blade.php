@extends('layouts.app')
<title>Dashboard</title>

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Admin: {{auth()->user()->name}}</div>
                    <div class="card-body">

                    </div>
                    <div class="card-body">
                        @if ($message = Session::get('status'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                        @include('partials.upload')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
