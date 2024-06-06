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
                <span class="text-uppercase fw-semibold">Modifier une catégorie</span>
                <a href="{{ route('categories.index') }}" class="btn btn-light"><span>Retour</span></a>
            </div>
            <div class="col-12 grid-margin stretch-card mt-3">
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample" method="post" action="{{ route('categories.update', $category->id) }}" id="categoryForm"
                            name="categoryForm" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="name">Nom</label>
                                <input type="text" value="{{ $category->name }}" class="form-control" name="name"
                                    id="name" placeholder="Nom" required>
                                <p></p>
                            </div>
                            <div class="form-group">
                                <label for="slug">Slug</label>
                                <input type="text" value="{{ $category->slug }}" class="form-control" name="slug"
                                    id="slug" placeholder="Slug" required readonly>
                                <p></p>
                            </div>
                            <div class="form-group">
                                <label>Choisir une image</label>
                                <input type="file" name="image" class="file-upload-default">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled
                                        placeholder="Insérer votre image...">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-success" type="button">Choisir</button>
                                    </span>
                                </div>
                            </div>
                            @if (!@empty($category->image))
                                <div class="form-group">
                                    <img src="{{ asset('images/categories/' . $category->image) }}" class="img-fluid" alt="image">
                                </div>
                            @else
                                <div class="form-group">
                                    Aucune image trouvée pour cette catégorie
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-select text-black" name="status" id="status">
                                    <option {{ $category->status == 1 ? 'selected' : '' }} value="1"
                                        class="text-black">Actif</option>
                                    <option {{ $category->status == 0 ? 'selected' : '' }} value="0"
                                        class="text-black">Inactif</option>
                                </select>
                                <p></p>
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
