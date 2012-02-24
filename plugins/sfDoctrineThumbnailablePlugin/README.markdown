sfDoctrineThumbnailablePlugin
=============================

New options format
------------------

    [yml]
    Post:
      actAs:
        Thumbnailable:
          config_key:     thumbnailable
          thumb_dir:      '%s/.thumbnails'
          path_method:    'get%sPath'
          keep_original:  true
          on_demand:      false
          on_save:        true
          strict:         true
          default:        cover
          fields:
            cover:
              formats:
                homepage: 50x50
                default: homepage
            side:
      columns:
        cover: { type: string(255) }
        side: { type: string(255) }
    

Overview
--------
sfDoctrineThumbnailablePlugin is a symfony plugin aiming to ease thumbnail
management for your doctrine models. It takes advantage of (and therefore,
depends on) the sfThumbnailPlugin.

Configuring your models
-----------------------

Let's start with a sample doctrine schema:

    [yml]
    Media:
      columns:
        image:  { type: string(255) }

This model will represent an image, and its ``image`` field shall contain a path (relative to ``sf_root_dir``) to an image. The ``Thumbnailable`` behavior is activated like any other behavior, in the ``actAs`` section:

    [yml]
    Media:
      actAs:
        Thumbnailable: ~
      columns:
        image:  { type: string(255) }

Now what ? Well, you're quite ready to go. The behavior adds a ``getThumbnail``
method which you can already use:

    [php]
    $media = Doctrine::getTable('Media')->findSomeMedia();
    $media->getThumbnail('image', '50x50');

This will return the path to a ``50x50`` thumbnail for the ``image`` field.

Now let's define some default formats:

    [yml]
    Media:
      actAs:
        Thumbnailable:
          fields:
            image:
              formats:
                homepage: 50x50

Here we define a format of ``50x50`` for the ``image`` field. As you can see,
you can easily define different formats for different fields. Now you may ask
why you'd have to define formats ? There are two reasons for this. First, they
are to be used with other settings:

    [yml]
    Media:
      actAs:
        Thumbnailable:
          strict: true
          on_save: true
          fields:
            image:
              formats:
                homepage: 50x50

The ``on_save`` setting tells the behavior to create thumbnails each time you
save your object, and the ``strict`` setting forbid you to use any other format
than the ones defined. For example, the following code would throw an
exception:

    [php]
    $media->getThumbnail('image', '150x50');

The second reason to define formats is that when you use a same format in
multiple places in your code, when you need to change it, it would be a real
pain to go all through your code to update the ``getThumbnail`` calls. That's
why you can define ``labels`` for your formats. For example, these two lines of
code are equivalent:

    [php]
    $media->getThumbnail('image', '50x50');
    $media->getThumbnail('image', 'homepage');

To save some time, and since we only have one image field and one format, you
could ommit the arguments to ``getThumbnail``:

    [php]
    $media->getThumbnail(); // equivalent to $media->getThumbnail('image', 'homepage');

Now what happens when you have multiple image fields with multiple format ?
Well you can define default fields and default formats:

    [yml]
    Media:
      actAs:
        Thumbnailable:
          strict: true
          on_save: true
          default: image
          fields:
            image:
              formats:
                homepage: 50x50
                body: 300x300
                default: body
            alternate:
              formats:
                homepage: 50x50
      columns:
        image: { type: string(255) }
        alternate: { type: string(255) }

Now the default format for the ``image`` field is ``homepage`` since it is
defined as such, and the default format for ``alternate`` is ``homepage`` since
it is the only one. Also, the default field is ``image`` thanks to the
``default`` field in ``formats``.

Examples:

    [php]
    $media->getThumbnail();             // equivalent to: $media->getThumbnail('image', 'body');
    $media->getThumbnail('homepage');   // equivalent to: $media->getThumbnail('image', 'homepage');
    $media->getThumbnail('alternate');  // equivalent to: $media->getThumbnail('alternate', 'homepage');

Other configuration settings
----------------------------

The ``on_demand`` setting allows to forbid (when set to ``false``) on-the-fly
thumbnail building. It basically means that you are restricted to the
thumbnails created at save time (of course, you'd better activate ``on_save``).

The ``thumb_dir`` allows you to control where the thumbnails are stored. It
should points to a directory relative to the image's ``dirname``.

The ``path_method`` allows you to specify an object method name, which will return the 
absolute file path to the picture file.

The ``quality`` setting allows you to specify the compression level (0 to 100)
you want for the resulting jpg files. It can be specified globally, for each field
or for each format (with WidthxHeightxQuality).
If not set, it will use sfThumbnail's default value of 75.

    [yml]
    Media:
      actAs:
        Thumbnailable:
          strict: true
          on_save: true
          default: image
          path_method: get%sPath
          quality: 75
          fields:
            image:
              quality: 50
              formats:
                homepage: 50x50
                body: 300x300x90
                default: body
            alternate:
              formats:
                homepage: 50x50
      columns:
        image: { type: string(255) }
        alternate: { type: string(255) }

And in your Media model class:

    [php]
    public function getImagePath()
    {
      return sfConfig::get('sf_web_dir').'/uploads/images/'. $this->getImage();
    }
    
    public function getAlternatePath()
    {
      return sfConfig::get('sf_web_dir').'/uploads/alternate/'. $this->getImage();
    }
