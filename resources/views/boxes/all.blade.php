@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row">
        @foreach($boxes as $box)
            <div class="col-md-3">
                <div class="card border-secondary my-3" style="max-width: 20rem;">
                    <div class="card-header">
                        {{ $box->supplierName }}
                        <form method="POST" action="{{ route('delete',['id' => $box->id]) }}">
                            @csrf
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </div>
                    <div class="card-body">
                    <h6 class="card-title">{{ $box->supplierDateClaim }}</h6>
                    <p class="card-text">
                        @if(Auth::user()->role_id == 1)
                        Technicien : {{ $box->technicien }}
                        <hr>
                        @endif
                        Reference : {{ $box->supplierReference }}
                        <hr>
                        Issue : {{ $box->supplierIssue  }}
                    </p>
                    </div>
                    <a class="btn btn-success m-2" href="#">Export Excel</a>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection