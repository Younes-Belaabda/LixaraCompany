@extends('layouts.main')

@section('title','add new box')

@section('content')
<div class="container">
    <form class="p-2" method="POST" action="{{ route('generateExcel') }}">
        @csrf
        <fieldset>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="date">Date</label>
                        <input 
                            name="date"
                            type="date" 
                            class="form-control" 
                            id="date"/>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="partnumber">Part Number</label>
                        <input 
                            name="partnumber"
                            type="text" 
                            class="form-control" 
                            id="partnumber"/>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="issue">Issue</label>
                        <input 
                            name="issue"
                            type="text" 
                            class="form-control" 
                            id="issue"/>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="productiondate">Production Date</label>
                        <input 
                            name="productiondate"
                            type="number" 
                            class="form-control" 
                            id="productiondate"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="batchnumber">Batch Number</label>
                        <input 
                            name="batchnumber"
                            type="text" 
                            class="form-control" 
                            id="batchnumber"/>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="quantity">Quantity / Box</label>
                        <input 
                            name="quantity"
                            type="number" 
                            class="form-control" 
                            id="quantity"/>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="goodpart">Good Part</label>
                        <input 
                            name="goodpart"
                            type="number" 
                            class="form-control" 
                            id="goodpart"/>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="badpart">Bad Part</label>
                        <input 
                            name="badpart"
                            type="number" 
                            class="form-control" 
                            id="badpart"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="rework">Rework</label>
                        <input 
                            name="rework"
                            type="number" 
                            class="form-control" 
                            id="rework"/>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="row">Row Number</label>
                        <input 
                            name="row"
                            type="number" 
                            class="form-control" 
                            id="row"/>
                    </div>
                </div>
            </div>
        <button type="submit" class="btn btn-primary">Generate Excel</button>
        </fieldset>
    </form>
</div>
@endsection