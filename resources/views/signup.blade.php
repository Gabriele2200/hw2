<html>
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel='stylesheet' href="{{ url('css/login.css') }}">
        <script src="{{ url ('js/register_def.js')}}" defer="true"></script> 
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">


        <title>TripBlog ^Iscriviti^</title>
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

            
            <form id='form' name='nome_form' method='post'>
                @csrf
                <h1>Iscriviti</h1>
                <p class="name">
                    <label>Nome<input type='text' name='name' value='{{ old("name")}}' ></label>  
                </p>
                <p class="surname">
                    <label>Cognome<input type='text' name='surname' value='{{ old("surname")}}'></label>
                </p>
                <div id="name_error" class="sig_e hidden">Nome o cognome troppo lungo</div>
                <p class="username">
                    <label>Username<input type='text' name='username' value='{{ old("username")}}'></label>
                    <div id="username_error" class="sig_e hidden">Username non valido</div>
                </p>
                <p class="password">
                    <label>Password <input type='password' name='password' value='{{ old("password")}}'></label>
                    <div id="password_error" class="sig_e hidden">Password non valida (almeno 6 caratteri)</div>
                </p>
                <p class="email">
                    <label>Email<input type='text' name='email' value='{{ old("email")}}'></label>
                    <div id="email_error" class="sig_e hidden">Email non valida</div>
                </p>
                <p>
                    <label>&nbsp;<input type='submit' value="Registrati"></label>
                </p>
                <p class="signup">Hai un account? <a href="{{ url ('login') }}">Accedi</a>
                </p>
                <div id="final_error" class="sig_e hidden">Rivedi le tue credenzioli</div>
                @if($error == 'campi_vuoti')
               <div class='sig_e'>Compila tutti i campi</div>
               @elseif($error == 'username_existing')
               <div class='sig_e'>Username già preso</div>
               @elseif($error == 'email_existing')
               <div class='sig_e'>Email in uso</div>
               @elseif($error == 'user_non_valido')
               <div class='sig_e'>Username non valido</div>
               @elseif($error == 'pass_non_valida')
               <div class='sig_e'>Password non valida</div>
               @elseif($error == 'email_non_valia')
               <div class='sig_e'>Email non valida</div>
               @endif
            </form>
            
            <div id='img'></div>

            

        </main>
        </div>

  </body>
</html>