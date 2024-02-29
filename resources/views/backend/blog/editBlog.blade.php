@extends('backend.layout.app')
@section('style')
@endsection

@section('content')
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-6 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Modifier un blog</h5>

                        @include('frontend.layout.message')
                        <!-- Vertical Form -->
                        <form class="row g-3" action="" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="col-12">
                                <label for="inputNanme4" class="form-label"> Title</label>
                                <input type="text" value="{{ $Blog->title }}" class="form-control" id="inputNanme4"
                                    name="title">
                                <div style="color:red">{{ $errors->first('title') }}</div>
                            </div>

                            <div class="col-12">
                                <label for="inputEmail4" class="form-label">Categorie</label>
                                <select name="categorie_id" class="form-control" id="" required>
                                    <option value="">Select Category</option>
                                    @foreach ($categorie as $category)
                                        <option {{ $Blog->categorie_id == $category->id ? 'selected' : '' }} value="{{ $category->id }}">
                                            {{ $category->name }}</option>
                                    @endforeach
                                </select>
                                <div>{{ $errors->first('slug') }}</div>
                            </div>

                            <div class="col-12">
                                <label for="inputEmail4" class="form-label">Current Image</label>
                                <img src="{{ $Blog->getImage() }}" width="100px" alt="">
                            </div>
                            <div class="col-12">
                                <label for="inputPassword4" class="form-label">Image</label>
                                <input type="file" class="form-control" name="image">
                            </div>
                            <div class="col-12">
                                <label for="inputEmail4" class="form-label">Description</label>
                                <textarea class="form-control tinymce-editor" id="inputEmail4" name="description">{{ $Blog->description }}</textarea>
                                <div>{{ $errors->first('description') }}</div>
                            </div>

                            <div class="col-12">
                                <label for="inputPassword4" class="form-label">Published</label>
                                <select name="is_publish" class="form-control">
                                    <option {{ $Blog->is_publish == 1 ? 'selected' : '' }} value="1">Yes</option>
                                    <option {{ $Blog->is_publish == 0 ? 'selected' : '' }} value="0">No</option>
                                </select>
                            </div>

                            <div class="col-12">
                                <label for="inputPassword4" class="form-label">Status</label>
                                <select name="status" class="form-control">
                                    <option {{ $Blog->status == 1 ? 'selected' : '' }} value="1">Active</option>
                                    <option {{ $Blog->status == 0 ? 'selected' : '' }} value="0">Inactive</option>
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
