@extends('admin.partials.main')

@section('container')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Products</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master Data</a></li>
                        <li class="breadcrumb-item active">Products</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div>
                <div class="card">
                    <div class="card-header border-0">
                        <div class="row g-4">
                            <div class="col-sm-auto">
                                <div>
                                    <a href="{{ route('comingSoon') }}" class="btn btn-success" id="addproduct-btn">
                                        <i class="ri-add-line align-bottom me-1"></i>
                                        Add Product
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-card gridjs-border-none">
                            <table id="product-table" class="gridjs-table">
                                <thead class="gridjs-thead">
                                    <tr class="gridjs-tr">
                                        <th class="gridjs-th text-muted">No</th>
                                        <th class="gridjs-th text-muted">Product Name</th>
                                        <th class="gridjs-th text-muted">Price</th>
                                        <th class="gridjs-th text-muted">Created at</th>
                                        <th class="gridjs-th text-muted">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="gridjs-tbody">
                                    @forelse ($products as $item)
                                        <tr class="gridjs-tr">
                                            <td class="gridjs-td">
                                                {{ $loop->iteration }}
                                            </td>
                                            <td class="gridjs-td">
                                                <span>
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-shrink-0 me-3">
                                                            <div class="avatar-sm bg-light rounded p-1">
                                                                <img src="" alt=""
                                                                    class="img-fluid d-block">
                                                            </div>
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <h5 class="fs-14 mb-1">
                                                                <a href="" class="text-dark">
                                                                    {{ $item->name }}
                                                                </a>
                                                            </h5>
                                                            <p class="text-muted mb-0">
                                                                Category :
                                                                <span class="fw-medium">{{ $item->category->name }}</span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </span>
                                            </td>
                                            <td class="gridjs-td">
                                                {{ $item->price }}
                                            </td>
                                            <td class="gridjs-td">
                                                {{ $item->created_at }}
                                            </td>
                                            <td class="gridjs-td">
                                                <span>
                                                    <div class="dropdown">
                                                        <button class="btn btn-soft-secondary btn-sm dropdown"
                                                            type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="ri-more-fill"></i>
                                                        </button>
                                                        <ul class="dropdown-menu dropdown-menu-end"
                                                            style="position: absolute; inset: 0px 0px auto auto; margin: 0px; transform: translate(-25px, 31px);"
                                                            data-popper-placement="bottom-end">
                                                            <li>
                                                                {{-- <a class="dropdown-item" href="{{ route('admin.product.show', $item->id) }}"> --}}
                                                                <a class="dropdown-item" href="{{ route('commingSoon') }}">
                                                                    <i class="ri-eye-fill align-bottom me-2 text-muted"></i>
                                                                    View
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item edit-list" data-edit-id="1"
                                                                    href="{{ route('commingSoon') }}">
                                                                    <i
                                                                        class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                                    Edit
                                                                </a>
                                                            </li>
                                                            <li class="dropdown-divider"></li>
                                                            <li>
                                                                <a class="dropdown-item remove-list"
                                                                    href="{{ route('commingSoon') }}" data-id="1"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#removeItemModal">
                                                                    <i
                                                                        class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                                                    Delete
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </span>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center py-3">No data available</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
