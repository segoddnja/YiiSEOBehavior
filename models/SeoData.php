<?php

/**
 * SeoData class file.
 *
 * @author Dmitry Zasjadko <segoddnja@gmail.com>
 * @link https://github.com/segoddnja/YiiSEOBehavior
 */

/**
 * Model, representing SEO data
 *
 * @version 1.0
 * @package YiiSeoBehavior
 */

/**
 *
 * The followings are the available columns in table 'seo_data':
 * @property string $model_name
 * @property integer $model_id
 * @property string $title
 * @property string $keywords
 * @property string $description
 */
class SeoData extends CActiveRecord
{
        private $_translator;
        
	/**
	 * Returns the static model of the specified AR class.
	 * @return SeoData the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'seo_data';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('model_name, model_id', 'required'),
			array('model_id', 'numerical', 'integerOnly'=>true),
			array('model_name', 'length', 'max'=>50),
			array('title, keywords, description', 'safe'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'title' => $this->translator->translate('seo', 'Page title'),
			'keywords' => $this->translator->translate('seo', 'Page meta keywords'),
			'description' => $this->translator->translate('seo', 'Page meta description'),
		);
	}
        
        /**
	 * @return CPhpMessageSource
	 */
        public function getTranslator()
        {
            if(!$this->_translator)
            {
                $this->_translator = new CPhpMessageSource();
                $this->_translator->basePath = Yii::getPathOfAlias('ext.YiiSEOBehavior.messages');
            }
            return $this->_translator;
        }
}