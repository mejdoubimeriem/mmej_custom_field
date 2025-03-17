<?php

namespace Drupal\mmej_custom_field\Plugin\Field\FieldType;

use Drupal\Core\Field\FieldItemBase;
use Drupal\Core\TypedData\DataDefinition;
use Drupal\Core\Field\FieldStorageDefinitionInterface as StorageDefinition;

/**
 * Plugin implementation of the 'type_client' field type.
 *
 * @FieldType(
 *   id = "type_client",
 *   label = @Translation("Type client"),
 *   description = @Translation("Type client."),
 *   category = @Translation("Custom"),
 *   default_widget = "TypeClientWidget",
 *   default_formatter = "TypeClientFormatter"
 * )
 */
class TypeClientItem extends FieldItemBase {

  /**
   * Field type properties definition.
   */
  public static function propertyDefinitions(StorageDefinition $storage) {

    $properties = [];

    $properties['client'] =   DataDefinition::create('integer')
    ->setLabel(t('Client'));

    $properties['type'] = DataDefinition::create('string')
      ->setDescription(t('Le type du client (Standard, Premium, VIP).'));

    return $properties;
  }

  /**
   * Field type schema definition.
   */
  public static function schema(StorageDefinition $storage) {

    $columns = [];
    $columns['client'] =  [
      'type' => 'int',
      'unsigned' => TRUE,
      'not null' => FALSE,
    ];
    $columns['type'] = [
      'type' => 'varchar',
      'length' => 255,
    ];

    return [
      'columns' => $columns,
      'indexes' => [],
    ];
  }

  /**
   * Define when the field type is empty. 
   */
  public function isEmpty() {

    $isEmpty = 
      empty($this->get('client')->getValue()) &&
      empty($this->get('type')->getValue());

    return $isEmpty;
  }

} // class
