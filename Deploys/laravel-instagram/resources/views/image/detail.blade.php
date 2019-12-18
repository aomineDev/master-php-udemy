@extends('layouts.app')

@section('content')
<div class="container">

    @include('includes.message')

    <div class="row justify-content-center">

        <div class="col-md-8 col-lg-6">
            <div class="card">
                <img src="{{ route('image_get', ['file_name' => $image->image_path]) }}" alt="image" class="card-img-top d-block">
            </div>
        </div>

        <div class="col-md-8 col-lg-5">
            <div class="card">
                <div class="card-header bg-transparent d-flex align-items-center">
                     <a href="{{ route('user_perfil', ['id' => $image->user->nick] )}}" class="d-flex align-items-center text-dark">
                        <div class="avatar">
                            <img src="{{ route('user_avatar', ['file_name' => $image->user->image]) }}" alt="user avatar" class="avatar-img d-block rounded-circle">
                        </div>
                        <div class="ml-2">
                            <strong>{{ "{$image->user->nick}" }}</strong>
                        </div>
                    </a>
                </div>
                <div class="card-body">
                    <p><strong>{{ "{$image->user->nick}" }}</strong> {{ $image->description }}</p>
                    <p><span class="imgDetail-comments-count">{{ count($image->comments) }}</span><span class="imgDetail-comments-text">{{ count($image->comments) == 1 ? " comentario" : " comentarios" }}</span></p>
                    <div class="imgDetail-comments">
                        @foreach ($image->comments as $comment)
                        <p class="imgDetail-comments-comment"><strong>{{ $comment->user->nick }}</strong> <span>{{ $comment->content }}</span>
                        @if(Auth::check() && ($comment->user_id == Auth::user()->id || $comment->image->user_id == Auth::user()->id))
                            <a href="javascript:void(0)"class="imgDetail-comments-delete" data-id="{{ $comment->id }}"><i class="fas fa-trash"></i></a>
                        @endif
                        </p>
                        @endforeach
                    </div>
                    <div class="imgDetail-social d-flex justify-content-between align-items-center">
                        <div class="imgDetail-social-icons">
                            @php $user_like = false @endphp
                            @foreach ($image->likes as $like)
                            @if ($like->user->id == Auth::user()->id)
                                @php $user_like = true @endphp
                            @endif
                            @endforeach
                            @if ($user_like)
                                <a href="javascript:void(0)" class="social-interactive d-inline-block"><i class="fas fa-heart  text-danger like-interactive" data-id="{{ $image->id }}"></i></a>
                            @else
                                <a href="javascript:void(0)" class="social-interactive d-inline-block"><i class="far fa-heart like-interactive" data-id="{{ $image->id }}"></i></a>
                            @endif
                            <span class="social-like-count d-inline-block">{{ count($image->likes) }}</span>
                            <a href="javascript:void(0)" class="social-interactive social-interactive-comments d-inline-block ml-2"><i class="far fa-comment"></i></a>
                        </div>
                        @if(Auth::user()->id == $image->user->id)
                        <div class="imgDetail-actions">
                            <a href="javascript:void(0)" class="imgDetail-actions-links d-inline-block" data-toggle="modal" data-target="#deleteModal"><i class="fas fa-trash-alt"></i></a>
                            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="deleteModallLabel">Delete image</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>¿Estas seguro de eliminar esta imagen?</p>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      <a href="{{ route('image_delete', ['id' => $image->id]) }}"  class="btn btn-danger">Delete Image</a>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            <a href="{{ route('image_edit', ['id' => $image->id]) }}" class="imgDetail-actions-links d-inline-block ml-3"><i class="fas fa-user-edit"></i></a>
                        </div>
                        @endif
                    </div>
                    <p><small class="text-muted">{{ \FormatTime::LongTimeFilter($image->created_at) }}</small></p>
                    <form action="javascript:void(0)" method="POST" class="imgDetail-form d-flex" autocomplete="off" name="imgDetailForm">
                        @csrf
                        <input type="hidden" name="image_id" value="{{ $image->id }}" class="imgDetail-form-imageId">
                        <input type="text" name="content" placeholder="Añade un comentario..." class="imgDetail-form-input w-100 {{ $errors->has('content') ? 'is-invalid' : '' }}" data-nick="{{ Auth::user()->nick }}">
                        <button class="imgDetail-form-btn text-primary bg-transparent">Publicar</button>
                    </form>
                    @if ($errors->has('content'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('content') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
