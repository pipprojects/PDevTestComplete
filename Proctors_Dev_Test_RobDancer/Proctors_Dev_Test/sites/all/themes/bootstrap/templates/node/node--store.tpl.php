<?php
?>
<article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
  <?php if ((!$page && !empty($title)) || !empty($title_prefix) || !empty($title_suffix) || $display_submitted): ?>
  <header>
    <?php print render($title_prefix); ?>
    <?php if (!$page && !empty($title)): ?>
    <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
    <?php endif; ?>
    <?php print render($title_suffix); ?>
    <?php if ($display_submitted): ?>
    <span class="submitted">
      <?php print $user_picture; ?>
      <?php print $submitted; ?>
    </span>
    <?php endif; ?>
  </header>
  <?php endif; ?>
  <div class='container'>
  <div class='row'>
      <div class='col-md-4'>
          <div class='row'>
  <span class='store-manager'>
  <?php print render(field_view_field('node', $node, 'field_store_manager', array('label'=>'hidden'))); ?>
  </span>
          </div>
          <div class='row spacer'>
          </div>
          <div class='row'>
  <?php print render(field_view_field('node', $node, 'field_address', array('label'=>'hidden'))); ?>
          </div>
          <div class='row spacer'>
          </div>
          <div class='row'>
              <div id="map"></div>
                  <script>
                    var map;
                    var lat = <?php $lat = field_get_items('node', $node, 'field_latitude'); print $lat[0]['value']; ?>;
                    var lng = <?php $lng = field_get_items('node', $node, 'field_longitude'); print $lng[0]['value']; ?>;
                    function initMap() {
                      var map = new google.maps.Map(document.getElementById('map'), {
                        center: {lat: lat, lng: lng},
                        scrollwheel: false,
                        zoom: 8
                      });
                    }

                  </script>
                  <script src="https://maps.googleapis.com/maps/api/js?callback=initMap" async defer></script>
              </div>

          </div>
      <div class='col-md-4'>
          <table class='table table-striped table-bordered table-condensed text-center'>
              <thead><tr><th class='text-center'>Opening Times</th></tr></thead>
              <tbody><tr><td>
  <?php print render(field_view_field('node', $node, 'field_opening_times', array('label'=>'hidden'))); ?>
</td></tr></tbody>
          </table>
      </div>
  </div>
  </div>
  <?php if (!empty($content['field_tags']) || !empty($content['links'])): ?>
  <footer>
    <?php print render($content['field_tags']); ?>
    <?php print render($content['links']); ?>
  </footer>
  <?php endif; ?>
  <?php print render($content['comments']); ?>
</article>
