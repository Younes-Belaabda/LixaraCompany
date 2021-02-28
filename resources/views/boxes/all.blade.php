@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row">
        @foreach($files as $file)
            <div class="col-md-3">
                <div class="card border-secondary my-3" style="max-width: 20rem;">
                    <div class="card-header">
                        {{ $file->supplier }}
                        <form method="POST" action="{{ route('delete',['id' => $file->id]) }}">
                            @csrf
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </div>
                    <div class="card-body">
                    <h6 class="card-title">{{ $file->reference }}</h6>
                    <h6 class="card-title">{{ $file->technicien }}</h6>
                    <p class="card-text">
                        <a href="{{ route('download',[
                            'id' => $file->id
                        ]) }}" class="badge badge warning">Download</a>
                    </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection