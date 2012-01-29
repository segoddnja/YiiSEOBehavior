<?php

/**
 * ESeoControllerBehavior class file.
 *
 * @author Dmitry Zasjadko <segoddnja@gmail.com>
 * @link https://github.com/segoddnja/YiiSEOBehavior
 */

/**
 * Provides SEO functionality for a controller.
 *
 * @version 1.0
 * @package YiiSeoBehavior
 */
require_once 'models/SeoData.php';

class ESEOControllerBehavior extends CBehavior
{
    public function registerSEO($model)
    {
        $seoData = $model->seoData;
        //if seo data presents for model, then register it for page
        if(!$seoData->isNewRecord)
        {
            $this->owner->setPageTitle(CHtml::encode($seoData->title));
            Yii::app()->clientScript
                    ->registerMetaTag(CHtml::encode($seoData->keywords), 'keywords', 'keywords')
                    ->registerMetaTag(CHtml::encode($seoData->description), 'description', 'description');
        }    
    }
}

?>
