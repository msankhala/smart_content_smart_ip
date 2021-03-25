<?php

namespace Drupal\smart_content_smart_ip\EventSubscriber;

use Drupal\smart_content\Event\AttachDecisionSettingsEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Define AttachDecisionSettingsEventSubscriber.
 */
class AttachDecisionSettingsEventSubscriber implements EventSubscriberInterface {

  /**
   * Reacts to config event.
   *
   * @param \Drupal\smart_content\Event\AttachDecisionSettingsEvent $event
   *   The attach decision setting event.
   */
  public function onAttachDecisionSettings(AttachDecisionSettingsEvent $event) {
      // $test = $event;
  }

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() {
    $events[AttachDecisionSettingsEvent::EVENT_NAME][] = ['onAttachDecisionSettings'];
    return $events;
  }

}
