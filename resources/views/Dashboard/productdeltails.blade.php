@extends('layouts.base')

@section('content')


    <div class="container">
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        <div class="row mt-5">
            <div class="col">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li class="text-dark">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    Add New Product Details
                </button>

                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5 text-success" id="staticBackdropLabel">Add New Product</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>

                            </div>
                            <div class="modal-body">
                                <form action="{{ route('createproductdetails') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="col">
                                        <label for="name" class="form-label text-dark">Product Name</label>
                                        <select  class="form-select text-dark" aria-label="Default select example"
                                            name="product_id" required>
                                            <option selected>Open this select menu</option>
                                            @foreach ($products as $product)
                                                <option value="{{ $product->id }}">{{ $product->ProductName }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="row ">
                                        <div class="col">
                                            <label for="qty" class="form-label text-dark">Quantity</label>
                                            <input type="text" id="qty" required
                                                class="form-control @error('qty') is-invalid @enderror" name="qty">
                                        </div>
                                        <div class="col">
                                            <label for="description" class="form-label text-dark">Description</label>
                                            <input type="text" id="description" class="form-control" name="description" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col ">
                                            <label for="color" class="form-label text-dark">Color</label>
                                            <input type="text" id="color" class="form-control" name="color" required>
                                        </div>
                                        <div class="col ">
                                            <label for="price" class="form-label text-dark">Price</label>
                                            <input type="text" id="id" class="form-control" name="price" required>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <input type="file" class="form-control" name="image" id="image" />
                                    </div>
                                    <button type="submit" class="btn btn-info mt-3">save</button>
                                    <button type="button" class="btn btn-secondary mt-3"
                                        data-bs-dismiss="modal">cancel</button>
                                </form>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-8">
                <form action="" method="GET">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control me-3" placeholder="Search" name="search">
                        <button class="btn btn-primary" type="submit">Search</button>
                    </div>
                </form>
                <a href="{{ url('/dashboard/products') }}" class="btn btn-secondary" type="submit">Show All Products Details</a>
            </div>
        </div>
        <div class="row mt-5 text-dark">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered table-light">
                            <thead class="text-center">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Color</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <tr>
                                    @foreach ($productsdetails as $product)
                                <tr>
                                    <th scope="row" class="text-dark">{{ $product->id }}</th>
                                    <td class="text-dark">{{ $product->productName }}</td>
                                    <td class="text-dark">{{ $product->qty }}</td>
                                    <td class="text-dark">{{ $product->description }}</td>
                                    <td class="text-dark">{{ $product->color }}</td>
                                    <td class="text-dark">{{ $product->price }}</td>
                                    <td><a href="{{ route('delete_details', ['id' => $product->id]) }}"><i
                                                class="fa fa-trash text-danger"></i></a>
                                        {{-- <a id="edit" href="{{}}"><i class="fa fa-edit text-success"></i></a></td> --}}
                                        <a href="#" class="edit" data-bs-toggle="modal"
                                            data-bs-target="#editProductModal" data-id="{{ $product->id }}"
                                            data-name="{{ $product->productName }}"><i
                                                class="fa fa-edit text-success"></i></a>

                                        {{-- <td><a href="{{ route('del', ['id' => $product->id]) }}"><i
                                                class="fa fa-trash text-danger"></i></a>
                                        {{-- <a id="edit" href="{{}}"><i class="fa fa-edit text-success"></i></a></td> --}}
                                        {{-- <a href="#" class="edit" data-bs-toggle="modal"
                                            data-bs-target="#editProductModal" data-id="{{ $product->id }}"
                                            data-name="{{ $product->ProductName }}"><i
                                                class="fa fa-edit text-success"></i></a> --}}

                                </tr>
                                @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade text-dark" id="editProductModal" tabindex="-1"
                    aria-labelledby="editProductModalLabel" aria-hidden="true">
                    <div class="modal-dialog text-dark">
                        <div class="modal-content">
                            <div class="modal-header text-dark">
                                <h5 class="modal-title" id="editProductModalLabel">Edit Product</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-dark">
                                <form action="{{ route('edit') }}" method="GET">
                                    <input class="text-dark" type="hidden" id="productId" name="productId">
                                    <div class="mb-3">
                                        <label for="productName" class="form-label text-dark">Product Name</label>
                                        <input type="text" class="form-control" id="productName" name="productName">
                                    </div>
                                    <button type="submit" class="btn btn-primary" onclick="saveChanges()">Save
                                        changes</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const editButtons = document.querySelectorAll('.edit');

        editButtons.forEach(button => {
            button.addEventListener('click', function() {
                const productId = this.getAttribute('data-id');
                const productName = this.getAttribute('data-name');

                document.getElementById('productId').value = productId;
                document.getElementById('productName').value = productName;

            });
        });
    });
</script>
