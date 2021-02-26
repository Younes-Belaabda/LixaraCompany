@extends('layouts.main')

@section('title','add new box')

@section('content')
<div class="container">
    <form class="p-2" method="POST" action="{{ route('store') }}">
        @csrf
        <fieldset>
        {{-- <legend>Add New Box</legend> --}}
        <div class="row">
            {{-- Supplier Info --}}
            <div class="col-md-6">
                {{-- Supplier name --}}
                <div class="form-group">
                    <label for="supplierName">Supplier name</label>
                    <input 
                        name="sp_name"
                        type="text" 
                        class="form-control" 
                        id="supplierName"
                        placeholder="Enter Supplier Name">
                </div>
                {{-- Supplier reference --}}
                <div class="form-group">
                    <label for="supplierReference">Supplier reference</label>
                    <input 
                        name="sp_ref"
                        type="text" 
                        class="form-control" 
                        id="supplierReference"
                        placeholder="Enter Supplier Reference">
                </div>
                {{-- Issue designation --}}
                <div class="form-group">
                    <label for="supplierIssueDesignation">Supplier issue designation</label>
                    <input 
                        name="sp_designation"
                        type="text" 
                        class="form-control" 
                        id="supplierIssueDesignation"
                        placeholder="Enter Supplier Issue Designation">
                </div>
                {{-- Claim number --}}
                <div class="form-group">
                    <label for="supplierClaimNumber">Claim number</label>
                    <input 
                        name="sp_claim_number"
                        type="number" 
                        class="form-control" 
                        id="supplierClaimNumber"
                        placeholder="Enter Supplier Claim Number">
                </div>
                {{-- Date Reclamation --}}
                <div class="form-group">
                    <label for="supplierDateReclamation">Date Reclamation</label>
                    <input 
                        name="sp_date_claim"
                        type="date" 
                        class="form-control" 
                        id="supplierDateReclamation">
                </div> 
                {{-- Box Number --}}
                <div class="form-group">
                    <label for="boxNumber">Box Number</label>
                    <input 
                        name="box_number"
                        type="number" 
                        class="form-control" 
                        id="boxNumber"
                        placeholder="Enter box number">
                </div>
                {{-- Date Consultation --}}
                <div class="form-group">
                    <label for="dateConsultationNumber">Date Consultation</label>
                    <input 
                        name="box_date_consultation"
                        type="date" 
                        class="form-control" 
                        id="dateConsultationNumber"
                        placeholder="Enter box number">
                </div> 
            </div>
            {{-- Product Info --}}
            <div class="col-md-6">
                {{-- Part Number --}}
                <div class="form-group">
                    <label for="partNumber">Part number</label>
                    <input
                        name="box_part_number" 
                        type="text" 
                        class="form-control" 
                        id="partNumber"
                        placeholder="Enter box number">
                </div>
                {{-- Issue --}}
                <div class="form-group">
                    <label for="boxIssue">Box Issue</label>
                    <input 
                        name="box_issue" 
                        type="text" 
                        class="form-control" 
                        id="boxIssue"
                        placeholder="Enter box number">
                </div>
                {{-- Batch Numbers --}}
                <div class="form-group">
                    <label for="batchNumber">Batch Number</label>
                    <input 
                        name="box_batch_number" 
                        type="text" 
                        class="form-control" 
                        id="batchNumber" 
                        placeholder="Enter batch number">
                </div>
                {{-- Quantity --}}
                <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <input 
                        name="box_quantity" 
                        type="number" 
                        class="form-control" 
                        id="quantity"
                        placeholder="Enter box quantity">
                </div>
                {{-- GoodParts --}}
                <div class="form-group">
                    <label for="goodParts">Good Parts</label>
                    <input 
                        name="box_good_part" 
                        type="number" 
                        class="form-control" 
                        id="goodParts"
                        placeholder="Enter good parts">
                </div>
                {{-- ngParts --}}
                <div class="form-group">
                    <label for="badParts">Bad Parts</label>
                    <input 
                        name="box_bad_part" 
                        type="number" 
                        class="form-control" 
                        id="badParts"
                        placeholder="Enter bad parts">
                </div>
                {{-- rework --}}
                <div class="form-group">
                    <label for="rework">Rework</label>
                    <input 
                        name="box_rework" 
                        type="number" 
                        class="form-control" 
                        id="rework"
                        placeholder="Enter box number">
                </div>
            </div>
        </div>
        
        
        <button type="submit" class="btn btn-primary">Add Box</button>
        </fieldset>
    </form>
</div>
@endsection