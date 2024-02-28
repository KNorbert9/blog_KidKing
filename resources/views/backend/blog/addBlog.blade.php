@extends('backend.layout.app')
@section('style')
@endsection

@section('content')
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-6 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Ajouter un blog</h5>

                        @include('frontend.layout.message')
                        <!-- Vertical Form -->
                        <form class="row g-3" method="POST" action="" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="col-12">
                                <label for="inputNanme4" class="form-label">User Name</label>
                                <input type="text" class="form-control" name="username" required id="inputNanme4">
                            </div>
                            <div class="col-12">
                                <label for="inputEmail4" class="form-label">Title</label>
                                <input type="text" class="form-control" name="title" required id="inputEmail4">
                            </div>
                            <div class="col-12">
                                <label for="inputPassword4" class="form-label">Category</label>
                                <select name="" class="form-control" id="" required>
                                    <option value="">Select Category</option>
                                    @foreach ($categorie as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="inputPassword4" class="form-label">Image</label>
                                <input type="file" class="form-control" name="image" required id="inputPassword4">
                            </div>
                            <div class="col-12">
                                <label for="inputPassword4" class="form-label">Description</label>
                                <textarea type="text" class="form-control tinymce-editor" name="description" required id="inputPassword4"></textarea>
                            </div>
                            <div class="col-12">
                                <label for="inputPassword4" class="form-label">Tags</label>
                                <input type="text" class="form-control" name="tags" required id="inputPassword4">
                            </div>
                            <div class="col-12">
                                <label for="inputPassword4" class="form-label">Publish</label>
                                <input type="text" class="form-control" name="publish" required id="inputPassword4">
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
