@extends('backend.layout.app')
@section('style')
@endsection

@section('content')
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-6 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Ajouter une Catégorie</h5>

                        @include('frontend.layout.message')
                        <!-- Vertical Form -->
                        <form class="row g-3" method="POST" action="">
                            {{ csrf_field() }}
                            <div class="col-12">
                                <label for="inputNanme4" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" required id="inputNanme4">
                            </div>
                            <div class="col-12">
                                <label for="inputEmail4" class="form-label">Slug</label>
                                <input type="text" class="form-control" name="slug" required id="inputEmail4">
                            </div>
                            <div class="col-12">
                                <label for="inputPassword4" class="form-label">Title</label>
                                <input type="text" class="form-control" name="title" required id="inputPassword4">
                            </div>
                            <div class="col-12">
                                <label for="inputPassword4" class="form-label">Meta-Title</label>
                                <input type="text" class="form-control" name="meta_title" required id="inputPassword4">
                            </div>
                            <div class="col-12">
                                <label for="inputPassword4" class="form-label">Meta-Description</label>
                                <input type="text" class="form-control" name="meta_description" required id="inputPassword4">
                            </div>
                            <div class="col-12">
                                <label for="inputPassword4" class="form-label">Meta-KeyWord</label>
                                <input type="text" class="form-control" name="meta_keywords" required id="inputPassword4">
                            </div>
                            <div class="col-12">
                                <label for="inputPassword4" class="form-label">Status</label>
                                <select name="status" class="form-control">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form><!-- Vertical Form -->

                    </div>
                </div>
            </div>
        </div>


    </section>
@endsection

@section('script')
@endsection
