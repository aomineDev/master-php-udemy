<div class="card mb-5">
    <div class="card-header bg-transparent">
        <a href="{{ route('user_perfil', ['id' => $image->user->nick] )}}" class="d-flex align-items-center text-dark">
            <div class="avatar">
                <img src="{{ route('user_avatar', ['file_name' => $image->user->image]) }}" alt="user avatar" class="avatar-img d-block rounded-circle">
            </div>
            <div class="ml-2">
                <strong>{{ "{$image->user->nick}" }}</strong>
            </div>
        </a>
    </div>
    <a href="{{ route('image_detail', ['id' => $image->id]) }}"><img src="{{ route('image_get', ['file_name' => $image->image_path]) }}" alt="image" class="card-img-top  d-block"></a>
    <div class="card-body">
         <div class="mb-2">
        @php $user_like = false @endphp
        @foreach ($image->likes as $like)
        @if ($like->user->id == Auth::user()->id)
            @php $user_like = true @endphp
        @endif
        @endforeach
            @if ($user_like)
                <a href="javascript:void(0)" class="social-interactive d-inline-block"><i class="fas fa-heart  text-danger like-interactive" data-id="{{ $image->id }}"></i></a>
            @else
                <a href="javascript:void(0)" class="social-interactive d-inline-block "><i class="far fa-heart like-interactive" data-id="{{ $image->id }}"></i></a>
            @endif
            <span class="social-like-count d-inline-block">{{ count($image->likes) }}</span>
            <a href="{{ route('image_detail', ['id' => $image->id ]) }}" class="social-interactive d-inline-block ml-3"><i class="far fa-comment"></i></a>
        </div>
        <p><strong>{{ "{$image->user->nick}" }}</strong> {{ $image->description }}</p>
        <p>{{ count($image->comments) == 1 ? count($image->comments) . " comentario" : count($image->comments) . " comentarios" }}</p>
        <p><small class="text-muted">{{ \FormatTime::LongTimeFilter($image->created_at) }}</small></p>
         <a href="{{ route('image_detail', ['id' => $image->id ]) }}" class="card-link">Agregar un comentario</a>
    </div>
</div>
