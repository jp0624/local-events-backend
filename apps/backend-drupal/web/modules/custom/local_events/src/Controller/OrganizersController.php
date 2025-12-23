<?php

namespace Drupal\local_events\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\JsonResponse;
use Drupal\node\Entity\Node;

class OrganizersController extends ControllerBase {

  public function list() {
    $nids = \Drupal::entityQuery('node')
      ->condition('type', 'organizer')
      ->condition('status', 1)
      ->execute();

    $nodes = Node::loadMultiple($nids);

    $organizers = [];
    foreach ($nodes as $node) {
      $organizers[] = [
        'id' => $node->id(),
        'title' => $node->getTitle(),
        'email' => $node->get('field_email')->value ?? null,
        'phone' => $node->get('field_phone')->value ?? null,
      ];
    }

    return new JsonResponse(['data' => $organizers]);
  }

}
