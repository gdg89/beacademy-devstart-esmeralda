@extends('default.layout')

@section('content')
    <title>Página de login</title>
    <link rel="stylesheet" href="resources/css/style-login.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <div class="box_login">
      <div class="capa"></div>
      <h1>Fazer login</h1>

      <form method="POST" action="/login">
        <input type="email" name="email" placeholder="EMAIL" />
        <input type="password" name="password" placeholder="SENHA" />
        <button class="btn-login">Login</button>
        <!-- <span class="msg_error"
          ><i
            class="fa fa-exclamation-triangle"
            style="font: size 16px; color: #ff6d6d; padding-right: 5px"
          ></i
          >Tentativa inválida</span
        > -->
      </form>
    </div>
@endsection