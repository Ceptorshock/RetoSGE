@extends('auth.register')

@section('categories')

<div class="row mb-3">
    <label for="category_id" class="col-md-4 col-form-label text-md-end">{{ __('Categoria:') }}</label>
    <select class="form-select" name="category_id" id="category_id">
        @foreach ($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
    </select>
</div>
@endsection