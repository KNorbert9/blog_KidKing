@extends('backend.layout.app')
@section('style')
@endsection

@section('content')
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-6 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Modifier categorie</h5>

                        @include('frontend.layout.message')
                        <!-- Vertical Form -->
                        <form class="row g-3" action="" method="POST">
                            {{ csrf_field() }}

                            <div class="col-12">
                                <label for="inputNanme4" class="form-label"> Name</label>
                                <input type="text" value="{{ $categorie->name }}" class="form-control" id="inputNanme4"
                                    name="name">
                                <div style="color:red">{{ $errors->first('name') }}</div>
                            </div>
                            <div class="col-12">
                                <label for="inputEmail4" class="form-label">Slug</label>
                                <input type="text" value="{{ $categorie->slug }}" class="form-control" id="inputEmail4"
                                    name="slug">
                                <div>{{ $errors->first('slug') }}</div>
                            </div>
                            <div class="col-12">
                                <label for="inputEmail4" class="form-label">Title</label>
                                <input type="text" value="{{ $categorie->title }}" class="form-control" id="inputEmail4"
                                    name="title">
                                <div>{{ $errors->first('title') }}</div>
                            </div>
                            <div class="col-12">
                                <label for="inputEmail4" class="form-label">Meta Title</label>
                                <input type="text" value="{{ $categorie->meta_title }}" class="form-control" id="inputEmail4"
                                    name="meta_title">
                                <div>{{ $errors->first('meta_title') }}</div>
                            </div>
                            <div class="col-12">
                                <label for="inputEmail4" class="form-label">Meta Description</label>
                                <input type="text" value="{{ $categorie->meta_description }}" class="form-control"
                                    id="inputEmail4" name="meta_description">
                                <div>{{ $errors->first('meta_description') }}</div>
                            </div>
                            <div class="col-12">
                                <label for="inputEmail4" class="form-label">Meta Keyword</label>
                                <input type="text" value="{{ $categorie->meta_keywords }}" class="form-control"
                                    id="inputEmail4" name="meta_keywords">
                                <div>{{ $errors->first('meta_keywords') }}</div>
                            </div>

                            <div class="col-12">
                                <label for="inputPassword4" class="form-label">Status</label>
                                <select name="status" class="form-control">
                                    <option {{ $categorie->status == 1 ? 'selected' : '' }}value="1">Active</option>
                                    <option {{ $categorie->status == 0 ? 'selected' : '' }}value="0">Inactive</option>
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
