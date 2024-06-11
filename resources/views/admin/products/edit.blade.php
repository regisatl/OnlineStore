@extends('admin.layouts.app')
@section('content')
    <!-- partial:partials/_navbar.html -->
    @include('admin.layouts.header')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.layouts.sidebar')
        <!-- partial -->

        <div class="container mx-auto mt-2">
            <div class="d-flex justify-content-between align-items-center card-title">
                <span class="text-uppercase fw-semibold">Modifier un produit</span>
                <a href="{{ route('products.index') }}" class="btn btn-light"><span>Retour</span></a>
            </div>
            <div class="col-12 grid-margin stretch-card mt-3">
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample row" method="post" action="{{ route('products.update', $product->id) }}"
                            id="productForm" name="productForm" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="title">Titre</label>
                                    <input type="text" class="form-control" name="title" id="title"
                                        placeholder="Titre" value="{{ $product->title }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="slug">Slug</label>
                                    <input type="text" class="form-control" name="slug" id="slug"
                                        placeholder="Slug" value="{{ $product->slug }}" required readonly>
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" name="description" id="description" placeholder="Description">{{ $product->description }}</textarea>
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
                                @if (!@empty($product->image))
                                <div class="form-group">
                                    <img src="{{ asset('images/products/' . $product->image) }}" class="img-fluid" alt="image">
                                </div>
                            @else
                                <div class="form-group">
                                    Aucune image trouvée pour cette produits
                                </div>
                            @endif
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="price">Prix</label>
                                    <input type="number" step="0.01" class="form-control" name="price" id="price"
                                        placeholder="Prix" value="{{ $product->price }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="compare_price">Prix de comparaison</label>
                                    <input type="number" step="0.01" class="form-control" name="compare_price"
                                        id="compare_price" placeholder="Prix de comparaison"
                                        value="{{ $product->compare_price }}">
                                </div>
                                <div class="form-group">
                                    <label for="category_id">Catégories</label>
                                    <select class="form-select text-black" name="category_id" id="category_id">
                                        <option value="" class="text-black" selected disabled>Choisissez une
                                            catégories....</option>
                                        @if ($categories->isNotEmpty())
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}" class="text-black"
                                                    {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                                    {{ $category->name }}
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
                                                <option value="{{ $subCategory->id }}" class="text-black"
                                                    {{ $product->sub_category_id == $subCategory->id ? 'selected' : '' }}>
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
                                                <option value="{{ $brand->id }}" class="text-black"
                                                    {{ $product->brand_id == $brand->id ? 'selected' : '' }}>
                                                    {{ $brand->name }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="is_featured">En vedette</label>
                                    <select class="form-select text-black" name="is_featured" id="is_featured">
                                        <option value="Yes" class="text-black"
                                            {{ $product->is_featured == 'Yes' ? 'selected' : '' }}>Oui</option>
                                        <option value="No" class="text-black"
                                            {{ $product->is_featured == 'No' ? 'selected' : '' }}>Non</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="sku">SKU</label>
                                    <input type="text" class="form-control" name="sku" id="sku"
                                        placeholder="SKU" value="{{ $product->sku }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="barcode">Code-barres</label>
                                    <input type="text" class="form-control" name="barcode" id="barcode"
                                        placeholder="Code-barres" value="{{ $product->barcode }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="track_qty">Suivre la quantité</label>
                                    <select class="form-select text-black" name="track_qty" id="track_qty">
                                        <option value="Yes" class="text-black"
                                            {{ $product->track_qty == 'Yes' ? 'selected' : '' }}>Oui</option>
                                        <option value="No" class="text-black"
                                            {{ $product->track_qty == 'No' ? 'selected' : '' }}>Non</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="qty">Quantité</label>
                                    <input type="number" class="form-control" name="qty" id="qty"
                                        placeholder="Quantité" value="{{ $product->qty }}">
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-select text-black" name="status" id="status">
                                        <option value="1" class="text-black"
                                            {{ $product->status == 1 ? 'selected' : '' }}>Actif</option>
                                        <option value="0" class="text-black"
                                            {{ $product->status == 0 ? 'selected' : '' }}>Inactif</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="button-container d-flex align-items-center justify-content-between">
                                    <button type="submit" class="btn btn-primary"
                                        id="submitBtn"><span>Modifier</span></button>
                                    <button type="reset" class="btn btn-light"><span>Annuler</span></button>
                                </div>
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
