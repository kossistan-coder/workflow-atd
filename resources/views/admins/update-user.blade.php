@extends('layouts.onboard')
@extends('layouts.message')

@section('content')

    <div class="push">
        <div class="ui centered grid">
          <div class="ui ten wide column">
              <form class="ui form" method="post">
                  @csrf


                  <div class="ui segment">
                      <div class="field">

                          <div class="two fields">
                              <div class="field">
                                  <label>Nom</label>
                                  <input type="text" name="nom" placeholder="{{$user->nom}}" >
                              </div>
                              <div class="field">
                                  <label>Prenom</label>
                                  <input type="text" name="prenom" placeholder="{{$user->prenom}}">
                              </div>
                          </div>
                      </div>
                      <div class="field">
                          <div class="fields">
                              <div class="twelve wide field">
                                  <label>Nom</label>
                                  <input type="email" name="email" placeholder="{{$user->email}}">
                              </div>
                              <div class="four wide field">
                                  <div class="field">
                                      <label>Nom</label>
                                      <input type="number" name="telephone" placeholder="{{$user->telephone}}">
                                  </div>
                              </div>
                          </div>
                      </div>



                      <br>
                      <br>
                      <div class="ui two fields">


                          <div class="field">
                              <button class="ui   button blue" type="submit">
                                  <i class="edit icon"></i>
                                  Mettre à jour
                              </button>
                          </div>
                      </div>
                  </div>
              </form>
          </div>
        </div>

    </div>

@endsection
