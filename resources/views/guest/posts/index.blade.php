 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
     <title>Document</title>
 </head>
    <body>
        <div class="container">
            <header class="blog-header py-3">
            <div class="row flex-nowrap justify-content-between align-items-center">
                <div class="col-4 pt-1">
                <a class="text-muted" href="#">Subscribe</a>
                </div>
                <div class="col-4 text-center">
                </div>
                <div class="col-4 d-flex justify-content-end align-items-center">
                <a class="text-muted" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mx-3"><circle cx="10.5" cy="10.5" r="7.5"></circle><line x1="21" y1="21" x2="15.8" y2="15.8"></line></svg>
                </a>
                <a class="btn btn-sm btn-outline-secondary" href="#">Sign up</a>
                </div>
            </div>
            </header>
    
            <div class="nav-scroller py-1 mb-2">
            <nav class="nav d-flex justify-content-between">
                <a class="p-2 text-muted" href="#">World</a>
                <a class="p-2 text-muted" href="#">U.S.</a>
                <a class="p-2 text-muted" href="#">Technology</a>
                <a class="p-2 text-muted" href="#">Design</a>
                <a class="p-2 text-muted" href="#">Culture</a>
                <a class="p-2 text-muted" href="#">Business</a>
                <a class="p-2 text-muted" href="#">Politics</a>
                <a class="p-2 text-muted" href="#">Opinion</a>
                <a class="p-2 text-muted" href="#">Science</a>
                <a class="p-2 text-muted" href="#">Health</a>
                <a class="p-2 text-muted" href="#">Style</a>
                <a class="p-2 text-muted" href="#">Travel</a>
            </nav>
            </div>
    
            <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
            <div class="col-md-6 px-0">
                <h1 class="display-4 font-italic">Boolean blog post</h1>
                <p class="lead my-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium animi similique alias?</p>
                <p class="lead mb-0"><a href="#" class="text-white font-weight-bold">Continue reading...</a></p>
            </div>
            </div>
    
        </div>

        <div class="container">        
            <div class="card-deck">
                @foreach ($articles as $article)
                    <div class="col-4">
                        <div class="card">
                            <img class="card-img-top" src="https://picsum.photos/200/300" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">{{$article->title}}</h5>
                                <p class="card-text">{{$article->excerpt}}</p>
                                <button type="button" class="btn btn-outline-dark">
                                    <a href="{{route('posts.show', $article->slug)}}">Read more</a>
                                </button>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted">Last updated 3 mins ago</small>
                            </div>
                        </div>
                    </div>    
                @endforeach
            </div>
        </div>
        
    </body>
 </html>