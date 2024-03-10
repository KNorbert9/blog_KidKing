@extends('backend.layout.app')
@section('style')
@endsection

@section('content')
    <section class="section dashboard">
        <div class="card">


            <div class="card-body">
                <h5 class="card-title">Liste des Blogs (Total : {{ $blogs->total() }})
                    <a href="{{ url('dashboard/blogs/add') }}" class="btn btn-primary float-end">Add new
                        Blog</a>
                </h5>

                <form class="row g-3" accept="get">
                    <div class="col-md-1" style="margin-bottom: 5px">
                        <label class="form-label">ID</label>
                        <input type="text" name="id" class="form-control" value="{{ Request::get('id') }}">
                    </div>
                    @if (Auth::user()->is_admin == 1)
                    <div class="col-md-2" style="margin-bottom: 5px">
                        <label class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" value="{{ Request::get('username') }}">
                    </div>
                    @endif
                    <div class="col-md-2" style="margin-bottom: 5px">
                        <label class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" value="{{ Request::get('title') }}">
                    </div>
                    <div class="col-md-2" style="margin-bottom: 5px">
                        <label class="form-label">Category</label>
                        <input type="text" name="categorie" class="form-control" value="{{ Request::get('categorie') }}">
                    </div>
                    <div class="col-md-2" style="margin-bottom: 5px">
                        <label class="form-label">Tags</label>
                        <input type="text" name="tags" class="form-control">
                    </div>
                    <div class="col-md-2" style="margin-bottom: 5px">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-control">
                            <option value="">Select</option>
                            <option {{ Request::get('status') == 1 ? 'selected' : '' }} value="1">Active</option>
                            <option {{ Request::get('status') == 100 ? 'selected' : '' }} value="100">Inactive</option>
                        </select>
                    </div>

                    <div class="col-md-2" style="margin-bottom: 5px">
                        <label class="form-label">Publish</label>
                        <select name="is_publish" class="form-control">
                            <option value="">Select</option>
                            <option {{ Request::get('is_publish') == 1 ? 'selected' : '' }} value="1">Yes</option>
                            <option {{ Request::get('is_publish') == 100 ? 'selected' : '' }}value="100">No</option>
                        </select>
                    </div>

                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary">Search</button>
                        <a type="reset" class="btn btn-secondary" href="{{ url('dashboard/blogs') }}">Reset</a>
                    </div>
                </form>
                <hr>

                @include('frontend.layout.message')
                <!-- Table with stripped rows -->
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Image</th>
                            @if (Auth::user()->is_admin == 1)
                            <th scope="col">Username</th>
                            @endif
                            <th scope="col">Title</th>
                            <th scope="col">Categorie</th>
                            <th scope="col">Description</th>
                            <th scope="col">Tags</th>
                            <th scope="col">Status</th>
                            <th scope="col">Published</th>
                            <th scope="col">Created Date</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($blogs as $blog)
                            <tr>
                                <th scope="row">{{ $blog->id }}</th>
                                <td><img src="{{ $blog->getImage() }}" width="100px" alt=""></td>
                                @if (Auth::user()->is_admin == 1)
                                <td>{{ $blog->user_name }}</td>
                                @endif
                                <td>{{ $blog->title }}</td>
                                <td>{{ $blog->category_name }}</td>
                                <td>{{ $blog->description }}</td>
                                @php
                                    $tagstring = '';
                                    foreach ($blog->getTags as $tag) {
                                        $tagstring .= $tag->name . ',';
                                    }
                                @endphp
                                <td>{{ $tagstring }}</td>
                                <td>{{ !empty($blog->status) ? 'Active' : 'Inactive' }}</td>
                                <td>{{ !empty($blog->is_publish) ? 'Yes' : 'No' }}</td>
                                <td>{{ $blog->created_at }}</td>
                                <td>
                                    <a href="{{ url('dashboard/blogs/edit/' . $blog->id) }}"
                                        class="btn btn-primary">Edit</a>
                                    <a onclick="return confirm('Are you sure you want to delete this category')"
                                        href="{{ url('dashboard/blogs/delete/' . $blog->id) }}"
                                        class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>

                {{ $blogs->links() }}
                <!-- End Table with stripped rows -->

            </div>
        </div>
    </section>
@endsection

@section('script')
@endsection
