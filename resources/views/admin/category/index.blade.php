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
                    <div class="table-responsive text-center">
                      <table class="table table-hover">
                        <thead class="text-uppercase font-bold">
                          <tr>
                            <th>N°</th>
                            <th>Nom</th>
                            <th>Slug</th>
                            <th>Status</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>Jacob</td>
                            <td>Photoshop</td>
                            <td class="text-danger"> 28.76% <i class="ti-arrow-down"></i></td>
                            <td title="Status"><label class="text-danger"><i class="fa fa-times-circle-o fa-2x"></i></label></td>
                            <td class="d-flex align-items-center justify-content-around">
                                <a href="#" class="text-primary" title="Modifier"><i class="fa  fa-pencil fa-2x"></i></a>
                                <a href="#" class="text-danger" title="Supprimer"><i class="fa fa-trash-o fa-2x"></i></a>
                            </td>
                          </tr>
                          <tr>
                            <td>Messsy</td>
                            <td>Flash</td>
                            <td class="text-danger"> 21.06% <i class="ti-arrow-down"></i></td>
                            <td title="Status"><label class="badge badge-warning">In progress</label></td>
                            <td class="d-flex align-items-center justify-content-around">
                                <a href="#" class="text-primary" title="Modifier"><i class="fa  fa-pencil fa-2x"></i></a>
                                <a href="#" class="text-danger" title="Supprimer"><i class="fa fa-trash-o fa-2x"></i></a>
                            </td>
                          </tr>
                          <tr>
                            <td>John</td>
                            <td>Premier</td>
                            <td class="text-danger"> 35.00% <i class="ti-arrow-down"></i></td>
                            <td title="Status"><label class="badge badge-info">Fixed</label></td>
                            <td class="d-flex align-items-center justify-content-around">
                                <a href="#" class="text-primary" title="Modifier"><i class="fa  fa-pencil fa-2x"></i></a>
                                <a href="#" class="text-danger" title="Supprimer"><i class="fa fa-trash-o fa-2x"></i></a>
                            </td>
                          </tr>
                          <tr>
                            <td>Peter</td>
                            <td>After effects</td>
                            <td class="text-success"> 82.00% <i class="ti-arrow-up"></i></td>
                            <td title="Status"><label class="text-success"><i class="fa  fa-check-circle fa-2x"></i></label></td>
                            <td class="d-flex align-items-center justify-content-around">
                                <a href="#" class="text-primary" title="Modifier"><i class="fa  fa-pencil fa-2x"></i></a>
                                <a href="#" class="text-danger" title="Supprimer"><i class="fa fa-trash-o fa-2x"></i></a>
                            </td>
                          </tr>
                          <tr>
                            <td>Dave</td>
                            <td>53275535</td>
                            <td class="text-success"> 98.05% <i class="ti-arrow-up"></i></td>
                            <td title="Status"><label class="badge badge-warning">In progress</label></td>
                            <td class="d-flex align-items-center justify-content-around">
                                <a href="#" class="text-primary" title="Modifier"><i class="fa  fa-pencil fa-2x"></i></a>
                                <a href="#" class="text-danger" title="Supprimer"><i class="fa fa-trash-o fa-2x"></i></a>
                            </td>
                          </tr>
                        </tbody>
                      </table>
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

