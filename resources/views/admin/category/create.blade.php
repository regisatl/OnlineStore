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
                <a href="{{ route('categories.index') }}" class="btn btn-light"><span>Retour</span></a>
            </div>
            <div class="col-12 grid-margin stretch-card mt-3">
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample" method="post" action="{{ route('categories.store') }}" id="categoryForm"
                            name="categoryForm">
                            @csrf
                            <div class="form-group">
                                <label for="name">Nom</label>
                                <input type="text" class="form-control" name="name" id="name"
                                    placeholder="nom">
                                    <p></p>
                            </div>
                            <div class="form-group">
                                <label for="slug">Slug</label>
                                <input type="text" readonly class="form-control" name="slug" id="slug" placeholder="slug" >
                                <p></p>
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
        $('#categoryForm').submit(function(event) {
            event.preventDefault();
            var element = $(this);
            $.ajax({
                url: '{{ route('categories.store') }}',
                type: "post",
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
                }
                error: function(jqXHR, exception) {
                    console.log("Erreur quelque chose s'est mal passée");
                }
            })
        });

        $('#name').change(function() {
            element = $(this);
            $.ajax({
                url: '{{ route('getslug') }}',
                type: "get",
                data: {
                    title: element.val()
                },
                dataType: 'json',
                success: function(response) {
                    if (response['status'] == true) {
                        $('#slug').val(response['slug']);
                    }
                }
            });
        })
    </script>
@endsection
