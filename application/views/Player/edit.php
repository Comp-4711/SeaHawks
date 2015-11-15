<h1>Edit Player</h1>

<form method="Post" action="/player/edit_confirm" name="editForm" enctype="multipart/form-data">
    <label>First Name
        <input type="text" name="firstname" class="form-group" value="{first_name}"/>
    </label>
    <label>Last Name
        <input type="text" name="lastname" class="form-group" value="{last_name}"/>
    </label>
    <label>Jersey Number
        <input type="number" name="jerseyNumber" class="form-group"  value="{jersey}"/>
    </label>
    <label>Position
        <select name="position" class="form-group" id="position">
            <option value="Quarterback">Quarterback</option>
            <option value="Punter">Punter</option>
            <option value="Wide receiver">Wide receiver</option>
            <option value="Running back">Running back</option>
            <option value="Cornerback">Cornerback</option>
            <option value="Free safety">Free safety</option>
            <option value="Strong safety">Strong safety</option>
            <option value="Fullback">Fullback</option>
            <option value="Outside Linebacker">Outside Linebacker</option>
            <option value="Middle Linebacker">Middle Linebacker</option>
            <option value="Defensive end">Defensive end</option>
            <option value="Guard Tackle">Guard Tackle</option>
            <option value="Tight end">Tight end</option>
        </select>
    </label>
<label>Description
<textarea type="text" name="description" class="form-control" cols="40" rows="5">
{description}
</textarea>
</label>

    <input type="file" name="userfile" class="form-group" />
    <input type="hidden" name="player_num" value="{player_num}" />
    <div class="row">
        <input type="submit" class="btn btn-large btn-success" />
        <a href="/player/cancel/" class="btn btn-large btn-primary">Cancel</a>
        <a href="/player/delete/{player_num}" class="btn btn-large btn-danger">Delete</a>
    </div>

</form>
<script>
$('#position').val('{position}');
</script>
