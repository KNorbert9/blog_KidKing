@extends('backend.layout.app')
@section('style')
@endsection

@section('content')
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-6 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Modifier user</h5>

                        @include('frontend.layout.message')
                        <!-- Vertical Form -->
                        <form class="row g-3" action="" method="POST">
                            {{ csrf_field() }}

                            <div class="col-12">
                                <label for="inputNanme4" class="form-label">Your Name</label>
                                <input type="text" value="{{ $user->name }}" class="form-control" id="inputNanme4"
                                    name="name">
                                <div style="color:red">{{ $errors->first('name') }}</div>
                            </div>
                            <div class="col-12">
                                <label for="inputEmail4" class="form-label">Email</label>
                                <input type="email" value="{{ $user->email }}" class="form-control" id="inputEmail4"
                                    name="email">
                                <div>{{ $errors->first('email') }}</div>
                            </div>
                            <div class="col-12">
                                <label for="inputPassword4" class="form-label">Password</label>
                                <input type="password" class="form-control" id="inputPassword4" name="password">
                            </div>
                            <div class="col-12">
                                <label for="inputPassword4" class="form-label">Status</label>
                                <select name="status" class="form-control">
                                    <option {{ $user->status == 1 ? 'selected' : '' }}value="1">Active</option>
                                    <option {{ $user->status == 0 ? 'selected' : '' }}value="0">Inactive</option>
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
