<?php
/**
 * ESEOEditWidget class file.
 *
 * @author Dmitry Zasjadko <segoddnja@gmail.com>
 * @link https://github.com/segoddnja/YiiSEOBehavior
 */

/**
 * Widget for adding SEO options to model editing form
 *
 * @version 1.0
 * @package YiiSeoBehavior
 */

class ESEOEditWidget extends CWidget
{       
        //model for editing
        public $model;
        
	public function run()
	{
                $translator = new CPhpMessageSource();
                $translator->basePath = Yii::getPathOfAlias('ext.YiiSEOBehavior.messages');
                $this->render('ESEOEditWidget', array(
                    'model' => $this->model,
                    'translator' => $translator,
                ));
	}
}
?>
