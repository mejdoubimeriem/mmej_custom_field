<?php

namespace Drupal\mmej_custom_field\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;
use Drupal;

/**
 * Plugin implementation of the 'TypeClientFormatter' formatter.
 *
 * @FieldFormatter(
 *   id = "TypeClientFormatter",
 *   label = @Translation("type_client Formatter"),
 *   field_types = {
 *     "type_client"
 *   }
 * )
 */
class TypeClientFormatter extends FormatterBase {

  /**
   * Define how the field type is showed.
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {

    $elements = [];
    foreach ($items as $delta => $item) {

      $user = \Drupal\user\Entity\User::load($item->client);
      $user_name = $user ? $user->getDisplayName() : t('Non défini');

      $elements[$delta] = [
        '#type' => 'markup',
        '#markup' => $user_name . ' ( ' . $item->type . ' ) '
      ];
    }

    return $elements;
  }
  
}
