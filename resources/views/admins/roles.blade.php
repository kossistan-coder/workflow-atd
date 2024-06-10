@extends('layouts.onboard')
@extends('layouts.message')

@section('content')
    <div class="push">

        <div class="ui modal">
            <div class="header">Nouveau role</div>
            <div class="content">
                <form class="ui form " method="post">
                    @csrf

                        <div class="field">
                            <input type="text" placeholder="Nom" required name="designation">
                        </div>
                    <div class="field">
                        <input type="text" placeholder="Décrire a en une courte phrase les fonctions de ce role" required name="description">
                    </div>

                    <div class="field">
                        <select class="ui fluid search dropdown"  name="niveau">
                            <option value="">Roles</option>
                            @foreach($roles as $role)

                                <option value="{{$role->niveau}}">Niveau de sécurité {{$role->niveau}} : {{$role->description}}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="field">
                        <button class="ui blue button" type="submit">
                            Créer ce role
                        </button>
                    </div>

                </form>
            </div>
        </div>
        <table class="ui compact definition table">
            <thead class="full-width">
            <tr>
                <th></th>
                <th>Label</th>
                <th>Designation</th>
                <th>Description</th>
                <th>Niveau de sécurité</th>
                <th></th>

            </tr>
            </thead>
            <tbody>
            @foreach( $roles as $role)
                <tr>
                    <td class="collapsing">
                        <div class="ui  checkbox">
                            <input type="checkbox"> <label></label>
                        </div>
                    </td>
                    <td>
                        <div class="flex-image">
                            <div
                                class="ui circular
                                @if($role->niveau === 1) green
                                @elseif($role->niveau === 2)
                                    red
                                 @elseif($role->niveau === 4)
                                    black
                                 @endif
                             label">
                                {{$role->designation[0]}}
                            </div>

                        </div>
                    </td>
                    <td>{{$role->designation}}</td>
                    <td>{{$role->description}}</td>
                    <td class="ui label">Niveau {{$role->niveau}}</td>
                    <td>
                        <div class="inline">
                            <a class="ui icon @if($role->id <= 4) disabled  @endif tiny button" href="roles/{{$role->id}}/delete">
                                <i class="trash icon"></i>
                            </a>
                            <a class="ui icon tiny  @if(!\Illuminate\Support\Facades\Auth::guard('admins')->user()->roles->contains('niveau',2)) disabled  @endif blue button" href="/roles/{{$role->id}}/update">

                                <i class="edit icon"></i>
                            </a>
                        </div>
                    </td>
                </tr>
            @endforeach

            </tbody>
            <tfoot class="full-width">
            <tr>
                <th></th>
                <th colspan="4">
                    <div class="ui right floated small primary labeled icon button" id="back-black">
                        <i class="user icon"></i> Ajouter un nouveau role
                    </div>

                </th>
            </tr>

            </tfoot>
        </table>
    </div>
@endsection
