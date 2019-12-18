@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        @include('includes.message')
            <div class="card">
                <div class="card-header">
                    @if(isset($image))
                    Editar mi imagen
                    @else
                    Subir una imagen
                    @endif
                </div>

                <div class="card-body">
                    @php
                        if(isset($image)){
                            $route = route('image_update', ['id' => $image->id]);
                        }else{
                            $route = route('image_save');
                        }
                    @endphp
                    <form method="POST" action="{{ $route }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="image_path" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>
                            <div class="col-md-6 custom-file ml-3">
                                @if (isset($image))
                                    <input type="file" class="custom-file-input{{ $errors->has('image_path') ? ' is-invalid' : '' }}" name="image_path" id="image_path">
                                @else
                                    <input type="file" class="custom-file-input{{ $errors->has('image_path') ? ' is-invalid' : '' }}" name="image_path" id="image_path" required>
                                @endif
                                    <label class="custom-file-label" for="image_path">Choose file</label>

                                    @if ($errors->has('image_path'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('image_path') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>
                            <div class="col-md-7">
                                <textarea type="file" class="form-textarea form-control" name="description" id="description" required>{{ $image->description ?? '' }}</textarea>

                                    @if ($errors->has('description'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                         </div>

                         @if(isset($image))
                         <div class="form-group text-center">
                             <img src="{{ route('image_get', ['file_name' => $image->image_path]) }}" alt="user avatar" class="form-avatar">
                         </div>
                         @endif

                        <div class="form-group mb-0">
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary">
                                    Upload Image
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
