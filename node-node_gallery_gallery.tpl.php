<?php
// $Id: node.tpl.php,v 1.1.2.3 2010/01/11 00:08:12 sociotech Exp $
?>
<div id="node-<?php print $node->nid; ?>" class="node <?php print $node_classes; ?>">
  <div class="inner">
    <?php print $picture ?>

    <?php if ($page == 0): ?>
    <?php endif; ?>

    <?php if ($page == 1) { ?>
    <div class="content clearfix">
      <?php print $content ?>
    </div>
    <?php } else { ?>
    <div class="content clearfix">
      <?php $gallery_cover = $node->content['gallery']['#value']; ?>
      <?php $redacted_content = str_replace($gallery_cover, '', $content); ?>
      <?php print $gallery_cover; ?> 
      <div class="gallery-body-content">
        <?php print '<h2 class="title"><a href="' . $node_url . '" title="' . $title . '">' . $title . '</a></h2>'; ?>
        <?php  print $redacted_content; ?>
      </div>
    </div>
    <?php } ?>


    <?php if ($links): ?>
    <div class="links">
      <?php print $links; ?>
    </div>
    <?php endif; ?>
  </div><!-- /inner -->

</div><!-- /node-<?php print $node->nid; ?> -->
