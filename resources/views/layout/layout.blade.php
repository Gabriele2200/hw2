<html>

    <head>
        <link rel="stylesheet" href="{{ url('css/nav.css') }}">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        
        

    </head>

    
    <body>
        
    <nav>
    <a class='sezione' id='home_'  href="{{url('home')}}">Home</a>
    <a class='sezione' href="{{url('profilo')}}">Profilo</a>
    <a class='sezione' href="{{url('create')}}"> Crea post </a>
    <a class='sezione' href="{{url('logout')}}">Logout</a>
    </nav>
    

    @yield("sezione")





 




   <!--  <footer>
        <h1> Gabriele Blandini</h1>
        <em id="emf"> 1000002230</em>
    </footer> -->
    </body>
</html>