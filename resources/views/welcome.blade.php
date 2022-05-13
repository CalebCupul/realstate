@extends('adminlte::page')

@section('css')
    <link href="css/home.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
@endsection

@section('content')




    <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">

            @for ($i = 0; $i < 3; $i++)
                <div class="carousel-item {{ !$i ? 'active' : '' }}" data-interval="10000">
                    <img src="https://picsum.photos/1920/600?random={{ $i }}" class="rounded d-block w-100 img-fluid overlay-img" alt="...">
                    <div class="container">
                        <div class="carousel-caption text-start">
                            <h1>Example headline.</h1>
                            <p>Some representative placeholder content for the first slide of the carousel.</p>
                            <p><a class="btn btn-lg btn-primary" href="#">Sign up today</a></p>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
        <button class="carousel-control-prev" type="button" data-target="#carouselExampleInterval" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-target="#carouselExampleInterval" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </button>
    </div>


    <!-- Three columns of text below the carousel -->
    <div class="container marketing mt-5 box-marketing">
        <div class="row">
            <div class="col-lg-4">
                <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>

                <h2>Heading</h2>
                <p>Some representative placeholder content for the three columns of text below the carousel. This is the first column.</p>
                <p>
                    <a class="btn btn-secondary" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-secondary" href="#"><i class="fab fa-instagram"></i></a>
                    <a class="btn btn-secondary" href="#"><i class="fab fa-linkedin-in"></i></a>
                </p>
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-4">
                <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>

                <h2>Heading</h2>
                <p>Some representative placeholder content for the three columns of text below the carousel. This is the first column.</p>
                <p>
                    <a class="btn btn-secondary" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-secondary" href="#"><i class="fab fa-instagram"></i></a>
                    <a class="btn btn-secondary" href="#"><i class="fab fa-linkedin-in"></i></a>
                </p>
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-4">
                <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>

                <h2>Heading</h2>
                <p>Some representative placeholder content for the three columns of text below the carousel. This is the first column.</p>
                <p>
                    <a class="btn btn-secondary" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-secondary" href="#"><i class="fab fa-instagram"></i></a>
                    <a class="btn btn-secondary" href="#"><i class="fab fa-linkedin-in"></i></a>
                </p>
            </div><!-- /.col-lg-4 -->
        </div><!-- /.row -->
    </div>

    <div class="container">
        <hr>
    </div>

    <div class="row box-blog mb-4">
        <div class="col text-center">
            <h2 class="display-2">Nomademx Blog</h2>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-12 col-lg-8">
            <div class="row mt-4 justify-content-center">
                @for ($i = 0; $i < 6; $i++)
                    <div class="col-sm-6 col-lg-4">
                        <div class="card elevation-2" data-aos="fade-up">
                            <img src="https://picsum.photos/640/480?random={{ $i }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <p class="card-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Natus dolorum
                                    voluptatibus,
                                    doloribus sapiente animi nihil nostrum recusandae unde blanditiis quod quas nisi exercitationem fuga
                                    maiores
                                    molestias corrupti laudantium aspernatur excepturi.</p>
                                <a href="#" class="btn btn-link">Read more...</a>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </div>

{{-- IMAGENES --}}

<div class="container">
    <hr class="featurette-divider">

    <div class="row box-blog mb-4">
        <div class="col text-center">
            <h2 class="display-2 mb-8">Puerto Vallarta</h2>
        </div>
    </div>

    <div class="box-sale">
        <div class="row featurette">
            <div class="col-md-7">
                <h2 class="featurette-heading">First featurette heading. <span class="text-muted">It’ll blow your mind.</span></h2>
                <p class="lead">Some great placeholder content for the first featurette here. Imagine some exciting prose here.</p>
            </div>
            <div class="col-md-5" data-aos="fade-left">
                <img src="https://picsum.photos/500/500?random={{rand(1, 900)}}" class="card-img-top" width="500" height="500" alt="...">
            </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7 order-md-2">
                <h2 class="featurette-heading">Oh yeah, it’s that good. <span class="text-muted">See for yourself.</span></h2>
                <p class="lead">Another featurette? Of course. More placeholder content here to give you an idea of how this layout would work with some actual real-world content in place.</p>
            </div>
            <div class="col-md-5 order-md-1" data-aos="fade-right">
                <img src="https://picsum.photos/500/500?random={{rand(1, 900)}}" class="card-img-top" width="500" height="500" alt="...">
            </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7">
                <h2 class="featurette-heading">And lastly, this one. <span class="text-muted">Checkmate.</span></h2>
                <p class="lead">And yes, this is the last block of representative placeholder content. Again, not really intended to be actually read, simply here to give you a better view of what this would look like with some actual content. Your content.</p>
            </div>
            <div class="col-md-5" data-aos="fade-left">
                <img src="https://picsum.photos/500/500?random={{rand(1, 900)}}" class="card-img-top" width="500" height="500" alt="...">
            </div>
        </div>
    </div>

    <hr class="featurette-divider">
</div>


{{--  FOOTER  --}}
    <div class="b-example-divider mt-7"></div>

    <div class="container">
        <footer class="py-3 my-4">
            <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Inicio</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Blog</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Precios</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">FAQs</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Nosotros</a></li>
            </ul>
            <p class="text-center text-muted">&copy; 2021 Nomademx</p>
        </footer>
    </div>

@stop

@section('js')
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
@stop
