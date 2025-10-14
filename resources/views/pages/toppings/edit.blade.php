@extends('layouts.app')

@section('title', 'Edit ' . $topping->name)

@section('breadcrumb')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0">{{$topping->name}}</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">
                <a href="{{ route('toppings.index') }}">Toppings</a>
            </li>
            <li class="breadcrumb-item active">Edit {{ $topping->name }}</li>
        </ol>
    </div>
</div>
@endsection

@section('content')
<div class="row justify-content-center mt-4">
    <div class="col-md-6">
        <div class="card shadow-sm border-0">
            <img src="{{ asset($topping->url) }}" class="card-img-top" alt="topping" style="object-fit: cover; height: 350px;">

            <div class="card-body text-center">

                @if(session('success'))
                    <div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger text-start">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('toppings.update', $topping) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3 text-start">
                        <label for="name" class="form-label fw-semibold">Name</label>
                        <input 
                            type="text" 
                            name="name" 
                            id="name" 
                            value="{{ old('name', $topping->name) }}" 
                            class="form-control @error('name') is-invalid @enderror" 
                            required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3 text-start">
                        <label for="description" class="form-label fw-semibold">Description</label>
                        <textarea 
                            name="description" 
                            id="description" 
                            rows="3" 
                            class="form-control @error('description') is-invalid @enderror">{{ old('description', $topping->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3 text-start">
                        <label for="price" class="form-label fw-semibold">Price ($)</label>
                        <input 
                            type="number" 
                            step="0.01" 
                            name="price" 
                            id="price"
                            min="0" 
                            max="120"
                            value="{{ old('price', $topping->price) }}" 
                            class="form-control @error('price') is-invalid @enderror" 
                            required>
                        @error('price')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    @if($topping->url)
                    <div class="mb-3 text-center">
                        <img src="{{ asset($topping->url) }}" alt="{{ $topping->name }}" class="img-thumbnail mb-2" style="max-height: 200px;">
                        <p class="text-muted small">Current image</p>
                    </div>
                    @endif

                    <div id="preview-container" class="text-center mb-2" style="display:none;">
                        <p class="text-muted small mb-1">New selected image:</p>
                        <img id="preview-image" class="img-thumbnail shadow-sm" style="max-height: 200px; object-fit: cover;">
                    </div>

                    <div class="mb-3 text-start">
                        <label for="url" class="form-label fw-semibold">Image</label>
                        <input 
                            type="file" 
                            name="url" 
                            id="url" 
                            class="form-control @error('url') is-invalid @enderror">
                        @error('url')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-center mt-4" style="gap: 10px">
                        <a href="{{ route('toppings.index') }}" class="btn btn-secondary btn-lg">Cancel</a>
                        <button type="submit" class="btn btn-primary btn-lg">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    setTimeout(function() {
        const alert = document.getElementById('success-alert');
        if(alert){
            alert.classList.remove('show');
            alert.classList.add('fade');
            setTimeout(() => alert.remove(), 300);
        }
    }, 5000);

    const fileInput = document.getElementById('url');
    const previewContainer = document.getElementById('preview-container');
    const previewImage = document.getElementById('preview-image');

    if (fileInput) {
        fileInput.addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImage.src = e.target.result;
                    previewContainer.style.display = 'block';
                }
                reader.readAsDataURL(file);
            } else {
                previewContainer.style.display = 'none';
                previewImage.src = '';
            }
        });
    }

    document.getElementById('price').addEventListener('input', function(e) {
        const value = e.target.value;
        if (!/^\d*\.?\d{0,2}$/.test(value)) {
            e.target.value = value.slice(0, -1);
        }
    });
</script>
@endsection


