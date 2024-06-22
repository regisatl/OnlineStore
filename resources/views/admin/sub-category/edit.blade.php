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
                <span class="text-uppercase fw-semibold">Modifier une sous catégorie</span>
                <a href="{{ route('subcategories.index') }}" class="btn btn-light"><span>Retour</span></a>
            </div>
            <div class="col-12 grid-margin stretch-card mt-3">
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample" method="post"
                            action="{{ route('subcategories.update', $subCategory->id) }}" id="subcategoryForm"
                            name="subcategoryForm" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="category">Catégories</label>
                                <select class="form-select text-black" name="category_id" id="category_id">
                                    <option value="" class="text-black" selected disabled>Choisissez une
                                        catégories....</option>
                                    @if ($categories->isNotEmpty())
                                        @foreach ($categories as $category)
                                            <option {{ $subCategory->category_id == $category->id ? 'selected' : '' }}
                                                value="{{ $category->id }}" class="text-black">{{ $category->name }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name">Nom</label>
                                <input type="text" value="{{ $subCategory->name }}" class="form-control" name="name"
                                    id="name" placeholder="sous catégories" required>
                            </div>
                            <div class="form-group">
                                <label for="slug">Slug</label>
                                <input type="text" value="{{ $subCategory->slug }}" class="form-control" name="slug"
                                    id="slug" placeholder="Slug" required readonly>
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-select text-black" name="status" id="status">
                                    <option {{ $subCategory->status == 1 ? 'selected' : '' }} value="1"
                                        class="text-black">Actif</option>
                                    <option {{ $subCategory->status == 0 ? 'selected' : '' }} value="0"
                                        class="text-black">Inactif</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="show_home">Afficher sur l'accueil</label>
                                <select class="form-select text-black" name="show_home" id="show_home">
                                    <option {{ $subCategory->show_home == 'Yes' ? 'selected' : '' }} value="Yes"
                                        class="text-black">Oui</option>
                                    <option {{ $subCategory->show_home == 'No' ? 'selected' : '' }} value="No"
                                        class="text-black">Non</option>
                                </select>
                            </div>
                            <div class="button-container d-flex align-items-center justify-content-between">
                                <button type="submit" class="btn btn-success" id="submitBtn"><span>Modifier</span></button>
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
