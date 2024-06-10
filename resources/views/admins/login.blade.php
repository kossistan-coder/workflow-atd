@extends('layouts.message')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="{{asset('/dist/semantic.css')}}">
    <link rel="stylesheet" href="{{asset('/dist/style.css')}}">
    <link rel="stylesheet" href="{{asset('/dist/lineIcons/lineicons.css')}}">
    <title>Document</title>
</head>
<style>
      body {
      background-color: #DADADA;
    }
    body > .grid {
      height: 100%;
    }
    .image {
      margin-top: -100px;
    }
    .column {
      max-width: 450px;
    }
  </style>
<script src="{{asset('/dist/jquery.js')}}"></script>
<script src="{{asset('/dist/semantic.js')}}"></script>

<script>
    let message = document.getElementById("message")
    let error = document.getElementById('error')
    let close = document.getElementById('close')
    error.addEventListener('click',()=>{
        message.classList.add('hidden') ;
    })
    close.addEventListener('click',()=>{
        success.classList.add('hidden') ;
    })
    $(document)
        .ready(function() {
            $('.ui.form')
                .form({
                    fields: {
                        email: {
                            identifier  : 'email',
                            rules: [
                                {
                                    type   : 'empty',
                                    prompt : 'Entrer votre e-mail'
                                },
                                {
                                    type   : 'email',
                                    prompt : 'E-mail non valide'
                                }
                            ]
                        },
                        password: {
                            identifier  : 'password',
                            rules: [
                                {
                                    type   : 'empty',
                                    prompt : 'Entrer un mot de passe valide'
                                },
                                // {
                                //     type   : 'length[6]',
                                //     prompt : 'Your password must be at least 6 characters'
                                // }
                            ]
                        }
                    }
                })
            ;
        })
    ;
</script>

<body>
    <div class="ui middle aligned center aligned grid">
        <div class="column">
          <h2 class="ui teal image header">
            <img src="{{asset('/dist/images/semantic.png')}}" class="image">
            <div class="content">
              Log-in to your account
            </div>
          </h2>
          <form class="ui large form" method="post">
              @csrf
            <div class="ui stacked segment">
              <div class="field">
                <div class="ui left icon input">
                  <i class="user icon"></i>
                  <input type="text" name="email" placeholder="E-mail address">
                </div>
              </div>
              <div class="field">
                <div class="ui left icon input">
                  <i class="lock icon"></i>
                  <input type="password" name="password" placeholder="Password">
                </div>
              </div>
              <button class="ui fluid large teal submit button" type="submit">
                Login
            </button>
            </div>

            <div class="ui error message"></div>

          </form>

          <div class="ui message">
            New to us? <a href="#">Sign Up</a>
          </div>
        </div>
      </div>
</body>

</html>
