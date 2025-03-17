<?php

namespace Drupal\mmej_custom_field\Plugin\Field\FieldWidget;

use Drupal;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Plugin implementation of the 'TypeClientWidget' widget.
 *
 * @FieldWidget(
 *   id = "TypeClientWidget",
 *   label = @Translation("Type client select"),
 *   field_types = {
 *     "type_client"
 *   }
 * )
 */
class TypeClientWidget extends WidgetBase {

  /**
   * Define the form for the field type.
   */
  public function formElement(
    FieldItemListInterface $items,
    $delta, 
    Array $element, 
    Array &$form, 
    FormStateInterface $formState
  ) {

    $element += array(
      '#type' => 'fieldset',
    );

    $element['client'] = [
      '#type' => 'entity_autocomplete',
      '#title' => t('client'),
      '#target_type' => 'user',
      '#default_value' => isset($items[$delta]->client) ? \Drupal\user\Entity\User::load($items[$delta]->client) : NULL,
      '#placeholder' => t('client'),
    ];

    $element['type'] = [
      '#type' => 'select',
      '#title' => t('Type de Client'),
      '#options' => [
        'standard' => 'Standard',
        'premium' => 'Premium',
        'vip' => 'VIP',
      ],
      '#default_value' => $items[$delta]->type ?? 'standard',
    ];

    return $element;
  }
}
