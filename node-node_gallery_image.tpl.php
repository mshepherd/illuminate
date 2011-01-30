<?php
// $Id: node.tpl.php,v 1.1.2.3 2010/01/11 00:08:12 sociotech Exp $
?>

<div id="node-<?php print $node->nid; ?>" class="node <?php print $node_classes; ?>">
  <div class="inner">
    <?php print $picture ?>

    <?php print $node->content['image_navigator']['#value']; ?>

    <div class="image-body-content">
      <h1 class="title"><?php print $title ?></h1>
      <div class="content clearfix">

        <?php $image_node_object = $node->content['field_node_gallery_image']['field']['items']['0']['#node']; ?>
        <?php print $image_node_object->field_node_gallery_image['0']['view']; ?>
        <?php print $node->content['body']['#value']; ?>

      </div>
    </div>

    <?php if ($terms): ?>
    <div class="terms">
      <?php print $terms; ?>
    </div>
    <?php endif;?>

    <?php if ($links): ?>
    <div class="links">
      <?php print $links; ?>
    </div>
    <?php endif; ?>
  </div><!-- /inner -->

  <?php if ($node_bottom && !$teaser): ?>
  <div id="node-bottom" class="node-bottom row nested">
    <div id="node-bottom-inner" class="node-bottom-inner inner">
      <?php print $node_bottom; ?>
    </div><!-- /node-bottom-inner -->
  </div><!-- /node-bottom -->
  <?php endif; ?>
</div><!-- /node-<?php print $node->nid; ?> -->
