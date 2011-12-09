<?php

/**
 * ESeoModelBehavior class file.
 *
 * @author Dmitry Zasjadko <segoddnja@gmail.com>
 * @link https://github.com/segoddnja/YiiSEOBehavior
 */

/**
 * Provides SEO functionality for a model.
 *
 * @version 1.0
 * @package YiiSeoBehavior
 */
Yii::import('ext.YiiSEOBehavior.models.*');

class ESEOModelBehavior extends CActiveRecordBehavior
{
    public function afterSave($event) 
    {
        $ownerPK = $this->getOwnerPK();
        $ownerClass = get_class($this->owner);
        //gets SEO data for owner model
        $seoData = SeoData::model()->findByPk(array(
            'model_name' => $ownerClass,
            'model_id' => $ownerPK
        ));
        //if no SEO data, then create new record
        if(!$seoData)
        {
            $seoData = new SeoData();
            $seoData->setAttributes(array(
                'model_name' => $ownerClass,
                'model_id' => $ownerPK
            ));
        }
        $seoData->save();
        return parent::afterSave($event);
    }
    
    /*
     * Return owner model PK, converted to string
     * @return String
     */
    private function getOwnerPK(){
        if(is_array($this->owner->primaryKey))
            return implode ('.', $this->owner->primaryKey);
        else
            return $this->owner->primaryKey;
    }
}

?>
