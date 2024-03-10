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
                        <h5 class="card-title">Modifier une Page</h5>

                        @include('frontend.layout.message')
                        <!-- Vertical Form -->
                        <form class="row g-3" action="" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="col-12">
                                <label for="inputNanme4" class="form-label"> Title</label>
                                <input type="text" value="{{ $Page->title }}" class="form-control" id="inputNanme4"
                                    name="title">
                                <div style="color:red">{{ $errors->first('title') }}</div>
                            </div>

                            <div class="col-12">
                                <label for="inputNanme4" class="form-label"> Meta Title</label>
                                <input type="text" value="{{ $Page->meta_title }}" class="form-control" id="inputNanme4"
                                    name="meta_title">
                                <div style="color:red">{{ $errors->first('meta_title') }}</div>
                            </div>

                            <div class="col-12">
                                <label for="inputNanme4" class="form-label"> Meta Description</label>
                                <input type="text" value="{{ $Page->meta_description }}" class="form-control" id="inputNanme4"
                                    name="meta_description">
                                <div style="color:red">{{ $errors->first('meta_description') }}</div>
                            </div>

                            <div class="col-12">
                                <label for="inputNanme4" class="form-label"> Meta Keywords</label>
                                <input type="text" value="{{ $Page->meta_keywords }}" class="form-control" id="inputNanme4"
                                    name="meta_keywords">
                                <div style="color:red">{{ $errors->first('meta_keywords') }}</div>
                            </div>

                            <div class="col-12">
                                <label for="inputEmail4" class="form-label">Slug</label>
                                <input type="text" value="{{ $Page->slug }}" class="form-control" id="inputEmail4"
                                    name="slug">
                                <div>{{ $errors->first('slug') }}</div>
                            </div>

                            <div class="col-12">
                                <label for="inputEmail4" class="form-label">Description</label>
                                <textarea class="form-control tinymce-editor" id="inputEmail4" name="description">{{ $Page->description }}</textarea>
                                <div>{{ $errors->first('description') }}</div>
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
