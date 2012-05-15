This branch use Bootstrap 2.0 for Bootstrap 1.4 switch to 1.0 branch

# sfTwitterBootstrapPlugin

This symfony1 plugin provides a dashboard/menu and a theme for the admin generator for your backend. It is based on the [Twitter Bootstrap](http://twitter.github.com/bootstrap/).
It works with Propel or Doctrine.
The generated dashboard/menu is based on the great [sfAdminDashPlugin](https://github.com/kbond/sfAdminDashPlugin).

## Requirements

For a ``Propel`` use, you will have to install [sfPropelORMPlugin](https://github.com/propelorm/sfPropelORMPlugin) instead of sfPropelPlugin.
You might need [sfGuardPlugin](http://www.symfony-project.org/plugins/sfGuardPlugin) (or [sfDoctrineGuardPlugin](http://www.symfony-project.org/plugins/sfDoctrineGuardPlugin)) for the user management.

## Screenshots

Preview of list:

![Preview of list](https://github.com/real-chocopanda/sfTwitterBootstrapPlugin/raw/master/doc/list.png)

Preview of edit:

![Preview of edit](https://github.com/real-chocopanda/sfTwitterBootstrapPlugin/raw/master/doc/edit.png)

Preview of show (with support of partials on the right, see below):

![Preview of show](https://github.com/real-chocopanda/sfTwitterBootstrapPlugin/raw/master/doc/show.png)

Preview of login:

![Preview of login](https://github.com/real-chocopanda/sfTwitterBootstrapPlugin/raw/master/doc/login.png)

## How to setup

In ``config/ProjectConfiguration.class.php``

```php
class ProjectConfiguration extends sfProjectConfiguration
{
  public function setup()
  {
    $this->enablePlugins('sfTwitterBootstrapPlugin');
    ...
```

In ``apps/backend/config/view.yml``

```yaml
default:
  stylesheets:
    - /sfTwitterBootstrapPlugin/bootstrap/docs/assets/css/bootstrap.css # compiled css are now in the docs
    - /sfTwitterBootstrapPlugin/css/style.css
    - /sfTwitterBootstrapPlugin/css/jquery-ui-1.8.16.custom.css # For date pickers ...
    - main.css

  javascripts:
    - "/sfTwitterBootstrapPlugin/js/jquery-1.7.min.js"
    - "/sfTwitterBootstrapPlugin/js/jquery.tablesorter.min.js"
    - "/sfTwitterBootstrapPlugin/js/google-code-prettify/prettify.js"
    - "/sfTwitterBootstrapPlugin/bootstrap/js/bootstrap-dropdown.js"
    - "/sfTwitterBootstrapPlugin/bootstrap/js/bootstrap-tooltip.js"
    - "/sfTwitterBootstrapPlugin/bootstrap/js/bootstrap-scrollspy.js"
    - "/sfTwitterBootstrapPlugin/bootstrap/js/bootstrap-modal.js"
    - "/sfTwitterBootstrapPlugin/bootstrap/js/bootstrap-alert.js"
    - "/sfTwitterBootstrapPlugin/js/application.js"
    - "/sfTwitterBootstrapPlugin/js/bootbox/bootbox.min.js"
    - "/sfTwitterBootstrapPlugin/js/jquery-ui-1.8.16.custom.min.js" # For date pickers ...


  layout:         %SF_PLUGINS_DIR%/sfTwitterBootstrapPlugin/templates/layout
```

If you want to active colors by env add stylesheet :

```yaml
default:
  stylesheets:
    - /sfTwitterBootstrapPlugin/css/color-my-env.css
```

In ``apps/backend/config/app.yml``

```yaml
all:
  sf_twitter_bootstrap:
    site:                   Your project name
    # if you want top links to fieldset legend in new/edit page (like "Admin & Content" in the edit screenshot)
    top_link_to_fieldset:   true
    # if you *also* want to display the pagination on top of the list
    display_top_pagination: true
```

In ``apps/backend/config/settings.yml``

```yaml
all:
  .settings:
    enabled_modules: [default, sfTwitterBootstrap, ...]
```

Configure the form formatter :

In ``apps/backend/config/backendConfiguration.class.php``

```php
class backendConfiguration extends sfApplicationConfiguration
{
  public function configure()
  {
    sfWidgetFormSchema::setDefaultFormFormatterName('TwitterBootstrap');
  }
}
```

## The generator.yml

Change the theme value to :

```yaml
generator:
  ...
  param:
    ...
    theme:                 twitter
    ...
```

### Add a custom icon in your button

Edit ``app.yml``:

```yaml
all:
  sf_twitter_bootstrap:
    ...
    # display bootstrap icon before text in all button
    use_icons_in_button:     true
```

In your ``generator.yml`` you can now add a custom icon to your button. Just add a ``icon`` parameter to the new action.

```yaml
generator:
  ...
  config:
    ...
    list:
      actions:
        ...
        newListActions:  {label: "New list action", icon: "icon-download"}
      object_actions:
        ...
        newObjectActions: {label: "New object action", icon: "icon-asterisk"}
    edit:
      ...
      actions:
        ...
        newFormActions:  {label: "New form action", icon: "icon-comment"}
```

### Enable the show views

Edit ``generator.yml``

```yaml
generator:
  ...
  param:
    ...
    with_show: true
```

The displayed fields can be customized exactly like the edit fields, with a `show` section:

```yaml
generator:
  ...
  config:
    show:
      display:       [id, lastname, firstname, surname, _country, gender, _sports, is_active, has_historic]
```

To include a `show` link in each line of the list view, use the `_show` object action:

```yaml
generator:
  ...
  config:
    list:
      object_actions:
        ...
        _show: { action: _show }
```

### Include partials on the right

```yaml
generator:
  ...
  config:
    ...
    edit:
      ...
      partial: ['module/partial']
```

Some partials are bundeled with the plugin :

#### Propel behaviors

* versionable: ```propel_behaviors/versionable_version_list```
* auditable: ```propel_behaviors/auditable_log_list```

missing : Timestampable, Geocodable, I18n, Taggable, Ratable, Commentable, NestedSet, Sluggable

![Preview of extra partials](https://github.com/real-chocopanda/sfTwitterBootstrapPlugin/raw/master/doc/behavior-templates.png)

#### Doctrine behaviors
Unfortunately, Doctrine doesn't add cool method to retrieve information from its behavior, like Propel did.

## Include a slot in all your screens :

Edit ``view.yml``

```yaml
default:
  components:
    sf_twitter_bootstrap_permanent_slot: [ Module, component ]
```

## Highlight required label

In your form class :

```php
$formatterObj = $this->widgetSchema->getFormFormatter();
$formatterObj->setValidatorSchema($this->getValidatorSchema());
```

Of course, if you are using an admin generator it's automatic !

## sfGuard signin form

Overwrite the signinSuccess into ``apps/backend/modules/sfGuardAuth/templates/signinSuccess.php``

``` php
<?php include_partial('sfTwitterBootstrap/login', array('form' => $form)); ?>
```

## Setup the menu and the dashboard

You can follow _Step 3_ to  _Step 5_ from the [readme file of sfAdminDashPlugin](https://github.com/kbond/sfAdminDashPlugin/blob/master/README.md) to setup dashboard / menu items.
We use different icons in comparison to sfAdminDash. Check the folder ``images``.

An additional parameter is available, edit ``app.yml``

```yaml

all:
  sf_twitter_bootstrap:
    ...
    # string used as root of breadcrumb
    breadcrumb_root_name: Home
```

## Display custom field in a form

We often need to extends form display in the admin generator to display additional information or a plain text field, etc .. To do that, you need to indicate a partial in generator.yml (like `_member_id`) and use this template to have a nice render :

``` php
  <div class="control-group sf_admin_form_row sf_admin_text">
    <label class="control-label" for="member_id">Member</label>
    <div class="controls">
      <?php echo $form['member_id']->render(); ?>
      <div class="input-plain">&raquo; <?php echo $form->getObject()->getMember() ?></div>
    </div>
  </div>
```

Of course, you will have to edit it (and replace php action with yours) but keep the html structure.
