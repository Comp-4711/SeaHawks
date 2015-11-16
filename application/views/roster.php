<a id="buttonEdit" title="button" class="btn btn-default" href="/player/editmode">{editmode}</a>
{addbutton}
<form action="/player/ordertype" method="post" >
    <select name="ordertype" class="form-control roster-select">
        <option value="1">Name</option>
        <option value="2">Position</option>
        <option value="3">Jersey Number</option>
    </select>
    <select name="layout" class="form-control roster-select">
        <option value="1">Gallery</option>
        <option value="2">Table</option>
    </select>
    <input class= "btn btn-default" type="submit" value="Go" />
</form>
{thetable}

{links}
<script>
$('[name=ordertype]').val('{ordertype}');
$('[name=layout]').val('{layout}');
</script>
