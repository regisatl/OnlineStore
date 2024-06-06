@extends('admin.layouts.app')

@section('content')
    <!-- partial:partials/_navbar.html -->
    @include('admin.layouts.header')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.layouts.sidebar')
        <!-- partial -->

        <div class="container mx-auto mt-5">
            <div class="d-flex justify-content-between align-items-center card-title">
                <span class="text-uppercase fw-semibold">Ajouter une sous catégorie</span>
                <a href="{{ route('subcategories.index') }}" class="btn btn-light"><span>Retour</span></a>
            </div>
            <div class="col-12 grid-margin stretch-card mt-3">
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample" method="post" action="{{ route('subcategories.store') }}"
                            id="subcategoryForm" name="subcategoryForm" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="category">Catégories</label>
                                <select class="form-select text-black" name="category_id" id="category_id">
                                    <option value="" class="text-black" selected disabled>Choisissez une
                                        catégories....</option>
                                    @if ($categories->isNotEmpty())
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" class="text-black">{{ $category->name }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name">Nom</label>
                                <input type="text" class="form-control" name="name" id="name"
                                    placeholder="sous catégories" required>
                            </div>
                            <div class="form-group">
                                <label for="slug">Slug</label>
                                <input type="text" class="form-control" name="slug" id="slug" placeholder="Slug"
                                    required readonly>
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-select text-black" name="status" id="status">
                                    <option value="1" class="text-black">Actif</option>
                                    <option value="0" class="text-black">Inactif</option>
                                </select>
                            </div>
                            <div class="button-container d-flex align-items-center justify-content-between">
                                <button type="submit" class="btn btn-success" id="submitBtn"><span>Ajouter</span></button>
                                <button type="reset" class="btn btn-light"><span>Annuler</span></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
@endsection

@section('customJS')
    <script>
        const nameInput = document.getElementById('name');
        const slugInput = document.getElementById('slug');

        nameInput.addEventListener('input', () => {
            const nameValue = nameInput.value.trim();
            const slugValue = nameValue.replace(/\s+/g, '-').toLowerCase();
            slugInput.value = slugValue;
        });

        submitBtn.addEventListener('click', () => {
            submitBtn.disabled = true;
            submitBtn.classList.add('disabled');
        });
    </script>
@endsection
