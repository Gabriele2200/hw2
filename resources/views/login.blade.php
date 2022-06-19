
<html>
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel='stylesheet' href="{{ url ('css/login.css') }}">
        <script src="{{ url ('js/register_def.js')}}"defer="true"></script>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">


        <title>TripBlog ^Accedi^</title>
    </head>
    
 <body>

    <div id="foto1">
          <h1 id="Bio">Condividi le tue esperienze di viaggio su TripBlog</h1>  
    </div>
        <div>
            <img src="{{ url('css/img/logo.png')}}">
        </div>
        <div id="div2">    
        <main>
            <form id='form' name='nome_form_l' method='post'>
                @csrf
                <h1>Accedi</h1>
                <p>
                    <label>Username<input type='text' name='username' value='{{ old("username")}}'></label>
                </p>
                <p>
                    <label>Password<input type='password' name='password'></label>
                </p>
                <p>
                    <label>&nbsp;<input type='submit' value="Accedi"></label>
                </p>
                <div class="login_error hidden"> Compila entrambi i campi</div>
                <p class="signup">Non hai un account? <a href="{{ url('signup') }}">Iscriviti</a>
                @if($error == 'campi_vuoti')
                <div class="login_error"> Compila entrambi i campi</div>
                @elseif($error == 'errate_cred')
                <div class="login_error"> Credenziali errate</div>
                @endif
                </p>
            </form>
            
            <div id='img'></div>

            

        </main>
        </div>

  </body>
</html>