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
        //parent form
        public $form;
        //model for editing
        public $model;
        
	public function run()
	{
                $this->render('ESEOEditWidget', array(
                    'form' => $this->form,
                    'model' => $this->model
                ));
	}
}
?>
