<div class="container rounded-header" style="width: 80%; background:#0e0e52"> 
<h1 style="color:#fff; font-weight: 100;">Edit Player</h1>
</div>
<div class="container rounded under-header" style="width: 80%;">
<form method="Post" action="/player/edit_confirm" name="editForm" enctype="multipart/form-data" style="margin-top:20px;">
    <div class="form-group" style="width:30%">
    <label for="first">First Name</label>
        <input id="first" type="text" name="firstname" class="form-control" value="{first_name}"/>
    </div>
    <div class="form-group" style="width:30%">
        <label for="last">Last Name</label>
        <input id="last" type="text" name="lastname" class="form-control" value="{last_name}"/>
    </div>
    <div class="form-group" style="width:30%">
        <label for="jersey">Jersey Number</label>
        <input id="jersey" type="number" name="jerseyNumber" class="form-control" value="{jersey}"/>
    </div>
    <div class="form-group" style="width:30%">
        <label for="position">Position</label>
        <select name="position" class="form-control" id="position">
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
    </div>
    <div class="form-group">
    <label for="description">Description</label>
    <textarea id="description" type="text" name="description" class="form-control" rows="5">{description}</textarea>
    </div>
    
    <div class="form-group">
    <input type="file" name="userfile" class="form-control" />
    <input type="hidden" name="player_num" value="{player_num}" />
    </div>
    
    
    <div class="form-group">
        <input type="submit" class="btn btn-default" />
        <a href="/player/cancel/" class="btn btn-default">Cancel</a>
        <a href="/player/delete/{player_num}" class="btn btn-default">Delete</a>
    </div>

<script>
$('#position').val('{position}');
</script>
</div>