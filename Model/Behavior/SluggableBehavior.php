<?php
class SluggableBehavior extends ModelBehavior {
    
    public function setup(Model $Model, $settings = array()) {
        if (!isset($this->settings[$Model->alias])) {
            $this->settings[$Model->alias] = array(
                'slugColumn' => 'slug'
            );
        }
        $this->settings[$Model->alias] = array_merge($this->settings[$Model->alias], $settings);
    }
    
    public function beforeSave(Model $Model, $options = array()) {
        $displayField = $Model->displayField;
        $slugColumn = $this->settings[$Model->alias]['slugColumn'];
        
        if (isset($Model->data[$Model->alias][$displayField])) {
            $Model->data[$Model->alias][$slugColumn] = Inflector::slug(strtolower($Model->data[$Model->alias][$displayField]), '-');
        }
        return true;
    }
}