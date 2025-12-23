<?php

namespace Drupal\local_events\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\JsonResponse;
use Drupal\node\Entity\Node;

/**
 * Controller for local events API.
 */
class LocalEventsController extends ControllerBase {

  public function venues() {
    $nodes = \Drupal::entityTypeManager()->getStorage('node')->loadByProperties(['type' => 'venue']);
    $data = [];

    foreach ($nodes as $node) {
      $data[] = [
        'id' => $node->id(),
        'title' => $node->getTitle(),
        'address' => $node->get('field_address')->value ?? '',
        'capacity' => $node->get('field_capacity')->value ?? '',
        'website' => $node->get('field_website')->uri ?? '',
      ];
    }

    return new JsonResponse($data);
  }

  public function organizers() {
    $nodes = \Drupal::entityTypeManager()->getStorage('node')->loadByProperties(['type' => 'organizer']);
    $data = [];

    foreach ($nodes as $node) {
      $data[] = [
        'id' => $node->id(),
        'title' => $node->getTitle(),
        'email' => $node->get('field_email')->value ?? '',
        'phone' => $node->get('field_phone')->value ?? '',
        'website' => $node->get('field_website')->uri ?? '',
      ];
    }

    return new JsonResponse($data);
  }

}
