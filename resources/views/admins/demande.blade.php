@extends('layouts.onboard')
@extends('layouts.message')

@section('content')
    <article class="push">
        <br>
        <br>


       <div class="ui grid ">
           <div class="nine wide grid column">
               <div>
                   @if(sizeof($demandes) !== 0)
                       <div>
                           @foreach($demandes as $approbation)
                               <div class="ui icon message">
                                   <div>
                                       <i class="inbox icon"></i>

                                       <div class="content">
                                           <div class="header">
                                               {{$approbation->objet}}
                                           </div>
                                           <p>{{$approbation->description}}</p>
                                           <div>
                                               <a class="position" href="/demandes/{{$approbation->id}}/delete">
                                                   @if(\Illuminate\Support\Facades\Auth::guard('web')->user() !== null)
                                                       <div>
                                                           <div class="ui red icon button mini">
                                                               <i class="trash icon"></i>
                                                           </div>
                                                       </div>
                                                   @endif
                                               </a>

                                               @if($approbation->statut->niveau == 1)
                                                   <a class="ui tag label">{{$approbation->statut->designation}}</a>
                                               @elseif($approbation->statut->niveau == 2)
                                                   <a class="ui tag yellow label">{{$approbation->statut->designation}}</a>
                                               @elseif($approbation->statut->niveau == 3)
                                                   <a class="ui tag red label">{{$approbation->statut->designation}}</a>
                                               @elseif($approbation->statut->niveau == 4)
                                                   <a class="ui tag blue label">{{$approbation->statut->designation}}</a>
                                               @endif

                                               @if($authorized === 4)
                                                   <div class="ui two buttons">
                                                       <a class="ui blue @if($approbation->statut->niveau === 4) disabled @endif  button tiny" href="/demandes/{{$approbation->id}}/edit/2">
                                                           Valider et envoyer aux RH
                                                       </a>
                                                       <a class="ui button" href="/demandes/{{$approbation->id}}/edit/3">
                                                           Rejetée
                                                       </a>
                                                   </div>
                                               @elseif($authorized == 3)
                                                   <div class="two buttons">
                                                       <a class="ui @if($approbation->statut->niveau === 4) disabled @endif  button tiny" href="/demandes/{{$approbation->id}}/edit/4">
                                                           Approuver la demande
                                                       </a>
                                                       <a class="ui tiny button" href="/demandes/{{$approbation->id}}/edit/1">
                                                           Annuler
                                                       </a>
                                                   </div>

                                               @elseif($authorized === 2)
                                                   <a class="ui blue @if($approbation->statut->niveau === 4) disabled @endif  button tiny" href="/demandes/{{$approbation->id}}/edit/2">
                                                       Valider et envoyer aux RH
                                                   </a>
                                                   <div class="ui three buttons">
                                                       <a class="ui pink  button @if($approbation->statut->niveau === 4) disabled @endif tiny" href="/demandes/{{$approbation->id}}/edit/4">
                                                           Approuver la demande

                                                       </a>
                                                       <a class="ui tiny button" href="/demandes/{{$approbation->niveau}}/edit/2">
                                                           Annuler
                                                       </a>
                                                       <a class="ui tiny red button" href="/demandes/{{$approbation->niveau}}/edit/4">
                                                           Rejetée
                                                       </a>
                                                   </div>
                                               @endif


                                           </div>
                                       </div>
                                   </div>


                               </div>
                           @endforeach
                       </div>
                   @else
                       <div class="flex-center">
                           <div class="ui message">
                               <div >
                                   <img src="{{asset('/dist/images/delivery.png')}}">
                                   <h3>AUCUN MESSAGE POUR LE MOMENT</h3>
                               </div>
                           </div>
                       </div>
                   @endif
               </div>

           </div>



       </div>
        <br>

    </article>

@endsection
