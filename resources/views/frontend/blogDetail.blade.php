@extends('frontend.layout.app')
@section('style')
@endsection

@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-primary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
            <h3 class="display-3 font-weight-bold text-white">Blog Detail</h3>
            <div class="d-inline-flex text-white">
                <p class="m-0"><a class="text-white" href="">Home</a></p>
                <p class="m-0 px-2">/</p>
                <p class="m-0">Blog Detail</p>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <!-- Detail Start -->
    <div class="container py-5">
        <div class="row pt-5">
            <div class="col-lg-8">
                <div class="d-flex flex-column text-left mb-3">
                    <h1 class="mb-3">{{ $getRecord->title }}</h1>
                    <div class="d-flex">
                        <p class="mr-3"><i class="fa fa-user text-primary"></i> {{ $getRecord->user_name }}</p>
                        <p class="mr-3">
                            <i class="fa fa-folder text-primary"></i> {{ $getRecord->category_name }}
                        </p>
                        <p class="mr-3"><i class="fa fa-comments text-primary"></i> 0 </p>
                    </div>
                </div>
                <div class="mb-5">
                    <img class="img-fluid rounded w-100 mb-4" src="{{ asset($getRecord->getImage()) }}"
                        style="object-fit: cover" alt="Image" />
                    {!! $getRecord->description !!}
                </div>

                <!-- Related Post -->
                <div class="mb-5 mx-n3">
                    <h2 class="mb-4 ml-3">Related Post</h2>
                    <div class="owl-carousel post-carousel position-relative">
                        @foreach ($getRelatedPost as $related)
                            <div class="d-flex align-items-center bg-light shadow-sm rounded overflow-hidden mx-3">
                                <a href="{{ url($related->slug) }}">
                                    <img class="img-fluid" src="{{ $related->getImage() }}"
                                        style="width: 80px; height: 80px" />
                                </a>
                                <div class="pl-3">
                                    <a href="{{ url($related->slug) }}">
                                        <h5 class="">{{ $related->title }}</h5>
                                    </a>
                                    <div class="d-flex">

                                        <small class="mr-3"><i class="fa fa-user text-primary"></i>
                                            {{ $related->user_name }}</small>
                                        <small class="mr-3"><i
                                                class="fa fa-folder text-primary"></i>{{ $related->category_name }}</small>
                                        <small class="mr-3"><i class="fa fa-comments text-primary"></i> 15</small>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Comment List -->
                <div class="mb-5">
                    <h2 class="mb-4">3 Comments</h2>
                    <div class="media mb-4">
                        <img src="{{ asset('home/img/user.jpg') }}" alt="Image"
                            class="img-fluid rounded-circle mr-3 mt-1" style="width: 45px" />
                        <div class="media-body">
                            <h6>
                                John Doe <small><i>01 Jan 2045 at 12:00pm</i></small>
                            </h6>
                            <p>
                                Diam amet duo labore stet elitr ea clita ipsum, tempor labore
                                accusam ipsum et no at. Kasd diam tempor rebum magna dolores
                                sed sed eirmod ipsum. Gubergren clita aliquyam consetetur
                                sadipscing, at tempor amet ipsum diam tempor consetetur at
                                sit.
                            </p>
                            <button class="btn btn-sm btn-light">Reply</button>
                        </div>
                    </div>
                    <div class="media mb-4">
                        <img src="{{ asset('home/img/user.jpg') }}" alt="Image"
                            class="img-fluid rounded-circle mr-3 mt-1" style="width: 45px" />
                        <div class="media-body">
                            <h6>
                                John Doe <small><i>01 Jan 2045 at 12:00pm</i></small>
                            </h6>
                            <p>
                                Diam amet duo labore stet elitr ea clita ipsum, tempor labore
                                accusam ipsum et no at. Kasd diam tempor rebum magna dolores
                                sed sed eirmod ipsum. Gubergren clita aliquyam consetetur
                                sadipscing, at tempor amet ipsum diam tempor consetetur at
                                sit.
                            </p>
                            <button class="btn btn-sm btn-light">Reply</button>
                            <div class="media mt-4">
                                <img src="{{ asset('home/img/user.jpg') }}" alt="Image"
                                    class="img-fluid rounded-circle mr-3 mt-1" style="width: 45px" />
                                <div class="media-body">
                                    <h6>
                                        John Doe <small><i>01 Jan 2045 at 12:00pm</i></small>
                                    </h6>
                                    <p>
                                        Diam amet duo labore stet elitr ea clita ipsum, tempor
                                        labore accusam ipsum et no at. Kasd diam tempor rebum
                                        magna dolores sed sed eirmod ipsum. Gubergren clita
                                        aliquyam consetetur, at tempor amet ipsum diam tempor at
                                        sit.
                                    </p>
                                    <button class="btn btn-sm btn-light">Reply</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Comment Form -->
                <div class="bg-light p-5">
                    <h2 class="mb-4">Leave a comment</h2>
                    <form>
                        <div class="form-group">
                            <label for="name">Name *</label>
                            <input type="text" class="form-control" id="name" />
                        </div>
                        <div class="form-group">
                            <label for="email">Email *</label>
                            <input type="email" class="form-control" id="email" />
                        </div>
                        <div class="form-group">
                            <label for="website">Website</label>
                            <input type="url" class="form-control" id="website" />
                        </div>

                        <div class="form-group">
                            <label for="message">Message *</label>
                            <textarea id="message" cols="30" rows="5" class="form-control"></textarea>
                        </div>
                        <div class="form-group mb-0">
                            <input type="submit" value="Leave Comment" class="btn btn-primary px-3" />
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-lg-4 mt-5 mt-lg-0">
                <!-- Author Bio -->
                {{-- <div class="d-flex flex-column text-center bg-primary rounded mb-5 py-5 px-4">
                    <img src="{{ asset('home/img/user.jpg') }}" class="img-fluid rounded-circle mx-auto mb-3"
                        style="width: 100px" />
                    <h3 class="text-secondary mb-3">John Doe</h3>
                    <p class="text-white m-0">
                        Conset elitr erat vero dolor ipsum et diam, eos dolor lorem ipsum,
                        ipsum ipsum sit no ut est. Guber ea ipsum erat kasd amet est elitr
                        ea sit.
                    </p>
                </div> --}}

                <!-- Search Form -->
                <div class="mb-5">
                    <form action="{{ url('blog') }}" method="GET">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control form-control-lg"
                                placeholder="Keyword" />
                            <div class="input-group-append">
                                <button class="input-group-text bg-transparent text-primary"><i
                                        class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Category List -->
                <div class="mb-5">
                    <h2 class="mb-4">Categories</h2>
                    <ul class="list-group list-group-flush">
                        @foreach ($category as $category)
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <a href="">{{ $category->name }}</a>
                                <span class="badge badge-primary badge-pill">{{ $category->totalBlogs() }}</span>
                            </li>
                        @endforeach

                    </ul>
                </div>


                <!-- Recent Post -->
                <div class="mb-5">
                    <h2 class="mb-4">Recent Post</h2>
                    @foreach ($getRecentPost as $recent)
                        <div class="d-flex align-items-center bg-light shadow-sm rounded overflow-hidden mb-3">
                            <img class="img-fluid" src="{{ $recent->getImage() }}" style="width: 80px; height: 80px" />
                            <div class="pl-3">
                                <a href="{{ url($recent->slug) }}">
                                    <h5 class="">{{ $recent->title }}</h5>
                                </a>

                                <div class="d-flex">
                                    <small class="mr-3"><i class="fa fa-user text-primary"></i>
                                        {{ $recent->user_name }}</small>
                                    <small class="mr-3"><i class="fa fa-folder text-primary"></i>
                                        {{ $recent->category_name }}</small>
                                    <small class="mr-3"><i class="fa fa-comments text-primary"></i> </small>
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>



                <!-- Tag Cloud -->
                <div class="mb-5">
                    <h2 class="mb-4">Tag Cloud</h2>
                    <div class="d-flex flex-wrap m-n1">
                        @foreach ($getRecord->getTags as $tags)
                            <a href="{{ url('blog?search='.$tags->name) }}" class="btn btn-outline-primary m-1">{{ $tags->name }}</a>
                        @endforeach


                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Detail End -->
@endsection

@section('script')
@endsection