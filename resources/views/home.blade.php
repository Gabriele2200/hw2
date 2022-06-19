@extends("layout.layout")

<head>
   <script src="{{ url ('js/home.js')}}" defer="true"></script>
   <link rel="stylesheet" href="{{ url('css/home.css') }}">
   <link rel="stylesheet" href="{{ url('css/post.css') }}">

    <title>TripBlog-Home</title>
</head>
    
@section("sezione")

    <form name='ricerca' id="ricerca">
        <div id="barra">
        <label> <input type='text' name="content" id="content"></label> 
        <select name="tipo" id="tipo">
            <option value="meteo">Meteo</option>
            <option value="post">Post</option>

        </select>
        <label>&nbsp;<input class="submit" type="submit" value="Cerca"></label>    
        </div>
    </form>
    <div id="Risposta_R" class="hidden">
                 
        <div id="Meteo_div" class="hidden">
            <h1 id="Title_M"> </h1>
            <p id="Parag_M">
                <span >

                </span>
            </p>
            <a id="link_m"href=""> Clicca per maggiori informazioni</a>

        </div>        
        </div>



    </div>



    <header>
    <div id="img-overlay"></div>
      <div id="it-testo">
        <div id="titolo"> Benvenuto<br> {{$user['username']}}</div>
      </div>      
    </header>

    <div class="Home_post" >
        <article >
            <div class="post">
                <h1>All Post</h1>
            </div>
        </article>


    </div>


@endsection
