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
                        <form class="forms-sample" method="post" action="{{ route('categories.store') }}" id="categoryForm"
                            name="categoryForm" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Nom</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Nom">
                                <p></p>
                            </div>
                            <div class="form-group">
                                <label for="slug">Slug</label>
                                <input type="text" class="form-control" name="slug" id="slug"
                                    placeholder="Slug" required>
                                <p></p>
                            </div>
                            <div class="form-group">
                                <label>Choisir une image</label>
                                <input type="file" name="image" class="form-control">
                                {{-- <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled
                                        placeholder="Image">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary" type="button">Choisir</button>
                                    </span>
                                </div> --}}
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-select text-black" name="status" id="status">
                                    <option value="1" class="text-black">Actif</option>
                                    <option value="0" class="text-black">Inactif</option>
                                </select>
                                <p></p>
                            </div>
                            <div class="button-container d-flex align-items-center justify-content-between">
                                <button type="submit" class="btn btn-primary"><span>Ajouter</span></button>
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
        $(document).ready(function() {
            $('#categoryForm').submit(function(event) {
                event.preventDefault();
                var element = $(this);
                $("button[type=submit]").prop('disabled', true);
                $.ajax({
                    url: '{{ route('categories.store') }}',
                    type: "post",
                    data: element.serialize(),
                    dataType: 'json',
                    success: function(response) {
                        $("button[type=submit]").prop('disabled', false);
                        if (response.status) {
                            window.location.href = "{{ route('categories.index') }}";
                        } else {
                            var errors = response.errors;
                            handleFormErrors(errors);
                        }
                    },
                    error: function() {
                        console.log("Erreur, quelque chose s'est mal passé");
                    }
                });
            });

            $('#name').change(function() {
                var element = $(this);
                $("button[type=submit]").prop('disabled', true);
                $.ajax({
                    url: '{{ route('getslug') }}',
                    type: "get",
                    data: {
                        title: element.val()
                    },
                    dataType: 'json',
                    success: function(response) {
                        $("button[type=submit]").prop('disabled', false);
                        if (response.status) {
                            $('#slug').val(response.slug);
                        }
                    }
                });
            });

            function handleFormErrors(errors) {
                if (errors.name) {
                    $('#name').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors.name);
                } else {
                    $('#name').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');
                }

                if (errors.slug) {
                    $('#slug').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors.slug);
                } else {
                    $('#slug').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');
                }
            }

        });
    </script>
@endsection
