@extends('layouts.app')

@section('content')

<div id="ringLoad" class="ringLoad">
    <div class="instagram-logo"></div>
</div>

@if(count($images) == 0)
<div class="h-100 w-100 tl-0 position-absolute d-flex justify-content-center align-items-center">
        <div class="instagram-logo"></div>
</div>
@else
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            @include('includes.message')
            @foreach ($images as $image)
                @include('includes.card', ['image' => $image])
            @endforeach
        </div>
    </div>
    <div class="d-flex justify-content-center">
            {{ $images->links() }}
    </div>
</div>
@endif
@endsection
