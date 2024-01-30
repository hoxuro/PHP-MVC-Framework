<h1>Framework-PHP-usando-MVC</h1>
<p>En este proyecto que he realizado, he creado mi propio framework de PHP, basándose en el patrón de arquitectura de software Modelo-Vista-Controlador, con el objetivo de crear una aplicación que me facilitase la creación de aplicaciones en PHP sin delegar acciones a alguna dependencia y así aprender en profundidad PHP.</p>
<p>Para seguir este proyecto, deberías conocer PHP en profundidad, manejo de servidores Apache, programación orientada a objetos y entender cómo funciona el patrón de arquitectura de software Modelo-Vista-Controlador.</p>

<h2>Índice:</h2>
<ol>
  <li>Directorios y ficheros del framework y su significado</li>
  <li>Ruteo de la URL</li>
  <li>Creación del core del framework</li>
  <li>Conexión entre modelos y bases de datos con PDO</li>
</ol>

<h2>Directorios y ficheros del framework y su significado</h2>
<p>
<nombre_de_tu_proyecto>/<br/>
│<br/>
├── app/<br/>
│   ├── controllers/<br/>
│   │   ├── home.php<br/>
│   │   └── _404.php<br/>
│   ├── core/<br/>
│   │   ├─ App.php<br/>
│   │   ├─ Controller.php<br/>
│   │   ├─ config.php<br/>
│   │   ├─ functions.php<br/>
│   │   └─ Database.php<br/>
│   ├── models/<br/>
│   │   └── User.php<br/>
│   ├── views/<br/>
│   │   ├── home<br/>
│   │   │	  └── index.php<br/>
│   │   └── _404<br/>
│   │   	  └── index.php<br/>
│   └─── init.php<br/>
│<br/>
├── public/<br/>
│   ├── index.php<br/>
│   ├── assets/<br/>
│   │   ├── css/<br/>
│   │   │   └── style.css<br/>
│   │   ├── sass/<br/>
│   │   │   └── main.scss<br/>
│   │   ├── js/<br/>
│   │   │   └── script.js<br/>
│   │   └── images/<br/>
│   │       └── logo.png<br/>
│   └── .htaccess<br/>
│<br/>
└── README.md<br/>
</p>


<h2>Directorio raíz</h2>
<p>Dentro del directorio raíz, que tendrá el nombre del proyecto que vamos realizar, tenemos 2 carpetas public y app.</p>

<h3>public</h3>
<p>La carpeta public es la carpeta de producción que verá el usuario final. En ella almacenaremos todos los recursos necesarios para el frontend de la aplicación como assets, css, js, images, etc.</p>

<h3>app</h3>
<p>La carpeta app es la carpeta de desarrollo. En ella iremos creando nuestra aplicación con el modelo de arquitectura de software MVC.</p>


<h2>public</h2>
<h3>index.php</h3>
<p>Es el fichero que se cargará cuando un usuario entre en <nombre_de_tu_aplicacion>/public dentro de él incluiremos la aplicación creada dentro de la carpeta app con las líneas de código. (recordemos que estamos usando MVC) que previamente habrá sido cargada en app/init.php</p>
<img width="476" alt="image" src="https://github.com/hoxuro/Framework-PHP-usando-MVC/assets/86883781/4e3c30a0-8630-43e8-a93f-351f9d6d9fea">

<h3>assets</h3>
<p>Todo lo relacionado con los assets de mi página como script.js css, imágenes…</p>

<h3>.htaccess</h3>
<p>Dentro de public a parte de los assets tendremos otro fichero .htaccess cuyo objetivo principal será el enrutamiento y la creación de url amigables, es decir, que si el usuario pone una url inexistente se irá a 404 not found. Contenido más adelante</p>


<h2>app</h2>
<h3>init.php</h3>
<p>Dentro de init.php vamos a introducir el contenido del core de la aplicación que serán los archivos base sobre los que se cimenta nuestra aplicación con el MVC.</p>
<img width="584" alt="image" src="https://github.com/hoxuro/Framework-PHP-usando-MVC/assets/86883781/19696644-22a0-42a9-9c24-2eee7ae22524">


<h3>core/</h3>
<p>Dentro de la carpeta core crearemos los ficheros .php sobre los que se cimentará nuestra aplicación como App.php, Controller.php, etc. Los ficheros que empiezan con mayúscula se refieren a clases.</p>

<h3>core/Controller.php</h3>
<p>Antes de empezar a crear la app que será el núcleo de nuestra aplicación creemos Controller.php que será el controlador cuya lógica heredarán todos los controladores de nuestra aplicación. El código es este:</p>











