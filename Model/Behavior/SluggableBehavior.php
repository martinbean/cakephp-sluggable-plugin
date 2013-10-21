<?php
class SluggableBehavior extends ModelBehavior {
    
    public function setup(Model $Model, $settings = array()) {
        if (!isset($this->settings[$Model->alias])) {
            $this->settings[$Model->alias] = array(
                'titleColumn' => 'title',
                'slugColumn' => 'slug',
                'replacement' => '-'
            );
        }
        $this->settings[$Model->alias] = array_merge($this->settings[$Model->alias], $settings);
    }
    
    public function beforeSave(Model $Model, $options = array()) {
        $titleColumn = $this->settings[$Model->alias]['titleColumn'];
        $slugColumn = $this->settings[$Model->alias]['slugColumn'];
        $replacement = $this->settings[$Model->alias]['replacement'];
        
        if (isset($Model->data[$Model->alias][$titleColumn])) {
            $Model->data[$Model->alias][$slugColumn] = Inflector::slug(strtolower($Model->data[$Model->alias][$titleColumn]), $replacement);
        }
        return true;
    }
}