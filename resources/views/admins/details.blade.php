@extends('layouts.onboard')
@extends('layouts.message')
@section('content')
<div class="ui container">
    <br>
    <br>
    <br>
    <form class="ui form" method="post">
        @csrf

        <div class="ui segment">
            <div class="field">

                <div class="two fields">
                    <div class="field">
                        <label>Nom</label>
                        <input type="text" name="nom" placeholder="{{$admin->nom}}" >
                    </div>
                    <div class="field">
                        <label>Prenom</label>
                        <input type="text" name="prenom" placeholder="{{$admin->prenom}}">
                    </div>
                </div>
            </div>
            <div class="field">
                <div class="fields">
                    <div class="twelve wide field">
                        <label>Nom</label>
                        <input type="email" name="email" placeholder="{{$admin->email}}">
                    </div>
                    <div class="four wide field">
                      <div class="field">
                          <label>Nom</label>
                          <input type="number" name="telephone" placeholder="{{$admin->telephone}}">
                      </div>
                    </div>
                </div>
            </div>
            <label>
                Roles : (
                @foreach($admin->roles as $role)
                    <div class="ui red tiny label">
                        {{$role->designation}}
                    </div>

                @endforeach

                <span>)</span>
            </label>
            <br>
            <br>
            <select class="ui fluid search dropdown"  name="roles" >
                <option value="" >Roles</option>
                @foreach($roles as $role)
                    <option value="{{$role->id}}" >{{$role->designation}}</option>

                @endforeach

            </select>

            <br>
            <br>
            <div class="ui two fields">


                <div class="field">
                    <!--Modal -->

                    <form class="ui form " method="post" >
                        <div class="ui modal">

                            <div class="header">Modifier les roles</div>
                            <div class="content">
                                <x-role-drop-down/>
                            </div>
                            <div>
                                <button class="ui black button" type="submit">
                                    Modifer
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="ui icon button " id="rolePop">
                        <i class="edit icon"></i>
                    </div>
                </div>
            </div>

            <div class="field">
                <button class="ui    button blue" type="submit">
                    <i class="edit icon"></i>
                    Mettre à jour
                </button>
            </div>
        </div>

    </form>


</div>
@endsection

