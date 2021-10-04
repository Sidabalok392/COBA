@extends('dashboard')

@section('content')

    <div class="d-flex justify-content-between mt-5 mb-5">
        <div>
            <h2>Show Faculty</h2>
        </div>
        <div>
            <a class="btn btn-secondary" href="{{ route('faculties.index') }}">Back</a>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Faculty ID:</strong>
                {{ $faculties->id }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Faculty Name:</strong>
                {{ $faculties->nama_fakultas }}
            </div>
        </div>
    </div>
    @endsection