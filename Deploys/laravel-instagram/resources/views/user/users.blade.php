@extends('layouts.app')

@section('content')
@if(count($users) == 0)
<div class="h-100 w-100 tl-0 position-absolute d-flex justify-content-center align-items-center">
        <div class="instagram-logo"></div>
</div>
@else
<div class="container pb-5">
    <h2 class="users-title text-center">{{ $title ?? 'Usarios de la red social' }}</h2>
    <div class="users-flex d-flex">
    @foreach ($users as $user)
    <div class="perfil pt-5 d-flex align-items-center">
            <div class="perfil-avatar">
                    <a href="{{ route('user_perfil', ['nick' => $user->nick]) }}"><img src="{{ route('user_avatar', ['file_name' => $user->image]) }}" alt="perfil-avatar" class="perfil-avatar-img d-block border rounded-circle"></a>
            </div>
            <div class="perfil-content users-content">
                <div class="perfil-header mb-2 d-flex align-items-center">
                    <p class="perfil-nick mb-0"><a href="{{ route('user_perfil', ['nick' => $user->nick]) }}" class
                        ="text-dark">{{ $user->nick }}</a></p>
                </div>
                <div class="perfil-data mb-3">
                    <p class="mb-0 perfil-name"><strong>{{ $user->name . ' ' . $user->surname }}</strong></p>
                </div>
                <div class="perfil-created">
                    <p class="mb-0 text-muted">Se unio {{ \FormatTime::LongTimeFilter($user->created_at) }}</p>
                </div>
            </div>
        </div>
    @endforeach
    </div>
</div>
@endif
@endsection
