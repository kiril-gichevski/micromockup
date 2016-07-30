# micromockup

A small snippet for fast show cases using PHP

## Why making this micro mockup

It should be used only for fast show cases. I usually use it when I go to job interviews. You have to code something 
and you have to do it fast but the time is limitted and you are not allowed to use a framework.
You can all do in old PHP way just mixing everything up but that is just so messy.

## Navigation
The micromockup is just a small MVC so navigation is done through a front controller (index.php). <br/>
Navigation is done in the next order <b>controller/action/argument1/argument2....</b></br>
Navigating to a <b>controllers/page.php</b> and calling the <b>showpages action</b> with an argument <b>5</b> 
would be done like this:<br/>
```js
page/showpages/5
```
By default the <b>index action</b> is called.</br>
Note that when passing arguments the function would have to accept the same number of arguments.</br>
For example when navigation to <b>page/showpages/5/10</b> your function would look like this:<br/>
```php
public function showpages($firstArgument, $secondArgument)
{
  //logic
}
```

### Assets
#### JavaScript
The JS lives in the <b>assets/js</b> directory
Currently there is a <b>page.js</b> snippet. The page.js uses the singleton pattern but you can write JS your style.
#### CSS
The CSS lives in the <b>assets/css</b> directory.
Currently no snippet is provided.
#### IMG
Place your images in the <b>assets/img</b> directory.

###Config
All the config needed is placed in the config directory.<br/>
What you have to configure is placed in the <b>config/config.php</b>
This is the config used for the database
```php
class Config {
    const DB_HOST = 'localhost';
    const DB_NAME = 'testdb';
    const DB_USERNAME = 'root';
    const DB_PASSWORD = 'root';
}
```
Also you will have to configure the routes in the project.
To do that edit the <b>router.php</b>
```php
$map = [
    'page' => 'Micromockup\Controllers\Page'
];
```
Just add more routes pointing to your controllers.

### Controllers
All the controllers live in the <b>controllers</b> directory.<br/>
Calling a controller in a browser is explained in the [Navigation](#navigation) section. </br>
Currently there is the snippet for the page.php controller.<br/>
Every controller has to inherit from <b>Micromockup\config\Init</b>.<br/>
In the constructor I usually init the Models I need.<br/>
Here is a small snippet.
```php
<?php
namespace Micromockup\Controllers;

use Micromockup\config\Init;
use Micromockup\db\models\Page as PageModel;

class Page extends Init{
    private $model;

    public function __construct()
    {
        parent::__construct();
        $this->model = new PageModel($this->connection);
    }

    public function index()
    {
        $pages = $this->model->getAllPages();
        echo $this->twig->render('views/page/page.html.twig', ['pages' => $pages]);
    }
}
```
### Models
The modesl live in the <b>db/models</b> directory.<br/>
Make sure to init the PDO connection in the Construstor.
Then just write a normal PDO queries.

###Views
The views live in the <b>views/page</b> directory. <br/>
I like twig so there is a twig snippet in. All of the views inherit from <b>views/base.html.twig</b>.<br/>
Currently you can extend the body and the title but feel free to change this. <br/>
Also reference all the JS and CSS in the <b>views/base.html.twig</b>.




