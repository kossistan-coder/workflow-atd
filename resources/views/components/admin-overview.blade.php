<div>
    <div>
        <div class="ui segment">
            <div>
                @foreach($admins as $admin)
                    <div class="flex-card-around">
                        <div>
                            <div class="ui blue label circular">
                                {{strtoupper($admin->nom[0])}}
                            </div>
                        </div>
                        <div>
                            <span class="text-bold">{{$admin->nom}}</span>
                            <div class="text-grey">{{$admin->email}}</div>
                        </div>
                    </div>
                    <div class="ui divider"></div>
                @endforeach
            </div>
            <div class="flex-card-around">
                <a class="ui label" href="{{route('admins')}}">
                    Voir tous les admins
                </a>
            </div>


        </div>
    </div>
</div>
