@extends('layout.layout')

<head>
    <link rel="stylesheet" href="{{ url('css/c_post.css') }}">
    <title>Crea post</title>
</head>

  
@section('sezione')
   <form method="post">
    @csrf
   <h1>Nuovo post</h1>
   <textarea id='Titolo'name="title" placeholder="Titolo.." >{{{ Request::old ("title")}}}</textarea>
   <textarea name="content" placeholder="nuovo post..." >{{{ Request::old ("content")}}}</textarea>
   <label><input type="submit" value="pubblica">&nbsp;
   </form>


    @if($error == 'postato')
    <div class="ok">Post pubblicato correttamente!</div>
    @elseif($error == 'n_postato')
    <div class="errore">Errore nella pubblicazione del post</div>
    @endif
@endsection