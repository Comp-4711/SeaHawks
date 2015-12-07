<form action="/league/ordertype" method="post" >
    <select name="ordertype" class="form-control roster-select">
        <option value="1">City</option>
        <option value="2">Team</option>
        <option value="3">Standing</option>
    </select>
    <select name="layout" class="form-control roster-select">
        <option value="1">League</option>
        <option value="2">Conference</option>
        <option value="3">Division</option>
    </select>
    <input class= "btn btn-default" type="submit" value="Go" />
</form>
{thetable}
<script>
$('[name=ordertype]').val('{ordertype}');
$('[name=layout]').val('{layout}');
</script>
