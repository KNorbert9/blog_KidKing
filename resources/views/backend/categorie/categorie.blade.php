@extends('backend.layout.app')
@section('style')
@endsection

@section('content')
    <section class="section dashboard">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Liste des Catégories
                    <a href="{{ url('dashboard/categories/add') }}" class="btn btn-primary float-end">Add new
                        Category</a>
                </h5>

                @include('frontend.layout.message')
                <!-- Table with stripped rows -->
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Title</th>
                            <th scope="col">Meta Title</th>
                            <th scope="col">Meta Description</th>
                            <th scope="col">Meta Keyword</th>
                            <th scope="col">Status</th>
                            <th scope="col">Created Date</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($getAllCategories as $categorie)
                            <tr>
                                <th scope="row">{{ $categorie->id }}</th>
                                <td>{{ $categorie->name }}</td>
                                <td>{{ $categorie->slug }}</td>
                                <td>{{ $categorie->title }}</td>
                                <td>{{ $categorie->meta_title }}</td>
                                <td>{{ $categorie->meta_description }}</td>
                                <td>{{ $categorie->meta_keywords }}</td>
                                <td>{{ !empty($categorie->status) ? 'True' : 'False' }}</td>
                                <td>{{ $categorie->created_at }}</td>
                                <td>
                                    <a href="{{ url('dashboard/categories/edit/' . $categorie->id) }}"
                                        class="btn btn-primary">Edit</a>
                                    <a onclick="return confirm('Are you sure you want to delete this category')"
                                        href="{{ url('dashboard/categories/delete/' . $categorie->id) }}"
                                        class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                <!-- End Table with stripped rows -->

            </div>
        </div>
    </section>
@endsection

@section('script')
@endsection
