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
                <span class="text-uppercase fw-semibold">Ajouter un produit</span>
                <a href="{{ route('products.index') }}" class="btn btn-light"><span>Retour</span></a>
            </div>
            <div class="col-12 grid-margin stretch-card mt-3">
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample row" method="post" action="{{ route('products.store') }}" id="productForm"
                            name="productForm" enctype="multipart/form-data">
                            @csrf
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="title">Titre</label>
                                    <input type="text" class="form-control" name="title" id="title"
                                        placeholder="Titre" required>
                                </div>
                                <div class="form-group">
                                    <label for="slug">Slug</label>
                                    <input type="text" class="form-control" name="slug" id="slug"
                                        placeholder="Slug" required readonly>
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" name="description" id="description" placeholder="Description"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Choisir une image</label>
                                    <input type="file" name="image" class="file-upload-default">
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" disabled
                                            placeholder="Insérer votre image...">
                                        <span class="input-group-append">
                                            <button class="file-upload-browse btn btn-primary"
                                                type="button">Choisir</button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="price">Prix</label>
                                    <input type="number" step="0.01" class="form-control" name="price" id="price"
                                        placeholder="Prix" required>
                                </div>
                                <div class="form-group">
                                    <label for="compare_price">Prix de comparaison</label>
                                    <input type="number" step="0.01" class="form-control" name="compare_price"
                                        id="compare_price" placeholder="Prix de comparaison">
                                </div>
                                <div class="form-group">
                                    <label for="category_id">Catégories</label>
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
                                    <label for="sub_category_id">Sous-catégorie</label>
                                    <select class="form-select text-black" name="sub_category_id" id="sub_category_id">
                                        <option value="" class="text-black" selected disabled>Choisissez une sous
                                            catégories....</option>
                                        @if ($subCategories->isNotEmpty())
                                            @foreach ($subCategories as $subCategory)
                                                <option value="{{ $subCategory->id }}" class="text-black">
                                                    {{ $subCategory->name }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="brand_id">Marque</label>
                                    <select class="form-select text-black" name="brand_id" id="brand_id">
                                        <option value="" class="text-black" selected disabled>Choisissez une
                                            marque....</option>
                                        @if ($brands->isNotEmpty())
                                            @foreach ($brands as $brand)
                                                <option value="{{ $brand->id }}" class="text-black">{{ $brand->name }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="is_featured">En vedette</label>
                                    <select class="form-select text-black" name="is_featured" id="is_featured">
                                        <option value="Yes" class="text-black">Oui</option>
                                        <option value="No" class="text-black">Non</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="sku">SKU</label>
                                    <input type="text" class="form-control" name="sku" id="sku"
                                        placeholder="SKU" required>
                                </div>
                                <div class="form-group">
                                    <label for="barcode">Code-barres</label>
                                    <input type="text" class="form-control" name="barcode" id="barcode"
                                        placeholder="Code-barres">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="track_qty">Suivre la quantité</label>
                                    <select class="form-select text-black" name="track_qty" id="track_qty">
                                        <option value="Yes" class="text-black">Oui</option>
                                        <option value="No" class="text-black">Non</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="qty">Quantité</label>
                                    <input type="number" class="form-control" name="qty" id="qty"
                                        placeholder="Quantité">
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-select text-black" name="status" id="status">
                                        <option value="1" class="text-black">Actif</option>
                                        <option value="0" class="text-black">Inactif</option>
                                    </select>
                                </div>
                            </div>
                            <div class="button-container d-flex align-items-center justify-content-between">
                                <button type="submit" class="btn btn-primary"
                                    id="submitBtn"><span>Ajouter</span></button>
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
        const nameInput = document.getElementById('title');
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
