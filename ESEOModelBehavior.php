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
    //seo data for current owner
    private $_seoData;
    
    public function afterSave($event) 
    {
        $this->_seoData->save();
        return parent::afterSave($event);
    }
    
    /*
     * return SeoData model for current owner
     * @return SeoData
     */
    public function getSeoData()
    {
        if(!$this->_seoData)
        {
            $ownerPK = $this->getOwnerPK();
            $ownerClass = get_class($this->owner);
            //gets SEO data for owner model
            $this->_seoData = SeoData::model()->findByPk(array(
                'model_name' => $ownerClass,
                'model_id' => $ownerPK
            ));
            //if no SEO data, then create new record
            if(!$this->_seoData)
            {
                $this->_seoData = new SeoData();
                $this->_seoData->setAttributes(array(
                    'model_name' => $ownerClass,
                    'model_id' => $ownerPK
                ));
            }
        }
        return $this->_seoData;
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
