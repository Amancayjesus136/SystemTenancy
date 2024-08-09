@extends('layouts.admin-sidebar')
@section('content')

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Inquilinos</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Inquilinos</a></li>
                                <li class="breadcrumb-item active">Modulos</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-xxl-12">
                <div class="card" id="contactList">
                    <div class="card-header">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <div class="search-box">
                                    <input type="text" class="form-control search" placeholder="Search for profiles...">
                                    <i class="ri-search-line search-icon"></i>
                                </div>
                            </div>
                            <div class="col-md-auto ms-auto">
                                <div class="flex-grow-1">
                                    <button class="btn btn-info add-btn" data-bs-toggle="modal" data-bs-target="#createProfiles"><i class="ri-add-fill me-1 align-bottom"></i> Agregar dominio</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div>
                            <div class="table-responsive table-card mb-3">
                                <table class="table align-middle table-nowrap mb-0" id="customerTable">
                                    <thead class="table-light">
                                        <tr>
                                            <th data-sort="Profiles" scope="col">Dominio</th>
                                            <th scope="col">Url</th>
                                            <th scope="col">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list form-check-all">
                                        @if($tenants->isEmpty())
                                            <tr>
                                                <td class="text-center" colspan="3">Inquilinos not registered</td>
                                            </tr>
                                        @else
                                            @foreach($tenants as $tenant)
                                            <tr>
                                                <td>{{ $tenant->id }}</td>
                                                <td>{{ $tenant->domains->first()->domain ?? '' }}</td>
                                                <td>
                                                    <div class="hstack gap-2">
                                                        <a href="#" class="btn btn-sm btn-soft-primary remove-list" data-bs-toggle="modal" data-bs-target="#editInquilino{{ $tenant->id }}"><i class="ri-edit-2-fill align-bottom"></i></a>
                                                        <form action="{{ route('tenants.destroy', $tenant) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que quieres eliminar este inquilino?');">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-soft-danger remove-list">
                                                                <i class="ri-delete-bin-fill align-bottom"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach

                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            </div>
        </div>
    </div>
</div>

<div class="modal fadeInLeft" id="createProfiles" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0">
            <div class="modal-header bg-soft-info p-3">
                <h5 class="modal-title" id="exampleModalLabel">Add Profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
            </div>
            <form action="{{ route('tenants.store') }}" method="post" class="tablelist-form needs-validation" autocomplete="off" novalidate>
                @csrf
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-lg-12">
                            <label for="role" class="form-label">Dominio</label>
                            <input type="text" id="role" name="id" class="form-control" placeholder="Enter Domain" required />
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            <div class="invalid-feedback text-end">
                                The Domain is necessary
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="hstack gap-2 justify-content-end">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success" id="add-btn">Add Contact</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@foreach ($tenants as $tenant)
    <div class="modal fadeInLeft" id="editInquilino{{ $tenant->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content border-0">
                <div class="modal-header bg-soft-info p-3">
                    <h5 class="modal-title" id="exampleModalLabel">Actualizar inquilino</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                </div>
                <form action="{{ route('tenants.update', $tenant) }}" method="post" class="tablelist-form needs-validation" autocomplete="off" novalidate>
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-lg-12">
                                <label for="role" class="form-label">Dominio</label>
                                <input type="text" id="role" name="id" class="form-control" value="{{ old('id', $tenant->id) }}" placeholder="Enter Roles" required />
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback text-end">
                                    The role is necessary
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="hstack gap-2 justify-content-end">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success" id="add-btn">Add Contact</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach

@endsection
