<?php

/**
 * BaseArticle
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $category_id
 * @property string $image
 * @property string $url
 * @property string $title
 * @property string $content
 * @property boolean $is_shown
 * @property string $email
 * @property Category $Category
 * 
 * @method integer  getCategoryId()  Returns the current record's "category_id" value
 * @method string   getImage()       Returns the current record's "image" value
 * @method string   getUrl()         Returns the current record's "url" value
 * @method string   getTitle()       Returns the current record's "title" value
 * @method string   getContent()     Returns the current record's "content" value
 * @method boolean  getIsShown()     Returns the current record's "is_shown" value
 * @method string   getEmail()       Returns the current record's "email" value
 * @method Category getCategory()    Returns the current record's "Category" value
 * @method Article  setCategoryId()  Sets the current record's "category_id" value
 * @method Article  setImage()       Sets the current record's "image" value
 * @method Article  setUrl()         Sets the current record's "url" value
 * @method Article  setTitle()       Sets the current record's "title" value
 * @method Article  setContent()     Sets the current record's "content" value
 * @method Article  setIsShown()     Sets the current record's "is_shown" value
 * @method Article  setEmail()       Sets the current record's "email" value
 * @method Article  setCategory()    Sets the current record's "Category" value
 * 
 * @package    sfHfLan
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseArticle extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('article');
        $this->hasColumn('category_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('image', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('url', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('title', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('content', 'string', 4000, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 4000,
             ));
        $this->hasColumn('is_shown', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => true,
             'default' => 0,
             ));
        $this->hasColumn('email', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Category', array(
             'local' => 'category_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $sluggable0 = new Doctrine_Template_Sluggable(array(
             'unique' => true,
             'fields' => 
             array(
              0 => 'title',
             ),
             'canUpdate' => true,
             ));
        $this->actAs($timestampable0);
        $this->actAs($sluggable0);
    }
}