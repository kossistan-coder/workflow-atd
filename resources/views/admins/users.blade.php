@extends('layouts.onboard')
@extends('layouts.message')

@section('content')

        <div class="push" >
            <div class="ui modal">
                <div class="header">Créer un admin</div>
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
                       <div class="field">
                           <select class="ui fluid search dropdown" multiple="" name="roles[]">
                               <option value="">Roles</option>
                                @foreach($roles as $role)
                                    <option value="{{$role->id}}">{{$role->designation}}</option>
                                @endforeach

                           </select>
                       </div>
                       <div>
                           <button type="submit" class="ui blue button">
                               <i class="icon edit"></i>
                               Ajouter cet admin
                           </button>
                       </div>

                   </form>
                </div>
            </div>
            <div class="flex-card-2" >
                <div class="text-bold f-16">Administrateurs</div>
                <div>


                    <div class="ui  button" style="margin-bottom: 10px;" id="back-black" >
                        Ajouter un admin
                    </div>
                </div>
            </div>
            <div>
                <table class="ui compact definition table">
                    <thead class="full-width">
                    <tr>
                        <th></th>
                        <th>Label</th>
                        <th>Nom</th>
                        <th>E-mail </th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach( $admins as $admin)
                        <tr>
                            <td class="collapsing">
                                <div class="ui  checkbox">
                                    <input type="checkbox"> <label></label>
                                </div>
                            </td>
                            <td>
                                <div class="flex-image">
                                    <div class="ui circular label blue">
                                        {{strtoupper($admin->nom[0])}}
                                    </div>

                                </div>
                            </td>
                            <td>{{$admin->nom}}</td>
                            <td>{{$admin->email}}</td>
                            <td>
                                <a href="admins/{{$admin->id}}/details">
                                    Details
                                </a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
{{--                    <tfoot class="full-width">--}}
{{--                    <tr>--}}
{{--                        <th></th>--}}
{{--                        <th colspan="4">--}}
{{--                            <div class="ui right floated small primary labeled icon button">--}}
{{--                                <i class="user icon"></i> Add User--}}
{{--                            </div>--}}
{{--                            <div class="ui small  button">--}}
{{--                                Approve--}}
{{--                            </div>--}}
{{--                            <div class="ui small  disabled button">--}}
{{--                                Approve All--}}
{{--                            </div>--}}
{{--                        </th>--}}
{{--                    </tr>--}}
{{--                    <tr><th colspan="5">--}}
{{--                            <div class="ui right floated pagination menu">--}}
{{--                                <a class="icon item">--}}
{{--                                    <i class="left chevron icon"></i>--}}
{{--                                </a>--}}
{{--                                <a class="item">1</a>--}}
{{--                                <a class="item">2</a>--}}
{{--                                <a class="item">3</a>--}}
{{--                                <a class="item">4</a>--}}
{{--                                <a class="icon item">--}}
{{--                                    <i class="right chevron icon"></i>--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                        </th>--}}
{{--                    </tr>--}}
{{--                    </tfoot>--}}
                </table>
            </div>
        </div>



@endsection
