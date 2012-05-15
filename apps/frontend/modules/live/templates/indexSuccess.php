<?php slot('title', 'hf.lan &raquo; Live'); ?>

<div class="page-header">
  <h1>Live</h1>
</div>
<div class="tabbable">
  <ul class="nav nav-tabs">
    <li class="active"><a href="#tab1" data-toggle="tab">Starcraft 2</a></li>
    <li><a href="#tab2" data-toggle="tab">Super Smash Bros Melee</a></li>
    <li><a href="#tab3" data-toggle="tab">League of Legends</a></li>
  </ul>
  <div class="tab-content">
    <div class="tab-pane active" id="tab1">
      <object style="border:none; width:100%; height:490px;"
              type="application/x-shockwave-flash" id="live_embed_player_flash"
              data="http://fr.twitch.tv/widgets/live_embed_player.swf?channel=kdttv_5" bgcolor="#000000">
        <param name="allowFullScreen" value="true"/>
        <param name="allowScriptAccess" value="always"/>
        <param name="allowNetworking" value="all"/>
        <param name="movie" value="http://fr.twitch.tv/widgets/live_embed_player.swf"/>
        <param name="flashvars" value="hostname=fr.twitch.tv&channel=kdttv_5&auto_play=false&start_volume=25"/>
      </object>
    </div>
    <div class="tab-pane" id="tab2">
      <object style="border:none; width:100%; height:490px;"
              type="application/x-shockwave-flash" height="300" width="400" id="live_embed_player_flash"
              data="http://fr.twitch.tv/widgets/live_embed_player.swf?channel=lefrenchmelee" bgcolor="#000000">
        <param name="allowFullScreen" value="true"/>
        <param name="allowScriptAccess" value="always"/>
        <param name="allowNetworking" value="all"/>
        <param name="movie" value="http://fr.twitch.tv/widgets/live_embed_player.swf"/>
        <param name="flashvars" value="hostname=fr.twitch.tv&channel=lefrenchmelee&auto_play=false&start_volume=25"/>
      </object>
    </div>
    <div class="tab-pane" id="tab3">
      <p>Le player n'est pas encore disponible.</p>
    </div>
  </div>
</div>
<hr/>
<?php include_partial("chat/chat"); ?>