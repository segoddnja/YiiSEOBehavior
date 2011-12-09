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
Yii::import('ext.YiiSEOBehavior.models.*');

class ESEOControllerBehavior extends CBehavior
{
    public function registerSEO($model)
    {
        $seoData = $model->seoData;
        //if seo data presents for model, then register it for page
        if(!$seoData->isNewRecord)
        {
            $this->owner->setPageTitle($seoData->title);
            Yii::app()->clientScript
                    ->registerMetaTag($seoData->keywords, 'keywords', 'keywords')
                    ->registerMetaTag($seoData->description, 'description', 'description');
        }    
    }
}

?>
