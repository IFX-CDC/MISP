<td class="shortish">
  <span id="sightingForm_<?php echo h($object['id']);?>">
  <?php
      echo $this->Form->create('Sighting', array('id' => 'Sighting_' . $object['id'], 'url' => '/sightings/add/' . $object['id'], 'style' => 'display:none;'));
      echo $this->Form->input('type', array('label' => false, 'id' => 'Sighting_' . $object['id'] . '_type'));
      echo $this->Form->end();
  ?>
  </span>
  <?php
    if ($isAclAdd):
  ?>
      <span class="icon-thumbs-up useCursorPointer" title="<?php echo __('Add sighting');?>" role="button" tabindex="0" aria-label="<?php echo __('Add sighting');?>" onClick="addSighting('0', '<?php echo h($object['id']); ?>', '<?php echo h($event['Event']['id']);?>', '<?php echo h($page); ?>');">&nbsp;</span>
      <span class="icon-thumbs-down useCursorPointer" title="<?php echo __('Mark as false-positive');?>" role="button" tabindex="0" aria-label="<?php echo __('Mark as false-positive');?>" onClick="addSighting('1', '<?php echo h($object['id']); ?>', '<?php echo h($event['Event']['id']);?>', '<?php echo h($page); ?>');">&nbsp;</span>
      <span class="icon-wrench useCursorPointer sightings_advanced_add" title="<?php echo __('Advanced sightings');?>" role="button" tabindex="0" aria-label="<?php echo __('Advanced sightings');?>" data-object-id="<?php echo h($object['id']); ?>" data-object-context="attribute">&nbsp;</span>
  <?php
    endif;
  ?>
  <span id="sightingCount_<?php echo h($object['id']); ?>" class="bold sightingsCounter_<?php echo h($object['id']); ?>" data-placement="top" data-toggle="popover" data-trigger="hover" data-content="<?php echo isset($sightingsData['data'][$object['id']]['html']) ? $sightingsData['data'][$object['id']]['html'] : ''; ?>">
    <?php
      $s = (!empty($sightingsData['data'][$object['id']]['sighting']['count']) ? $sightingsData['data'][$object['id']]['sighting']['count'] : 0);
      $f = (!empty($sightingsData['data'][$object['id']]['false-positive']['count']) ? $sightingsData['data'][$object['id']]['false-positive']['count'] : 0);
      $e = (!empty($sightingsData['data'][$object['id']]['expiration']['count']) ? $sightingsData['data'][$object['id']]['expiration']['count'] : 0);
    ?>
  </span>
  <span id="ownSightingCount_<?php echo h($object['id']); ?>" class="bold sightingsCounter_<?php echo h($object['id']); ?>" data-placement="top" data-toggle="popover" data-trigger="hover" data-content="<?php echo isset($sightingsData['data'][$object['id']]['html']) ? $sightingsData['data'][$object['id']]['html'] : ''; ?>">
    <?php echo '(<span class="green">' . h($s) . '</span>/<span class="red">' . h($f) . '</span>/<span class="orange">' . h($e) . '</span>)'; ?>
  </span>
</td>
<td class="short">
  <?php
    if (!empty($sightingsData['csv'][$object['id']])) {
      echo $this->element('sparkline', array('id' => $object['id'], 'csv' => $sightingsData['csv'][$object['id']]));
    }
  ?>
</td>
