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
                <span class="text-uppercase fw-semibold">Créer une catégorie</span>
                <a href="#" class="btn btn-light"><span>Retour</span></a>
            </div>
            <div class="col-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample material-form" action="{{ route('categories.store') }}" method="POST"  id="categoryForm" name="categoryForm">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="name" id="name" required="required" />
                                <label for="input" class="control-label text-primary focus">Nom</label><i
                                    class="bar"></i>
                            </div>
                            <div class="form-group">
                                <input type="text" name="slug" id="slug" required="required" />
                                <label for="input" class="control-label text-primary focus">Slug</label><i
                                    class="bar"></i>
                            </div>
                            <div class="form-group">
                                <select name="status" id="status" class="py-1" required="required">
                                    <option value="1">Actif</option>
                                    <option value="0">Inactif</option>
                                </select>
                                <label class="control-label text-primary" for="select">Status</label>
                            </div>

                            <div class="button-container d-flex align-items-center justify-content-between">
                                <button type="submit" class="btn btn-primary"><span>Créer</span></button>
                                <a href="#" class="btn btn-light"><span>Annuler</span></a>
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
        $('#categoryForm').submit(function(event) {
            event.preventDefault();
            var element = $(this);
            $.ajax({
                url: '{{ route('categories.store') }}',
                type: "POST",
                data: element.serializeArray(),
                dataType: 'json',
                success: function(response) {

                    if (response['status'] == true) {
                        $('#name').removeClass('is-invalid');.siblings('p').removeClass(
                                'invalid-feedback')
                            .html('');
                        $('#slug').removeClass('is-invalid');.siblings('p').removeClass(
                                'invalid-feedback')
                            .html('');
                    } else {

                        var errors = response.['errors'];
                        if (errors['name']) {
                            $('#name').addClass('is-invalid');.siblings('p').addClass(
                                    'invalid-feedback')
                                .html(errors['name']);
                        } else {
                            $('#name').removeClass('is-invalid');.siblings('p').removeClass(
                                    'invalid-feedback')
                                .html('');
                        }

                        if (errors['slug']) {
                            $('#slug').addClass('is-invalid');.siblings('p').addClass(
                                    'invalid-feedback')
                                .html(errors['name']);
                        } else {
                            $('#slug').removeClass('is-invalid');.siblings('p').removeClass(
                                    'invalid-feedback')
                                .html('');
                        }
                    },
                    error: function(jqXHR, exception) {
                        console.log("Erreur quelque chose s'est mal passée");
                    }
                }

            })
        });
    </script>
@endsection
