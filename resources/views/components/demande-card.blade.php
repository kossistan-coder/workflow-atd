<div>
    <div>
       @foreach($demande as $approbation)
            <div class="ui icon message">
               <div>
                   <i class="inbox icon"></i>

                   <div class="content">
                       <div class="header">
                           {{$approbation->objet}}
                       </div>
                       <p>{{$approbation->description}}</p>
                       <div>
                           <a class="position" href="demandes/{{$approbation->id}}/delete">
                               @if(\Illuminate\Support\Facades\Auth::guard('web')->user() !== null)
                                   <div>
                                       <div class="ui red icon button mini">
                                           <i class="trash icon"></i>
                                       </div>
                                   </div>
                               @endif
                           </a>

                          @if($approbation->statut->id == 1)
                               <a class="ui tag label">{{$approbation->statut->designation}}</a>
                           @elseif($approbation->statut->id == 2)
                               <a class="ui tag yellow label">{{$approbation->statut->designation}}</a>
                           @elseif($approbation->statut->id == 3)
                               <a class="ui tag red label">{{$approbation->statut->designation}}</a>
                           @elseif($approbation->statut->id == 4)
                               <a class="ui tag blue label">{{$approbation->statut->designation}}</a>
                          @endif

                           @if($authorized === 4)
                               <a class="ui blue  button tiny" href="demandes/{{$approbation->id}}/edit/2">
                                   Valider et envoyer aux RH
                               </a>
                              @elseif($authorized == 3)
                                  <a class="ui   button tiny" href="demandes/{{$approbation->id}}/edit/4">
                                      Approuver la demande
                                  </a>
                              @elseif($authorized === 2)
                                  <a class="ui blue  button tiny" href="demandes/{{$approbation->id}}/edit/2">
                                      Valider et envoyer aux RH
                                  </a>
                                  <a class="ui pink  button tiny" href="demandes/{{$approbation->id}}/edit/4">
                                      Approuver la demande
                                  </a>
                           @endif


                       </div>
                   </div>
               </div>


            </div>
       @endforeach
    </div>
</div>
