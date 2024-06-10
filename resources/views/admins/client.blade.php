@extends('layouts.onboard')
@extends('layouts.message')
@section('content')

    <div class="push">
        <div class="ui modal">
            <div class="header">Créer un utilisateur</div>
            <div class="content">
                <form method="post" class="ui form">
                    @csrf
                    <div class="two fields">
                        <div class="field">
                            <input type="text" placeholder="Nom" required name="nom">
                        </div>
                        <div class="field">
                            <input type="text" placeholder="Prenom" required name="prenom">
                        </div>
                    </div>

                    <div class="field">
                        <div class="fields">
                            <div class="twelve wide field">
                                <label>Email</label>
                                <input type="email" placeholder="Nom" required name="email">
                            </div>
                            <div class="four wide field">
                                <div class="field">
                                    <label>Telephone</label>
                                    <input type="number" placeholder="telephone" required name="telephone">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="two fields">
                        <div class="field">
                            <input type="text" placeholder="Mot de passe" required name="password">
                        </div>
                        <div class="field">
                            <input type="text" placeholder="Confirmer le mot de passe" required name="password_confirmation">
                        </div>
                    </div>
{{--                    <div class="field">--}}
{{--                        <select class="ui fluid search dropdown" multiple="" name="roles[]">--}}
{{--                            <option value="">Roles</option>--}}
{{--                            @foreach($roles as $role)--}}
{{--                                <option value="{{$role->id}}">{{$role->designation}}</option>--}}
{{--                            @endforeach--}}

{{--                        </select>--}}
{{--                    </div>--}}
                    <div>
                        <button type="submit" class="ui blue button">
                            <i class="icon edit"></i>
                            Ajouter cet utilisateur
                        </button>
                    </div>

                </form>
            </div>
        </div>
        <div class="flex-card-2" >
            <div class="text-bold f-16">Utilisateurs</div>

                <div class="ui  button" style="margin-bottom: 10px;" id="back-black">
                    Ajouter un utilisateur
                </div>
            </div>
        </div>
        <div style="margin-left: 220px;">
            <table class="ui compact definition table">
                <thead class="full-width">
                <tr>
                    <th></th>
                    <th>Label</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach( $users as $user)
                    <tr>
                        <td class="collapsing">
                            <div class="ui  checkbox">
                                <input type="checkbox"> <label></label>
                            </div>
                        </td>
                        <td>
                            <div class="flex-image">
                                <div class="ui circular label blue">
                                    {{strtoupper($user->nom[0])}}
                                </div>

                            </div>
                        </td>
                        <td>{{$user->nom}}</td>
                        <td>{{$user->prenom}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            <a class="ui mini icon red button" href="users/{{$user->id}}/delete">
                                <i class="trash icon"></i>
                            </a>
                            <a class="ui mini @if(!\Illuminate\Support\Facades\Auth::guard('admins')->user()->roles->contains('niveau',2)) disabled @endif    icon blue button" href="users/{{$user->id}}/update">
                                <i class="edit icon"></i>
                            </a>
                            <a class="ui mini icon button" href="users/{{$user->id}}/demandes">
                                <i class="chat icon"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach

                </tbody>

            </table>
        </div>
    </div>



@endsection
