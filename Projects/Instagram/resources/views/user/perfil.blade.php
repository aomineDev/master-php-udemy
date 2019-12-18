@extends('layouts.app')

@section('content')
    <div class="container">
    @include('includes.message')
        <div class="perfil w-75 mx-auto pt-4 d-flex align-items-center">
            <div class="perfil-avatar">
                    <img src="{{ route('user_avatar', ['file_name' => $user->image]) }}" alt="perfil-avatar" class="perfil-avatar-img d-block border rounded-circle">
            </div>
            <div class="perfil-content">
                <div class="perfil-header mb-2 d-flex align-items-center">
                    <p class="perfil-nick mb-0">{{ $user->nick }}</p>
                    @if($user->id == Auth::user()->id )
                    <a href="{{ route('user_config') }}" class="perfil-edit border mx-3 rounded text-dark">Editar perfil</a>
                    <a href="javascript:void(0)" class="text-dark perfil-config"data-toggle="modal" data-target="#config"><i class="fas fa-cog"></i></a>
                    <div class="modal fade" id="config" tabindex="-1" role="dialog" aria-labelledby="config" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-body text-center modal-config">
                                    <a href="{{ route('formChangePassword') }}" class="text-dark d-block modal-config-password">Change Password</a>
                                    <a href="{{ route('logout') }}" class="text-dark d-block modal-config-logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="perfil-socialData">
                    <p class="lead mb-3"><strong>{{ count($images) }}</strong> {{ count($images) == 1 ? 'publicación' : 'publicaciones' }}</p>
                </div>
                <div class="perfil-data">
                    <p class="mb-3 perfil-name"><strong>{{ $user->name . ' ' . $user->surname }}</strong></p>
                </div>
            </div>
        </div>

        <div class="myImages mt-5">
            <div class="myImages-tab d-flex justify-content-center">
                    <p class="myImages-tab-link pt-2 m-0"><i class="fas fa-th"></i> Publicaciones</p>
            </div>
            @if(count($images) == 0)
            <div class="mt-5 d-flex justify-content-center align-items-center">
                    <div class="instagram-logo"></div>
            </div>
            @else
            <div class="myImages-grid">
                @foreach($images as $index => $image)
                <a href="{{ route('image_detail', ['id' => $image->id]) }}" class="myImages-grid-item d-block">
                    <div class="myImages-grid-itemOverlay justify-content-center align-items-center">
                        <p class="text-light mb-0"><i class="fas fa-heart"></i> <span class="mr-3">{{ count($image->likes) }}</i></span><i class="fas fa-comment ml-3"></i> {{ count($image->comments) }}</p>
                    </div>
                    <img src="{{ route('image_get', ['id' => $image->image_path]) }}" class="myImages-grid-img" alt="image {{ $index + 1 }}">
                </a>
                @endforeach
            </div>
            @endif
        </div>
    </div>
@endsection

@section('footer')
    @if(count($images) > 0 )
    <footer class="footer d-flex align-items-center justify-content-around text-primary pt-5 pb-2">
        <p>Información</p>
        <p>Asistencia</p>
        <p>API</p>
        <p>Empleo</p>
        <p>Privacidad</p>
        <p>Condiciones</p>
        <p>Idioma</p>
        <small class="footer-copy mb-3">&copy; {{ date('Y') }} Fake Instagram</small>
    </footer>
    @endif
@endsection
