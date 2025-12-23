<?php

namespace Drupal\local_events\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\JsonResponse;
use Drupal\node\Entity\Node;

class VenuesController extends ControllerBase {

  public function list() {
    $nids = \Drupal::entityQuery('node')
      ->condition('type', 'venue')
      ->condition('status', 1)
      ->execute();

    $nodes = Node::loadMultiple($nids);

    $venues = [];
    foreach ($nodes as $node) {
      $venues[] = [
        'id' => $node->id(),
        'title' => $node->getTitle(),
        'address' => $node->get('field_address')->value ?? null,
        'capacity' => $node->get('field_capacity')->value ?? null,
      ];
    }

    return new JsonResponse(['data' => $venues]);
  }

}
