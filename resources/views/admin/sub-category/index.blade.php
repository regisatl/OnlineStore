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
            @include('admin.message')
            <div class="d-flex justify-content-between align-items-center card-title mb-3">
                <span class="text-uppercase fw-semibold">Listes des sous catégories</span>
                <a href="{{ route('subcategories.create') }}" class="btn btn-primary"><span>Ajouter</span></a>
            </div>
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-header px-0">
                        <form method="get" class="d-flex align-items-center justify-content-between">
                            <div class="me-5">
                                <button type="button" class="btn btn-light"
                                    onclick="window.location.href='{{ route('subcategories.index') }}'">Réintialiser</button>
                            </div>
                            <div class="input-group rounded">
                                <input type="text" value="{{ Request::get('keyword') }}" name="keyword"
                                    class="form-control rounded" placeholder="Rechercher...." aria-label="Rechercher"
                                    aria-describedby="search-addon" />
                                <button type="submit" class="input-group-text border-0 btn btn-primary" id="search-addon">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive text-center" style="width: 100%; height: 55vh;">
                            <table class="table table-hover">
                                <thead class="text-uppercase font-bold sticky-top">
                                    <tr>
                                        <th>N°</th>
                                        <th>Nom</th>
                                        <th>Slug</th>
                                        <th>Catégories</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($subCategories->isNotEmpty())
                                        @foreach ($subCategories as $index => $subCategory)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $subCategory->name }}</td>
                                                <td class="text-decoration-underline fw-medium text-primary">
                                                    {{ $subCategory->slug }}</i>
                                                </td>
                                                <td>{{ $subCategory->category->name }}</td>
                                                <td title="Status">
                                                    @if ($subCategory->status == 1)
                                                        <label title="Actif" class="text-success"><i
                                                                class="fa  fa-check-circle fa-2x"></i></label>
                                                    @else
                                                        <label title="Inactif" class="text-danger"><i
                                                                class="fa fa-times-circle-o fa-2x"></i></label>
                                                    @endif
                                                </td>
                                                <td class="d-flex align-items-center justify-content-around">
                                                    <a href= "{{ route('subcategories.edit', $subCategory->id) }}"
                                                        class="btn btn-primary btn-icon btn-sm btn-rounded"
                                                        title="Modifier"><i class="fa  fa-pencil"></i></a>
                                                    <form method="POST"
                                                        action="{{ route('subcategories.destroy', $subCategory->id) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="btn btn-danger btn-icon btn-sm btn-rounded"
                                                            title="Supprimer">
                                                            <i class="fa fa-trash-o"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="6">Aucune sous catégorie trouvée pour le moment...</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <div class="text-primary">
                            <p class="mt-3 text-primary">{{ $subCategories->links() }}</p>
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
