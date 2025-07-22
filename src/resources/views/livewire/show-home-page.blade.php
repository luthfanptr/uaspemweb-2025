<x-layouts.app>
    <div>
        <section class="hero-section d-flex justify-content-center align-items-center" id="section_1">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-12 mx-auto">
                        <h1 class="text-white text-center">Discover New Films</h1>
                        <h6 class="text-center">platform for film ratings and reviews</h6>
                        <form method="get" class="custom-form mt-4 pt-2 mb-lg-0 mb-5" role="search">
                            <div class="input-group input-group-lg">
                                <span class="input-group-text bi-search" id="basic-addon1"></span>
                                <input name="keyword" type="search" class="form-control" id="keyword" placeholder="Search for a movie to review or rate">
                                <button type="submit" class="form-control">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <section class="explore-section section-padding" id="section_2">
            <div class="container">
                <div class="col-12 text-center">
                    <h2 class="mb-4">Browse Films</h2>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    @forelse ($films as $film)
                        <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-3">
                            <div class="custom-block bg-white shadow-lg">
                                <a href="{{ route('film.show', $film->id) }}">
                                    <div class="d-flex">
                                        <div>
                                            <h5 class="mb-2">{{ $film->title }}</h5>
                                            <p class="mb-0">{{ \Illuminate\Support\Str::limit($film->synopsis, 60) }}</p>
                                        </div>
                                        <span class="badge bg-primary rounded-pill ms-auto">{{ $film->release_year }}</span>
                                    </div>
                                    @if ($film->poster)
                                        <img src="{{ asset('storage/' . $film->poster) }}" class="custom-block-image img-fluid" alt="{{ $film->title }}">
                                    @endif
                                </a>
                            </div>
                        </div>
                    @empty
                        <p class="text-center">Belum ada film yang ditambahkan.</p>
                    @endforelse
                </div>
            </div>
        </section>

        <footer class="site-footer section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-12 mb-4 pb-2">
                        <a class="navbar-brand mb-2" href="/">
                            <i class="bi-back"></i>
                            <span>Reviu</span>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-6">
                        <h6 class="site-footer-title mb-3">Resources</h6>
                        <ul class="site-footer-links">
                            <li class="site-footer-link-item">
                                <a href="#" class="site-footer-link">Home</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-4 col-6 mb-4 mb-lg-0">
                        <h6 class="site-footer-title mb-3">Information</h6>
                        <p class="text-white d-flex mb-1">
                            <a href="tel:305-240-9671" class="site-footer-link">305-240-9671</a>
                        </p>
                        <p class="text-white d-flex">
                            <a href="mailto:info@company.com" class="site-footer-link">info@company.com</a>
                        </p>
                    </div>
                    <div class="col-lg-3 col-md-4 col-12 mt-4 mt-lg-0 ms-auto">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">English</button>
                            <ul class="dropdown-menu">
                                <li><button class="dropdown-item" type="button">Indonesia</button></li>
                                <li><button class="dropdown-item" type="button">Chinese</button></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</x-layouts.app>
