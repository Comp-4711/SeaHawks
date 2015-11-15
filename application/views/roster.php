<a id="button" title="button" class="btn btn-default" href="/player/editmode">{editmode}</a>
{addbutton}
Sort By
<form action="/player/ordertype" method="post">
    <select name="ordertype">
        <option value="1">Name</option>
        <option value="2">Position</option>
        <option value="3">Jersey Number</option>
    </select>
    <select name="layout">
        <option value="1">Gallery</option>
        <option value="2">Table</option>
    </select>
    <input type="submit" value="Go" />
</form>
{thetable}
{links}
<script>
$('[name=ordertype]').val('{ordertype}');
$('[name=layout]').val('{layout}');
</script>
