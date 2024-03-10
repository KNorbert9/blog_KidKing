@extends('backend.layout.app')
@section('style')
@endsection

@section('content')
    <section class="section dashboard">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Liste des Pages
                    <a href="{{ url('dashboard/pages/add') }}" class="btn btn-primary float-end">Add new
                        Page</a>
                </h5>

                @include('frontend.layout.message')
                <!-- Table with stripped rows -->
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Description</th>
                            <th scope="col">Meta Title</th>
                            <th scope="col">Meta Description</th>
                            <th scope="col">Meta Keyword</th>
                            <th scope="col">Created date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($Pages as $pages)
                            <tr>
                                <th scope="row">{{ $pages->id }}</th>
                                <td>{{ $pages->title }}</td>
                                <td>{{ $pages->slug }}</td>
                                <td>{{ $pages->description }}</td>
                                <td>{{ $pages->meta_title }}</td>
                                <td>{{ $pages->meta_description }}</td>
                                <td>{{ $pages->meta_keywords }}</td>
                                <td>{{ $pages->created_at }}</td>
                                <td>
                                    <a href="{{ url('dashboard/pages/edit/' . $pages->id) }}"
                                        class="btn btn-primary">Edit</a>
                                    {{-- <a onclick="return confirm('Are you sure you want to delete this category')"
                                        href="{{ url('dashboard/categories/delete/' . $pages->id) }}"
                                        class="btn btn-danger">Delete</a> --}}
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
