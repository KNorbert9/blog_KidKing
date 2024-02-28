@extends('backend.layout.app')
@section('style')
@endsection

@section('content')
    <section class="section dashboard">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Liste des utilisateurs
                    <a href="{{ url('dashboard/users/add') }}" class="btn btn-primary float-end">Add new
                        User</a>
                </h5>

                @include('frontend.layout.message')
                <!-- Table with stripped rows -->
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Email Verified</th>
                            <th scope="col">Status</th>
                            <th scope="col">Created Date</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($getAllUsers as $user)
                            <tr>
                                <th scope="row">{{ $user->id }}</th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ !empty($user->email_verified_at) ? 'Yes' : 'No' }}</td>
                                <td>{{ !empty($user->status) ? 'True' : 'False' }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td>
                                    <a href="{{ url('dashboard/users/edit/' . $user->id) }}"
                                        class="btn btn-primary">Edit</a>
                                    <a onclick="return confirm('Are you sure you want to delete this user')"
                                        href="{{ url('dashboard/users/delete/' . $user->id) }}"
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
