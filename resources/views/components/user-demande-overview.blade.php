<div>
    <table class="ui single raised segment line table">
        <thead>
        <tr>
            <th>Nom</th>
            <th>Label</th>
            <th>Demande</th>
            <th></th>
        </tr>
        </thead>
        <tbody>

        @foreach($users as $user)
            <tr>
                <td>{{$user->nom}}</td>
                <td>
                    <div class="flex-image">
                        <div class="ui purple label circular">
                            {{strtoupper($user->nom[0])}}
                        </div>
                    </div>
                </td>
                <td>
                    <a class="ui circular label" id="back-red-base">
                        +{{count($user->demandes)}}
                    </a>
                </td>
                <td>
                    <a >Details</a>
                </td>
            </tr>
        @endforeach


        </tbody>
        <tfoot>
        <tr><th colspan="5">
               <a class="ui label " href="">
                   voir tous les demandes
               </a>
            </th>
        </tr></tfoot>
    </table>
</div>
