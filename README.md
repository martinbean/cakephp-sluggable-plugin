# CakePHP Sluggable Plugin

A simple CakePHP plugin to allow you to create slugs from a title when saving records.

## Installation

To install, either clone this repository or add it add a submodule to your project. Both are done in a command line client from the root of your project.

### Cloning the repository

The simplest way is to clone the repository. The command for this is:

    $ git clone git@github.com:martinbean/cakephp-sluggable-plugin.git app/Plugin/Sluggable

### Adding as a submodule

Alternatively, you can add the plugin as a submodule to your project if it’s already version-controlled with Git. To do this, run the following commands:

    $ git submodule add git@github.com:martinbean/cakephp-sluggable-plugin.git app/Plugin/Sluggable
    $ git submodule init

For more information on submodules in Git, read http://git-scm.com/book/en/Git-Tools-Submodules.

## Using the Behavior

To use the behavior, first enable the plugin in your **/app/Config/bootstrap.php** file by adding the following line to the bottom:

```php
CakePlugin::load('Sluggable');
```

Alternatively, you can just use the following if you have many plugins:

```php
CakePlugin::loadAll();
```

Then use it in your models:

```php
<?php
class Article extends AppModel {

    public $actsAs = array(
        'Sluggable.Sluggable'
    );
}
```

### Configuration

By default, the behavior assumes you have a `title` column and a `slug` column in your corresponding database table. The names of these columns can be customised as follows:

```php
<?php
class Article extends AppModel {

    public $actsAs = array(
        'Sluggable.Sluggable' => array(
            'titleColumn' => 'article_title',
            'slugColumn' => 'friendly_url'
        )
    );
}
```

The behavior will replace non-alphanumeric characters with dashes. If you prefer to use another character, such as an underscore, then you can change that too:

```php
<?php
class Article extends AppModel {

    public $actsAs = array(
        'Sluggable.Sluggable' => array(
            'replacement' => '_'
        )
    );
}
```

If you have any issues with this plugin then please feel free to create a new [Issue](https://github.com/martinbean/cakephp-sluggable-plugin/issues) on the [GitHub repository](https://github.com/martinbean/cakephp-sluggable-plugin). This plugin is licensed under the MIT License.