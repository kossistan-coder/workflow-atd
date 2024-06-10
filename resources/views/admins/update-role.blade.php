@extends('layouts.onboard')
@extends('layouts.message')

@section('content')
    <div class="push">
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>

        <div class="ui centered grid">

           <div class="ui ten wide column segment">
               <form class="ui form " method="post">
                   <h2>Modifier le role {{$roles->designation}}</h2>
                   @csrf

                   <div class="field">
                       <input type="text" placeholder="{{$roles->designation}}" name="designation">
                   </div>
                   <div class="field">
                       <input type="text" placeholder="{{$roles->description}}"  name="description">
                   </div>

                   <div class="field">
                       <button class="ui blue button" type="submit">
                           Modifier ce role
                       </button>
                   </div>

               </form>
           </div>
        </div>
    </div>
@endsection
