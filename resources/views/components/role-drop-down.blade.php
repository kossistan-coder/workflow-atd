<div>
    <select class="ui fluid search dropdown" multiple="">
        <option value="">Roles</option>
        @foreach($roles as $role)
            <option value="{{$role->id}}">{{$role->designation}}</option>

        @endforeach

    </select>
</div>
