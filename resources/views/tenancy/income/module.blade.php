@extends('layoutsTenant.admin-sidebar')
@section('content')

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Orders</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Crypto</a></li>
                                <li class="breadcrumb-item active">Orders</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>

            <div class="chat-wrapper d-lg-flex gap-1 mx-n4 mt-n4 p-1">
                <div class="file-manager-sidebar">
                    <div class="p-4 d-flex flex-column h-100">
                        <div class="mb-3">
                            <div class="nav nav-pills flex-column nav-pills-tab custom-verti-nav-pills text-center" role="tablist" aria-orientation="vertical">
                                <a class="nav-link active" id="custom-v-pills-home-tab" data-bs-toggle="pill" href="#custom-v-pills-home" role="tab" aria-controls="custom-v-pills-home" aria-selected="true">
                                    <i class="ri-home-4-line d-block fs-20 mb-1"></i> Home
                                </a>
                                <a class="nav-link" id="custom-v-pills-profile-tab" data-bs-toggle="pill" href="#custom-v-pills-profile" role="tab" aria-controls="custom-v-pills-profile" aria-selected="false">
                                    <i class="ri-user-2-line d-block fs-20 mb-1"></i> Profile
                                </a>
                                <a class="nav-link" id="custom-v-pills-messages-tab" data-bs-toggle="pill" href="#custom-v-pills-messages" role="tab" aria-controls="custom-v-pills-messages" aria-selected="false">
                                    <i class="ri-mail-line d-block fs-20 mb-1"></i> Messages
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="file-manager-content w-100 p-4 pb-0">

                    <div class="p-3 bg-light rounded mb-4">
                        <div class="row g-2">
                            <div class="col-lg-auto">
                                <select class="form-control" data-choices data-choices-search-false name="choices-select-sortlist" id="choices-select-sortlist">
                                    <option value="">Sort</option>
                                    <option value="By ID">By ID</option>
                                    <option value="By Name">By Name</option>
                                </select>
                            </div>
                            <div class="col-lg-auto">
                                <select class="form-control" data-choices data-choices-search-false name="choices-select-status" id="choices-select-status">
                                    <option value="">All Tasks</option>
                                    <option value="Completed">Completed</option>
                                    <option value="Inprogress">Inprogress</option>
                                    <option value="Pending">Pending</option>
                                    <option value="New">New</option>
                                </select>
                            </div>
                            <div class="col-lg">
                                <div class="search-box">
                                    <input type="text" id="searchTaskList" class="form-control search" placeholder="Search task name">
                                    <i class="ri-search-line search-icon"></i>
                                </div>
                            </div>
                            <div class="col-lg-auto">
                                <button class="btn btn-primary createTask" type="button" data-bs-toggle="modal" data-bs-target="#createTask">
                                    <i class="ri-add-fill align-bottom"></i> Buscar
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="todo-content position-relative px-4 mx-n4" id="todo-content">
                        <div class="todo-task" id="todo-task">
                            <div class="table-responsive">
                                <table class="table align-middle position-relative table-nowrap">
                                    <thead class="table-active">
                                        <tr>
                                            <th scope="col">Nombre del producto</th>
                                            <th scope="col">Imagen</th>
                                            <th scope="col">Fecha creado</th>
                                            <th scope="col">Precio</th>
                                            <th scope="col">Descuentos</th>
                                            <th scope="col">Acciones</th>
                                        </tr>
                                    </thead>

                                    <tbody id="task-list">

                                        @if ($ingresos->isEmpty())
                                            <tr>
                                                <td colspan="12" class="text-center">No hay ingresos registrados</td>
                                            </tr>
                                        @else
                                            @foreach ($ingresos as $ingreso)
                                                <tr>
                                                    <td>{{ \Carbon\Carbon::parse($ingreso->fecha_ingreso)->format('d M, Y') }}</td>
                                                    <td>{{ $ingreso->monto_ingreso }}</td>
                                                    <td>{{ $ingreso->tipo_ingreso }}</td>
                                                    <td>{{ $ingreso->metodo_ingreso }}</td>

                                                    <td>
                                                        @if($ingreso->estado_ingreso == '1')
                                                            <span class="badge bg-success">Activo</span>
                                                        @else
                                                            <span class="badge bg-danger">Desactivado</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="hstack gap-3 fs-15">
                                                            <a href="#" class="link-primary"><i class="ri-edit-2-fill"></i></a>
                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#deleteProduct" class="link-danger"><i class="ri-delete-bin-5-line"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            <section class="mt-2 container">
                                {{ $ingresos->onEachSide(1)->links() }}
                            </section>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade zoomIn" id="modalRegistrar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered   ">
                  <div class="modal-content">
                    <div class="modal-header p-3 bg-soft-primary">
                      <h5 class="modal-title" id="exampleModalLabel">Registrar categorias</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form action="#" method="POST" class="tablelist-form needs-validation" alt="user-profile-image" enctype="multipart/form-data" autocomplete="off" novalidate>
                            @csrf
                            <div class="row g-3 mb-3">
                                <div class="col-lg-12">
                                    <div class="text-center">
                                        <div class="profile-user position-relative d-inline-block mx-auto  mb-4">
                                            <img id="user-profile-image" src="{{ asset('assets/images/sin-foto.png') }}" class="rounded-circle avatar-xl img-thumbnail user-profile-image" alt="user-profile-image">
                                            <input id="profile-img-file-input" name="photo_product" type="file" accept="image/*" class="profile-img-file-input">
                                            <label for="profile-img-file-input" class="profile-photo-edit avatar-xs">
                                                <span class="avatar-title rounded-circle bg-light text-body">
                                                    <i class="ri-camera-fill"></i>
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 mb-4">
                                    <label for="name_product" class="form-label">Nombre del producto<span class="text-danger">*</span></label>
                                    <input type="text" name="name_product" class="form-control" placeholder="Ingresar nombre del producto" required />
                                </div>

                                <div class="col-lg-4 mb-4">
                                    <label for="category_product" class="form-label">Tipo<span class="text-danger">*</span></label>
                                    <select name="filtro_product" class="form-control" required>
                                        <option value="" disabled selected>Selecciona ...</option>
                                            <option value="Clasicas">Clasicas</option>
                                            <option value="Especiales">Especiales</option>
                                            <option value="Bebidas">Bebidas</option>
                                            <option value="Cocteles">Cocteles</option>
                                            <option value="Entradas">Entradas</option>
                                            <option value="Promociones">Promociones</option>
                                    </select>
                                </div>

                                <div class="col-lg-4 mb-4">
                                    <label for="category_product" class="form-label">Categoría<span class="text-danger">*</span></label>
                                    <select name="category_product" class="form-control" required>
                                        <option value="" disabled selected>Selecciona categoría...</option>
                                        {{-- @foreach ($categories as $category)
                                            <option value="{{ $category->id_category }}">{{ $category->name_category }}</option>
                                        @endforeach --}}
                                    </select>
                                </div>

                                <div id="input-container" class="row">
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <label for="size_product_multiple" class="form-label">Tamaño<span class="text-danger">*</span></label>
                                                <select name="size_product_multiple[]" class="form-control" required>
                                                    <option value="" disabled selected>Seleccionar tamaño...</option>
                                                    <option value="Mediana">Mediana</option>
                                                    <option value="Familiar">Familiar</option>
                                                    <option value="Personal">Personal</option>
                                                    <option value="1L">1L</option>
                                                    <option value="600 ml">600 ml</option>
                                                    <option value="Chicha 500 ml">Chicha 500 ml</option>
                                                    <option value="Chicha 1L">Chicha 1L</option>
                                                </select>
                                            </div>

                                            <div class="col-lg-3">
                                                <label for="price_product_multiple" class="form-label">Precio<span class="text-danger">*</span></label>
                                                <input type="text" name="price_product_multiple[]" class="form-control" placeholder="Ingresar el precio" required />
                                            </div>

                                            <div class="col-lg-3">
                                                <label for="discount_product_multiple" class="form-label">Descuentos<span class="text-danger">*</span></label>
                                                <input type="text" name="discount_product_multiple[]" class="form-control" placeholder="Ingresar el descuento" required />
                                            </div>

                                            <div class="col-lg-2" style="margin-top: 30px">
                                                <a href="#" id="add-button" class="btn btn-primary">Agregar</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="additional-inputs" class="row"></div>

                                <div class="col-lg-12">
                                    <label for="description_product" class="form-label">Descripción<span class="text-danger">*</span></label>
                                    <input type="text" name="description_product" class="form-control" placeholder="Ingresar la descripción" required />
                                </div>
                            </div>

                            <div class="hstack gap-2 justify-content-end">
                                <button type="button" class="btn btn-ghost-primary" data-bs-dismiss="modal"><i class="ri-close-line align-bottom"></i>Cerrar</button>
                                <button type="submit" class="btn btn-primary" id="addNewProject">Guardar</button>
                            </div>
                        </form>

                    </div>
                  </div>
                </div>
              </div>

              <script>
                (function () {
                    'use strict';

                    var forms = document.querySelectorAll('.tablelist-form');

                    Array.prototype.slice.call(forms)
                        .forEach(function (form) {
                            form.addEventListener('submit', function (event) {
                                if (!form.checkValidity()) {
                                    event.preventDefault();
                                    event.stopPropagation();
                                }

                                form.classList.add('was-validated');
                            }, false);
                        });
                })();
            </script>

            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    document.getElementById('profile-img-file-input').addEventListener('change', function (e) {
                        var selectedImage = e.target.files[0];

                        if (selectedImage) {
                            var imageUrl = URL.createObjectURL(selectedImage);

                            document.getElementById('user-profile-image').src = imageUrl;
                        }
                    });
                });
            </script>

        </div>
    </div>

</div>

@endsection
