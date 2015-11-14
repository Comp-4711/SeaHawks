<h1>Edit Player</h1>

<form type="Post" method="./" enctype="multipart/form-data">
    <label>Player Name
        <input type="text" name="playerName" class="form-group" />
    </label>
    <label>Jersey Number
        <input type="number" name="jerseyNumber" class="form-group"/>
    </label>
    <label>Position
        <select name="position" class="form-group">
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

        <input type="number" name="jerseyNumber" class="form-group"/>
    </label>
    <div class="row">
        <a href="/player/edit_confirm/{player_num}" class="btn btn-large btn-success">Save</a>
        <a href="/player/cancel/{order_num}" class="btn btn-large btn-primary">Cancel</a>
        <a href="/player/delete/{order_num}" class="btn btn-large btn-danger">Delete</a>
    </div>

</form>