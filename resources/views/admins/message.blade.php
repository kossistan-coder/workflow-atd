@extends('layouts.onboard')
@extends('layouts.message')

@section('content')
    <article class="push">
        <br>
        <br>

        <div class="ui grid ">

            <div class="nine wide grid column">
                <div>
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




                                        </div>
                                    </div>
                                </div>


                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
            <div class="six wide grid column" id="zIndex">
                <form class="ui form" method="post">
                    @csrf
                    <div class="ui raised three stacked segment">
                        <div class="field">
                            <div >
                                <div class="field">
                                    <label>Nom</label>
                                    <input type="text" name="objet" placeholder="" required>
                                </div>
                            </div>
                        </div>
                        <div class="field">
                            <div>
                                <label>Description</label>
                                <textarea name="description" required>

                          </textarea>
                            </div>
                        </div>
                        <button class="ui blue button"  type="submit">
                            <i class="edit icon"></i>
                            Poster votre demande
                        </button>
                    </div>

                </form>
            </div>




        </div>
        <br>

    </article>

@endsection
