@extends('layouts.main')

@section('title','Import Excel File')

@section('content')
    <div class="container">
        <form 
            class="p-2" 
            method="POST" 
            action="{{ route('upload') }}"
            enctype="multipart/form-data">
            @csrf
            <fieldset>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="supplier">Supplier</label>
                            <input 
                                name="supplier"
                                type="supplier" 
                                class="form-control" 
                                id="supplier"/>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="reference">Reference</label>
                            <input 
                                name="reference"
                                type="text" 
                                class="form-control" 
                                id="reference"/>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="file">Excel File</label>
                            <input 
                                name="file"
                                type="file" 
                                class="form-control" 
                                id="file"/>
                        </div>
                    </div>
                </div>
            <button type="submit" class="btn btn-primary">Import</button>
            </fieldset>
        </form>
    </div>
@endsection