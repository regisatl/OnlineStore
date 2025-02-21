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
                <span class="text-uppercase fw-semibold">Ajouter une catégorie</span>
                <a href="{{ route('categories.index') }}" class="btn btn-light"><span>Retour</span></a>
            </div>
            <div class="col-12 grid-margin stretch-card mt-3">
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample row" method="post" action="{{ route('categories.store') }}"
                            id="categoryForm" name="categoryForm" enctype="multipart/form-data">
                            @csrf
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="name">Nom</label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        placeholder="Nom" required>
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-select text-black" name="status" id="status">
                                        <option value="1" class="text-black">Actif</option>
                                        <option value="0" class="text-black">Inactif</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="slug">Slug</label>
                                    <input type="text" class="form-control" name="slug" id="slug"
                                        placeholder="Slug" required readonly>
                                </div>
                                <div class="form-group">
                                    <label for="show_home">Afficher sur l'accueil</label>
                                    <select class="form-select text-black" name="show_home" id="show_home">
                                        <option value="Yes" class="text-black">Oui</option>
                                        <option value="No" class="text-black">Non</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
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
                            <div class="button-container d-flex align-items-center justify-content-between">
                                <button type="submit" class="btn btn-primary" id="submitBtn"><span>Ajouter</span></button>
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
