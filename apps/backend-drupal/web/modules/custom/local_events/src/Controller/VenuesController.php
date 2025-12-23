<?php

namespace Drupal\local_events\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\node\Entity\Node;
use Symfony\Component\HttpFoundation\JsonResponse;

class VenuesController extends ControllerBase {

  public function list() {
    $nids = \Drupal::entityQuery('node')
      ->condition('type', 'venue')
      ->condition('status', 1)
      ->accessCheck(TRUE)
      ->execute();

    $items = [];
    if ($nids) {
      foreach (Node::loadMultiple($nids) as $node) {
        $items[] = $node->label();
      }
    }

    return [
      '#theme' => 'item_list',
      '#title' => 'Venues',
      '#items' => $items,
      '#empty' => 'No venues found.',
    ];
  }

  public function api() {
    $nids = \Drupal::entityQuery('node')
      ->condition('type', 'venue')
      ->condition('status', 1)
      ->accessCheck(TRUE)
      ->execute();

    $data = [];
    if ($nids) {
      foreach (Node::loadMultiple($nids) as $node) {
        $data[] = [
          'id' => $node->uuid(),
          'name' => $node->label(),
        ];
      }
    }

    return new JsonResponse($data);
  }
}
