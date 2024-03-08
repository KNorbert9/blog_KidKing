@extends('backend.layout.app')
@section('style')
<link href="{{ asset('admin/assets/tagsinput/bootstrap-tagsinput.css') }}" rel="stylesheet">
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
                                <label class="form-label">Title</label>
                                <input type="text" class="form-control" name="title" required>
                            </div>
                            <div class="col-12">
                                <label for="inputPassword4" class="form-label">Category</label>
                                <select name="categorie_id" class="form-control" id="" required>
                                    <option value="">Select Category</option>
                                    @foreach ($categorie as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="inputPassword4" class="form-label">Image</label>
                                <input type="file" class="form-control" name="image">
                            </div>
                            <div class="col-12">
                                <label for="inputPassword4" class="form-label">Description</label>
                                <textarea class="form-control tinymce-editor" name="description"></textarea>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Tags</label>
                                <input type="text" class="form-control" name="tags" id="tags">
                            </div>
                            <div class="col-12">
                                <label for="inputPassword4" class="form-label">Publish</label>
                                <select name="is_publish" class="form-control">
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
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
    <script src="{{ asset('admin/assets/tagsinput/bootstrap-tagsinput.js') }}"></script>
    <script type="text/javascript">
        $("#tags").tagsinput();
    </script>
@endsection
