@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-7">
        <div class="row">
            <div class="col-md-4">
                <div class="card text-white bg-info">
                    <div class="card-header">Data Projek</div>
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-success">
                    <div class="card-header">Data ODP</div>
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-danger">
                    <div class="card-header">Data ODC</div>
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="row">
            <div class="col-md">
                <div class="card border-dark">
                    <div class="card-header">Terbaru</div>
                    <div class="card-body text-dark">
                        <h5 class="card-title"></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
