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
            <div class="d-flex justify-content-between align-items-center card-title mb-3">
                <span class="text-uppercase fw-semibold">Listes des catégories</span>
                <a href="{{ route('categories.create') }}" class="btn btn-primary"><span>Ajouter</span></a>
            </div>

            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive text-center" style="width: 100%; height: 60vh;">
                            <table class="table table-hover">
                                <thead class="text-uppercase font-bold sticky-top">
                                    <tr>
                                        <th>N°</th>
                                        <th>Nom</th>
                                        <th>Slug</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($categories->isNotEmpty())
                                        @foreach ($categories as $category)
                                            <tr>
                                                <td>{{ $category->id }}</td>
                                                <td>{{ $category->name }}</td>
                                                <td class="text-decoration-underline fw-medium text-primary"> {{ $category->slug }}</i>
                                                </td>
                                                <td title="Status">
                                                    @if ($category->status == 1)
                                                        <label title="Actif" class="text-success"><i
                                                                class="fa  fa-check-circle fa-2x"></i></label>
                                                    @else
                                                        <label title="Inactif" class="text-danger"><i
                                                                class="fa fa-times-circle-o fa-2x"></i></label>
                                                    @endif
                                                </td>
                                                <td class="d-flex align-items-center justify-content-around">
                                                    <a href="#" class="text-primary" title="Modifier"><i
                                                            class="fa  fa-pencil fa-2x"></i></a>
                                                    <a href="#" class="text-danger" title="Supprimer"><i
                                                            class="fa fa-trash-o fa-2x"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="5">Aucune catégories pour le moment...</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <div class="text-primary">
                            <p class="mt-3 text-primary">{{ $categories ->links()}}</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
@endsection
