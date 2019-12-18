@extends('layouts.app')

@section('content')
@if(count($favorites) == 0)
<div class="h-100 w-100 tl-0 position-absolute d-flex justify-content-center align-items-center">
        <div class="instagram-logo"></div>
</div>
@else
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            @foreach ($favorites as $favorite)
            @include('includes.card', ['image' => $favorite->image])
            @endforeach
        </div>
    </div>
    <div class="d-flex justify-content-center">
            {{ $favorites->links() }}
    </div>
</div>
@endif
@endsection
