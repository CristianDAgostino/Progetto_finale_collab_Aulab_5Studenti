<x-layout>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <div class="container d-flex justify-content-center align-items-center ">
        @if (session('status'))
        <div class="alert alert-success success-message">
            {{ session('status') }}
        </div>
        @endif
    </div>
    @if (session('message'))
    <div class="container d-flex justify-content-center align-items-center ">
        <div class="alert alert-success success-message">
            {{ session('message') }}
        </div>
    </div>
    @endif
    @if (session('errorMessage'))
    <div class="container d-flex justify-content-center align-items-center ">
        <div class="alert alert-danger success-danger">
            {{ session('errorMessage') }}
        </div>
    </div>
    @endif
    @if (session('ErrorRevisorMessage'))
    <div class="container d-flex justify-content-center align-items-center ">
        <div class="alert alert-danger success-danger">
            {{ session('ErrorRevisorMessage') }}
        </div>
    </div>
    @endif
    {{-- INIZIO MESSAGGIO DI ERRORE QUANDO CLICCANO IL TASTO CERCA SENZA AVER INSERITO NULLA --}}
    @if(session('error'))
    <div class="alert alert-danger fw-bolder">
        {{ session('error') }}
    </div>
    <script>
        const errorMessage = document.querySelector('.alert-danger');
        
        if (errorMessage) {
            setTimeout(() => {
                errorMessage.style.transition = 'opacity 0.5s';
                errorMessage.style.opacity = '0';
                
                setTimeout(() => {
                    errorMessage.remove();
                }, 500);
            }, 3000);
        }
    </script>
    @endif
        {{--  FINE MESSAGGIO DI ERRORE QUANDO CLICCANO IL TASTO CERCA SENZA AVER INSERITO NULLA --}}

    
    {{-- inizio header  --}}
    
    <header class="img_header vh-100 container-fluid">
        <div class="row" >
            <div class="col-12 annuncio">
                <h1 class="text-center"> {{ __('ui.Yesterday? Tomorrow?') }} <span class="color-main">{{__('ui.Now!')}}</span> </h1>
                <h3 class="text-center mt-2">{{__('ui.The site ready for your requests! You discover')}} <span class="color-main">{{__('ui.Now!')}}</span></h3>
                <form role="search" action="{{ route('article.search') }}" method="GET">
                    <div class="search-header position-relative mt-4">
                        <input class="form-control search-input" type="search" placeholder="{{__('ui.Search')}}" aria-label="Search"
                        name="query">
                        <button class="btn-search fas fa-search search-icon" type="submit">
                        </button>
                    </div>
                </form>
                @auth
                <div class="container my-5 d-flex justify-content-center">
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center flex-column">
                            {{-- <h1 data-aos="fade-up" class="text-center">{{__('ui.Enter your article')}}</h1> --}}
                            {{-- <a href="{{ route('article.create') }}" class="btn btn-outline-primary">Aggiungi articolo</a> --}}
                            {{-- custom button --}}
                            <a href="{{route('article.create')}}" class="linkCustom"><button class="buttonAddArticle">
                                <span class="textButton">{{__('ui.Add article')}}</span>
                                <span class="svg">
                                    <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="50"
                                    height="20"
                                    viewBox="0 0 38 15"
                                    fill="none"
                                    >
                                    <path
                                    fill="white"
                                    d="M10 7.519l-.939-.344h0l.939.344zm14.386-1.205l-.981-.192.981.192zm1.276 5.509l.537.843.148-.094.107-.139-.792-.611zm4.819-4.304l-.385-.923h0l.385.923zm7.227.707a1 1 0 0 0 0-1.414L31.343.448a1 1 0 0 0-1.414 0 1 1 0 0 0 0 1.414l5.657 5.657-5.657 5.657a1 1 0 0 0 1.414 1.414l6.364-6.364zM1 7.519l.554.833.029-.019.094-.061.361-.23 1.277-.77c1.054-.609 2.397-1.32 3.629-1.787.617-.234 1.17-.392 1.623-.455.477-.066.707-.008.788.034.025.013.031.021.039.034a.56.56 0 0 1 .058.235c.029.327-.047.906-.39 1.842l1.878.689c.383-1.044.571-1.949.505-2.705-.072-.815-.45-1.493-1.16-1.865-.627-.329-1.358-.332-1.993-.244-.659.092-1.367.305-2.056.566-1.381.523-2.833 1.297-3.921 1.925l-1.341.808-.385.245-.104.068-.028.018c-.011.007-.011.007.543.84zm8.061-.344c-.198.54-.328 1.038-.36 1.484-.032.441.024.94.325 1.364.319.45.786.64 1.21.697.403.054.824-.001 1.21-.09.775-.179 1.694-.566 2.633-1.014l3.023-1.554c2.115-1.122 4.107-2.168 5.476-2.524.329-.086.573-.117.742-.115s.195.038.161.014c-.15-.105.085-.139-.076.685l1.963.384c.192-.98.152-2.083-.74-2.707-.405-.283-.868-.37-1.28-.376s-.849.069-1.274.179c-1.65.43-3.888 1.621-5.909 2.693l-2.948 1.517c-.92.439-1.673.743-2.221.87-.276.064-.429.065-.492.057-.043-.006.066.003.155.127.07.099.024.131.038-.063.014-.187.078-.49.243-.94l-1.878-.689zm14.343-1.053c-.361 1.844-.474 3.185-.413 4.161.059.95.294 1.72.811 2.215.567.544 1.242.546 1.664.459a2.34 2.34 0 0 0 .502-.167l.15-.076.049-.028.018-.011c.013-.008.013-.008-.524-.852l-.536-.844.019-.012c-.038.018-.064.027-.084.032-.037.008.053-.013.125.056.021.02-.151-.135-.198-.895-.046-.734.034-1.887.38-3.652l-1.963-.384zm2.257 5.701l.791.611.024-.031.08-.101.311-.377 1.093-1.213c.922-.954 2.005-1.894 2.904-2.27l-.771-1.846c-1.31.547-2.637 1.758-3.572 2.725l-1.184 1.314-.341.414-.093.117-.025.032c-.01.013-.01.013.781.624zm5.204-3.381c.989-.413 1.791-.42 2.697-.307.871.108 2.083.385 3.437.385v-2c-1.197 0-2.041-.226-3.19-.369-1.114-.139-2.297-.146-3.715.447l.771 1.846z"
                                    ></path>
                                </svg>
                            </span>
                        </button>
                    </a>
                </div>
            </div>
        </div>
        @endauth
        @guest
        <div class="container my-5 d-flex justify-content-center">
            <div class="row">
                <div class="col-12 d-flex justify-content-center flex-column">
                    {{-- <h1 data-aos="fade-up" class="text-center">{{__('ui.Enter your article')}}</h1> --}}
                    {{-- <a href="{{ route('article.create') }}" class="btn btn-outline-primary">Aggiungi articolo</a> --}}
                    {{-- custom button --}}
                    <a href="{{route('register')}}" class="linkCustom"><button class="buttonAddArticle">
                        <span class="textButton">{{__('ui.Register')}}</span>
                        <span class="svg">
                            <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="50"
                            height="20"
                            viewBox="0 0 38 15"
                            fill="none"
                            >
                            <path
                            fill="white"
                            d="M10 7.519l-.939-.344h0l.939.344zm14.386-1.205l-.981-.192.981.192zm1.276 5.509l.537.843.148-.094.107-.139-.792-.611zm4.819-4.304l-.385-.923h0l.385.923zm7.227.707a1 1 0 0 0 0-1.414L31.343.448a1 1 0 0 0-1.414 0 1 1 0 0 0 0 1.414l5.657 5.657-5.657 5.657a1 1 0 0 0 1.414 1.414l6.364-6.364zM1 7.519l.554.833.029-.019.094-.061.361-.23 1.277-.77c1.054-.609 2.397-1.32 3.629-1.787.617-.234 1.17-.392 1.623-.455.477-.066.707-.008.788.034.025.013.031.021.039.034a.56.56 0 0 1 .058.235c.029.327-.047.906-.39 1.842l1.878.689c.383-1.044.571-1.949.505-2.705-.072-.815-.45-1.493-1.16-1.865-.627-.329-1.358-.332-1.993-.244-.659.092-1.367.305-2.056.566-1.381.523-2.833 1.297-3.921 1.925l-1.341.808-.385.245-.104.068-.028.018c-.011.007-.011.007.543.84zm8.061-.344c-.198.54-.328 1.038-.36 1.484-.032.441.024.94.325 1.364.319.45.786.64 1.21.697.403.054.824-.001 1.21-.09.775-.179 1.694-.566 2.633-1.014l3.023-1.554c2.115-1.122 4.107-2.168 5.476-2.524.329-.086.573-.117.742-.115s.195.038.161.014c-.15-.105.085-.139-.076.685l1.963.384c.192-.98.152-2.083-.74-2.707-.405-.283-.868-.37-1.28-.376s-.849.069-1.274.179c-1.65.43-3.888 1.621-5.909 2.693l-2.948 1.517c-.92.439-1.673.743-2.221.87-.276.064-.429.065-.492.057-.043-.006.066.003.155.127.07.099.024.131.038-.063.014-.187.078-.49.243-.94l-1.878-.689zm14.343-1.053c-.361 1.844-.474 3.185-.413 4.161.059.95.294 1.72.811 2.215.567.544 1.242.546 1.664.459a2.34 2.34 0 0 0 .502-.167l.15-.076.049-.028.018-.011c.013-.008.013-.008-.524-.852l-.536-.844.019-.012c-.038.018-.064.027-.084.032-.037.008.053-.013.125.056.021.02-.151-.135-.198-.895-.046-.734.034-1.887.38-3.652l-1.963-.384zm2.257 5.701l.791.611.024-.031.08-.101.311-.377 1.093-1.213c.922-.954 2.005-1.894 2.904-2.27l-.771-1.846c-1.31.547-2.637 1.758-3.572 2.725l-1.184 1.314-.341.414-.093.117-.025.032c-.01.013-.01.013.781.624zm5.204-3.381c.989-.413 1.791-.42 2.697-.307.871.108 2.083.385 3.437.385v-2c-1.197 0-2.041-.226-3.19-.369-1.114-.139-2.297-.146-3.715.447l.771 1.846z"
                            ></path>
                        </svg>
                    </span>
                </button>
            </a>
        </div>
    </div>
</div>
@endguest
{{-- custom button--}}


</div>

</div>

</header>

{{-- fine header --}}
{{-- Sezione categorie  --}}
<div class="container py-5 category">
    <h1 class="text-center text-blue " data-aos="fade-up">{{__('ui.Our categories:')}}</h1>
    <div class="search-container">
        <div class="search-wrapper">
            <div class="category-filters d-flex justify-content-center align-content-center ">
                <a href="{{ route('byCategory', ['category' => 'all']) }}" class="filter-chip active ">
                    {{-- <i class="fas fa-globe"></i> Tutto abbiamo disattivato il globale --}}
                </a>
                
                @foreach ($categories as $category)
                
                <a class="btn category2 d-flex flex-wrap justify-content-center" href="{{ route('byCategory', ['category' => $category->id]) }}" class="filter-chip">
                    <i class="fas {{ $category->icon }}"></i> {{__('ui.'.$category->name)}}
                </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
{{-- fine sezione categorie --}}
{{-- inizio main --}}


<div class="container d-flex justify-content-center my-5">
    <div class="row">
        <div class="col-12">
            <h1 class="text-blue" data-aos="fade-up">{{__('ui.Most recent articles')}}:</h1>
        </div>
    </div>
</div>

{{-- fine main  --}}
{{-- inizio articoli più recenti --}}

<div class="container">
    <div class="row justify-content-center align-items-center">
        
        
        @forelse ($articles as $article)
        <div class="col-12 col-md-4 d-flex justify-content-center align-items-center">
            <x-card :article="$article" />
        </div>
        @empty
        <div class="col-12">
            <h3 class="text-center text-blue">
                {{__('ui.There are no articles yet')}}
            </h3>
        </div>
        @endforelse
        
    </div>
</div>

{{-- fine articoli più recenti --}}

</x-layout>
