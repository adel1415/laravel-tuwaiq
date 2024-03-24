@extends('layouts.base')

@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    Add New Product
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
                                <form action="" method="POST">
                                    @csrf
                                    <input type="text" class="form-control" name="ProductName">
                                    <button type="submit" class="btn btn-info mt-3">save</button>
                                    <button type="button" class="btn btn-secondary mt-3" data-bs-dismiss="modal">cancel</button>
                                </form>
                                
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection