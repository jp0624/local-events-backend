<?php

namespace Drupal\local_events\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\node\Entity\Node;
use Symfony\Component\HttpFoundation\JsonResponse;

class EventsController extends ControllerBase {

  /**
   * Human dashboard page
   */
  public function dashboard() {
    $nids = \Drupal::entityQuery('node')
      ->condition('type', 'event')
      ->condition('status', 1)
      ->sort('created', 'DESC')
      ->accessCheck(TRUE)
      ->execute();

    $items = [];
    if ($nids) {
      foreach (Node::loadMultiple($nids) as $node) {
        $items[] = $node->toLink();
      }
    }

    return [
      '#type' => 'container',
      'title' => [
        '#markup' => '<h2>Events</h2>',
      ],
      'events' => [
        '#theme' => 'item_list',
        '#items' => $items,
        '#empty' => 'No events found.',
      ],
      'links' => [
        '#markup' => '
          <hr>
          <p>
            <a href="/local-events/venues">View Venues</a><br>
            <a href="/local-events/organizers">View Organizers</a>
          </p>',
      ],
    ];
  }

  /**
   * JSON API endpoint
   */
  public function api() {
    $nids = \Drupal::entityQuery('node')
      ->condition('type', 'event')
      ->condition('status', 1)
      ->accessCheck(TRUE)
      ->execute();

    $data = [];

    if ($nids) {
      foreach (Node::loadMultiple($nids) as $node) {
        $data[] = [
          'id' => $node->uuid(),
          'title' => $node->label(),
        ];
      }
    }

    return new JsonResponse($data);
  }
}
