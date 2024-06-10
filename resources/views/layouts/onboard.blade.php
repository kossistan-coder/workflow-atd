<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('/dist/semantic.css')}}">
    <link rel="stylesheet" href="{{asset('/dist/style.css')}}">
    <link rel="stylesheet" href="{{asset('/dist/lineIcons/lineicons.css')}}">
    <title>restaurentapi</title>
</head>
<body>
    <div class="dimmer">
        <div class="add-body">

        </div>
    </div>
    <div class="ui vertical sidebar visible   menu" id="sidebar">
        <a class="ui header item">
            <img src="{{asset('/dist/images/semantic.png')}}" alt="" class="ui small image">
            Swagger
        </a>
       <a class="active item" id="item-flex" href="{{route('overview')}}">
        <i class="lni lni-dashboard " style="font-size: 15px;"></i>
           <span > Dashboard</span>
       </a>
       @if(session('admin') !== null && \Illuminate\Support\Facades\Auth::guard('web')->user() === null)
            <a class="item" href="{{route('admins')}}">
                <div class="flex-card-2">
                    <div id="item-flex">
                        <i class="lni lni-users " style="font-size: 15px;"></i>
                        <span> administrateurs</span>
                    </div>
                    <div class="ui red mini label">51</div>
                </div>
            </a>
        @endif
        @if(\Illuminate\Support\Facades\Auth::guard('web')->user() !== null )
            <a class="item" href="/demandes/{{\Illuminate\Support\Facades\Auth::guard('web')->id()}}">
                <div class="flex-card-2">
                    <div id="item-flex">
                        <i class="lni lni-users " style="font-size: 15px;"></i>
                        <span> Vos demandes</span>
                    </div>
                    <div class="ui blue mini label">51</div>
                </div>
            </a>
        @endif

        @if(session('admin') !== null && \Illuminate\Support\Facades\Auth::guard('web')->user() === null)
            <a class="item" href="{{route('users')}}">
                <div class="flex-card-2">
                    <div id="item-flex">
                        <i class="lni lni-users " style="font-size: 15px;"></i>
                        <span> utilisateurs</span>
                    </div>
                    <div class="ui red mini label">51</div>
                </div>
            </a>
        @endif

        @if(\Illuminate\Support\Facades\Auth::guard('web')->check())


            <a class="item" id="item-flex" href="/users/{{\Illuminate\Support\Facades\Auth::guard('web')->id()}}/update">
                <i class="lni lni-hacker-news" style="font-size: 15px;"></i>
                <span> Configurations</span>
            </a>
        @endif

       @if(session('admin') !== null && \Illuminate\Support\Facades\Auth::guard('web')->user() === null)

            <a class="item" id="item-flex" href="{{route('roles')}}">
                <i class="lni lni-user " style="font-size: 15px;"></i>
                <span> Gestion des roles </span>
            </a>




                    <a class="item" id="item-flex" href="/users/{{\Illuminate\Support\Facades\Auth::guard('admins')->id()}}/update">
                        <i class="lni lni-hacker-news" style="font-size: 15px;"></i>
                        <span> Configurations</span>
                    </a>


       @endif



{{--        <a class="item" id="item-flex" >--}}
{{--            <i class="lni lni-burger " style="font-size: 15px;"></i>--}}
{{--               <span> Restaurant </span>--}}
{{--        </a>--}}
{{--        <a class="item"id="item-flex" >--}}
{{--            <i class="lni lni-briefcase " style="font-size: 15px;"></i>--}}
{{--               <span> Commandes </span>--}}
{{--        </a>--}}
{{--        <a class="item" id="item-flex" >--}}
{{--            <i class="lni lni-user " style="font-size: 15px;"></i>--}}
{{--               <span> Gestion des roles </span>--}}
{{--        </a>--}}
{{--        <a class="item" id="item-flex" >--}}
{{--            <i class="lni lni-patreon " style="font-size: 15px;"></i>--}}
{{--               <span> Transactions </span>--}}
{{--        </a>--}}
{{--        <a class="item" >--}}
{{--            <div class="flex-card-2">--}}
{{--                <div id="item-flex">--}}
{{--                    <i class="lni lni-envelope" style="font-size: 15px;"></i>--}}
{{--                    <span> Services clients</span>--}}
{{--                </div>--}}
{{--              <div class="ui teal mini label">2</div>--}}
{{--            </div>--}}
{{--        </a>--}}
{{--        <a class="item" >--}}
{{--            <div class="flex-card-2">--}}
{{--                <div id="item-flex">--}}
{{--                    <i class="lni lni-hacker-news" style="font-size: 15px;"></i>--}}
{{--                    <span> Configurations</span>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </a>--}}
        <a id="logout" href="{{route('logout')}}">
            <i class="sign out alternate icon"></i>
            <span>

                Logout
            </span>
        </a>

      </div>
      <div class="dimmed pusher">
        <header class="ui fixed borderless menu" style="padding-left: 220px;">
            <div class="left menu">
                <a style="margin: 15px;">
                    <i class="sidebar black icon"></i>
                  </a>
            </div>
            <div class="right menu">
              <div class="item">
                <div class="ui icon input" >
                    <input type="text" placeholder="Search..." style="border-radius: 20px;">
                    <i class=" search link icon"></i>
                  </div>
              </div>
                <div class="item">
                    <i class="lni lni-wechat" style="font-size: 20px;"></i>
                    <div class="ui mini red label" style="margin-left: -10px;margin-bottom:10px;">2</div>
                </div>
                <div class="item">
                    <i class="bell icon"></i>
                </div>

            </div>
              </div>
          </header>
      </div>
      @section('content')

      @show

      <script src="{{asset('/dist/jquery.js')}}"></script>
      <script src="{{asset('/dist/semantic.js')}}"></script>
      <script src="{{asset('/dist/components/progress.js')}}"></script>
      <script src="{{asset('/dist/components/dropdown.js')}}"></script>
      <script src="{{asset('/dist/components/toast.js')}}"></script>
      <script src="{{asset('/dist/components/transition.js')}}"></script>


      <script>
           let add = document.getElementById('add-restaurant')

        let dimmer = document.querySelector('.dimmer')
           let message = document.getElementById("message")
           let success = document.getElementById("success")
           let rolePop = document.getElementById('back-black');
           let updateRole = document.getElementById('update-role');
           let updateModal = document.getElementById('updateModal');
           let close = document.getElementById('close')
           let error = document.getElementById('error')


        $(document).ready(function name(){

            rolePop.addEventListener('click',()=>{
                $('.ui.modal')
                    .modal('show')
                ;
            })


                    $('.ui.form')
                        .form({
                            fields: {
                                email: {
                                    identifier  : 'email',
                                    rules: [
                                        {
                                            type   : 'empty',
                                            prompt : 'Please enter your e-mail'
                                        },
                                        {
                                            type   : 'email',
                                            prompt : 'Please enter a valid e-mail'
                                        }
                                    ]
                                },
                                password: {
                                    identifier  : 'password',
                                    rules: [
                                        {
                                            type   : 'empty',
                                            prompt : 'Please enter your password'
                                        },
                                        {
                                            type   : 'length[6]',
                                            prompt : 'Your password must be at least 6 characters'
                                        }
                                    ]
                                }
                            }
                        })
                    ;



            let itemFlex = document.querySelectorAll('#sidebar a');
            itemFlex.forEach(element => {

                element.addEventListener('click',()=>{
                    itemFlex.forEach(link=>{
                        link.classList.remove('active')
                    })
                    if(element.classList.contains('active')){
                        element.classList.remove('active')
                    }else{
                        element.classList.add('active')
                    }

            })
            });


            $('#example1').progress({
                percent:40
            });
            $('#example2').progress({
                percent:25
            });
            $('#example3').progress({
                percent:30
            });

            $('#date_calendar')
            .calendar({
                type: 'date'
            })
            ;
            $('.ui.dropdown')
            .dropdown()
            ;
            add.addEventListener('click',()=>{
                $('#popup')
            .transition('fly down')
            ;
            dimmer.style.display = "block"
            })

            dimmer.addEventListener('click',()=>{
                $('#popup')
            .transition('fly down')
            ;
            dimmer.style.display = "none"
            })
        })


      </script>

<script>
    error.addEventListener('click',()=>{
        message.classList.add('hidden') ;
    })
    close.addEventListener('click',()=>{
        success.classList.add('hidden') ;
    })
</script>
</body>
</html>
