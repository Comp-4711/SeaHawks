<div class="container rounded-header" style="background:#0e0e52">
    <h2 class="section-heading" style="margin:20px 0; margin-left:20px;color:#fff;font-weight:lighter;">Game Forecast</h2>
    <span style="margin-left: 25px; width: auto;" class="form-control roster-select">Seattle Seahawks</span>
    <span style="color:white; margin-left: 10px; font-size: 1.5em; font-weight: 300;">vs</span>
    <select style="margin:0 10px 0 10px; width: auto;" class="form-control roster-select" id="selectOpponent">
        {teamList}
        <option value="{code}">{name}</option>
        {/teamList}
    </select>
    <button class="btn btn-default" id="buttonPredict">Predict</button>
</div>
<div style="margin-bottom: 50px;" id="divPredict" class="container rounded under-header">
</div>


<div class="container rounded-header" style="background:#0e0e52">
<h1 class="section-heading" style="margin:20px 0; margin-left:20px;color:#fff;font-weight:lighter;">Seatle Seahawks</h1>
</div>

<div class="container rounded under-header">

    <p class="lead section-lead"><i>"You know what they say about men with big shoes"</i>
        <span style="font-size:.2em;margin-left:400px;"><br>- Jim Perry</span></p>
    
    <p class="section-paragraph">
    The Seattle Seahawks are a professional American football franchise based in Seattle, Washington.
    They are members of the West division of the National Football Conference (NFC) in the National
    Football League (NFL). The Seahawks joined the NFL in 1976 as an expansion team along with the Tampa
    Bay Buccaneers. The Seahawks are owned by Microsoft co-founder Paul Allen and are currently coached by
    Pete Carroll. Since 2002, the Seahawks have played their home games at CenturyLink Field (formerly Qwest Field)
    , located south of downtown Seattle. The Seahawks previously played home games in the Kingdome (1976-1999) and
    Husky Stadium (1994, 2000-2001).
    The Seahawks are the only NFL franchise based in the Pacific Northwest region of North America and thus attract
    support from a wide geographical area, including Oregon, Montana, Idaho, and Alaska, as well as Canadian fans in British Columbia and Alberta.[5]
    </p
</div>


<script>
    $(document).ready(function() {
        $('#buttonPredict').click(function () {

            var opponent = $('#selectOpponent').val();
            console.log(opponent);
            var opponentTeam = $('#selectOpponent option:selected').text();
            console.log(opponentTeam);
            $.ajax({
                type: "POST",
                url: '<?php echo site_url('welcome/predict/'); ?>',
                data: {'opponent': opponent, 'opponentTeam' : opponentTeam},
                success: function(response)
                {
                    $('#divPredict').html(response);
                },
                error: function(err) {
                    console.log(err);

                }
            });
        });
    });
</script>

