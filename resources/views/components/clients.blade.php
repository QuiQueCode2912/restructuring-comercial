<?php $clients = json_decode(html_entity_decode($clients)) ?>
<?php if ($clients) : ?>
<div class="clients">
  <div class="container featured" style="margin-bottom:0">
    <div class="row">
      <div class="col-12">
        <h4>Empresas que confían en la Ciudad del Saber</h4>
      </div>
    </div>
    <div class="row justify-content-center" style="margin-top:10px">
      <?php foreach ($clients as $client) : ?>
      <div class="col-6 col-md-2">
        <a href="<?php echo $client->url ?>" target="_blank" title="<?php echo $client->name ?>">
          <img src="<?php echo $client->logo ?>" />
        </a>
      </div>        
      <?php endforeach ?>
    </div>
  </div>
</div>
<?php endif ?>