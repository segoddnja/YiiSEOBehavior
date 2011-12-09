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

class ESEOModelBehavior extends CActiveRecordBehavior
{
    /**
     * @var SeoData seo data for current owner
     */
    private $_seoData;
    
    public function afterSave($event) 
    {
        if(isset($_POST['SeoData']))
        {
            $this->seoData->attributes = $_POST['SeoData'];
        }
        if($this->seoData->title || $this->seoData->keywords || $this->seoData->description)
            $this->seoData->save();
        else 
            $this->seoData->delete();
        return parent::afterSave($event);
    }
    
    /*
     * return SeoData model for current owner
     * @return SeoData
     */
    public function getSeoData()
    {
        $class=new ReflectionClass('ESEOModelBehavior');
        Yii::setPathOfAlias('YiiSEOBehavior.models', dirname($class->getFileName()).DIRECTORY_SEPARATOR.'models'.DIRECTORY_SEPARATOR);
        Yii::import('YiiSEOBehavior.models');
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
