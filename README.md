<h1>Framework-PHP-usando-MVC</h1>
<img width="639" alt="image" src="https://github.com/hoxuro/Framework-PHP-usando-MVC/assets/86883781/d956aede-7fd7-4e86-8005-1aeda9b983ea">

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
<img width="422" alt="image" src="https://github.com/hoxuro/Framework-PHP-usando-MVC/assets/86883781/5af749aa-604a-4623-9bd8-29e520d5f9e8">

<h3>core/config.php</h3>
<p>En config vamos a tener principalmente constantes de configuración de nuestro servidor y la base de datos que vayamos a usar para el proyecto.</p>
<img width="889" alt="image" src="https://github.com/hoxuro/Framework-PHP-usando-MVC/assets/86883781/4b15aa99-f150-41f4-b98f-49e1195d3130">

<h3>core/functions.php</h3>
<p>En functions vamos a tener funciones que iremos reutilizando en distintos ficheros.</p>
<img width="530" alt="image" src="https://github.com/hoxuro/Framework-PHP-usando-MVC/assets/86883781/2c4726c8-38cc-43da-b057-0fbd2b8702a9">

<h3>core/Database.php</h3>
<p>En este fichero vamos a crear el Trait Database que nos servirá para conectarnos a la base de datos además, aunque podemos crearla como clase pero no tiene ninguna dificultad.</p>
<h4>Traits</h4>
<p>Un trait y una class son parecidos solo que un trait a diferencia de una clase no se puede instanciar debe ser usado con use. Esto nos permitirá más adelante en los modelos usar la base de datos sin gastar el extends por si nos hiciera falta.</p>
<img width="525" alt="image" src="https://github.com/hoxuro/Framework-PHP-usando-MVC/assets/86883781/8c5a6b48-7d52-4c0e-b1e6-cb58d121a504">
<img width="520" alt="image" src="https://github.com/hoxuro/Framework-PHP-usando-MVC/assets/86883781/276ec849-9bf1-4f9e-86eb-6a949db0f6c7">
<img width="526" alt="image" src="https://github.com/hoxuro/Framework-PHP-usando-MVC/assets/86883781/901cfb86-7a0d-40f9-b1df-dd56f8c3b31b">

<h3>core/App.php</h3>
<p>Dentro del fichero app es donde se ejecutará verdaderamente nuestra aplicación. Se sanitizar la url en que se encuentre el usuario y con ello se crearán los controladores con sus métodos de acción correspondientes. El controlador por defecto será home.php y su método de acción por defecto será index().</p>

<img width="530" alt="image" src="https://github.com/hoxuro/Framework-PHP-usando-MVC/assets/86883781/87a1c337-b5ff-4142-a2af-126269947d0b">
<img width="528" alt="image" src="https://github.com/hoxuro/Framework-PHP-usando-MVC/assets/86883781/beb477ce-b458-4ba2-8d91-eacfd5c65bd4">


<h3>controllers</h3>
<p>En la carpeta controllers crearemos los controladores específicos que heredarán del
Controller del core, y que tendrán métodos de acción donde como en cada controller de MVC nos comunicaremos con los modelos para obtener datos y el resultado de estos los mostraremos a partir de vistas. El controlador por defecto es home.php.</p>

<h3>models</h3>
<p>En la carpeta models crearemos los modelos que usaremos. En particular, estos modelos usarán un Trait que es la conexión con la base de datos. <b>Explicación en el apartado de la base de datos.</b></p>

<h4>Model</h4>
<p>Model es el modelo que hemos usado para esta aplicacion de ejemplo para nuestro framework de php en él se hace uso de conexiones con la base de datos para obtener, modificar o eliminar información de la misma. El código dentro de model es este:</p>
<img width="696" alt="image" src="https://github.com/hoxuro/Framework-PHP-usando-MVC/assets/86883781/5965edc2-2034-4643-916e-3def78acad95">
<img width="696" alt="image" src="https://github.com/hoxuro/Framework-PHP-usando-MVC/assets/86883781/a4f43225-55b1-4152-9c57-ec94f02ec50a">
<img width="693" alt="image" src="https://github.com/hoxuro/Framework-PHP-usando-MVC/assets/86883781/2bfe90c6-4bed-4eca-ae99-ef11b61220ae">
<img width="698" alt="image" src="https://github.com/hoxuro/Framework-PHP-usando-MVC/assets/86883781/613f2b59-eb83-4e8e-a2b2-1f71c7069204">
<img width="700" alt="image" src="https://github.com/hoxuro/Framework-PHP-usando-MVC/assets/86883781/1b30e36a-769f-4e25-ac04-faa455258745">


<h3>views</h3>
<p>Dentro de views crearemos las vistas. Que como ya deberíamos saber, en el MVC se utilizan para mostrar el resultado de las operaciones realizadas entre el controlador y el modelo.</p>

<h1>Ruteo sencillo de la URL</h1>
<p>Qué es lo que queremos hacer, vamos a hacer que cuando un usuario introduzca una url que no existe en nuestra aplicación que no salga error sino que lo redirija a una página de ERROR 404 NOT FOUND. </p>
<p>También estableceremos el controlador y su método por defecto en caso de que no se hayan introducido parámetros extra en la URL.</p>
<p>El archivo .htaccess nos permitirá hacer que si el usuario introduce el nombre de un fichero o de un directorio de manera correcta por URL permita mostrarlo pero en caso contrario queremos que nos redirija a la url por defecto. Y si es incorrecto se usará el controlador _404.php para mostrar que no se ha encontrado el recurso que busca. El contenido es:</p>
<img width="602" alt="image" src="https://github.com/hoxuro/Framework-PHP-usando-MVC/assets/86883781/47300bcd-6c03-484d-b4f3-ebf0f48259f3">


<h2>Direccion por defecto</h2>
<p>$controller será el controlador por defecto, es decir cuando entremos en la aplicación se ejecutará el archivo controlador home.php</p>
<p>$method será el método del accion de ese controlador que se ejecute por defecto al entrar en la aplicación.</p>
<p>$params será un array de tantos elementos como subdirectorios tenga la url a partir del nombre public/ nos servirá para introducir parámetros a partir de la url. Y se ejecutarán en una callback que veremos más adelante.</p>
<p>E.g: si la url es mvc/public/carpeta/archivo.php $params será array(‘carpeta’, ‘archivo.php’); El MVC usa PHP con POO recuerda.</p>

<h2>Sanitización de la URL</h2>
<p>Con esta función obtendremos de manera sanitizada los elementos que hayamos puesto después de public y que para que nos hagamos una idea funcionará de la siguiente manera: miAplicacion/public/<nombre_controlador>/<nombre_metodo_controllador>/param1/param2/param…</p>
<p>Si la url no existe, nos pondrá el controlador por defecto y su método.</p>
<img width="677" alt="image" src="https://github.com/hoxuro/Framework-PHP-usando-MVC/assets/86883781/d24c8384-d391-4c6c-869c-749bed9f07a7">


<h1>Creación del core del framework</h1>
<p>Finalmente, dentro del constructor de nuestra aplicación, vamos a crear la lógica cuya función será hacer uso de un controlador por defecto o introducido por el usuario y también de un método y pasándole los parámetros que veamos correspondientes será así.</p>
<img width="657" alt="image" src="https://github.com/hoxuro/Framework-PHP-usando-MVC/assets/86883781/891e5047-ecee-4010-b1c2-29f04eba2e83">
<img width="948" alt="image" src="https://github.com/hoxuro/Framework-PHP-usando-MVC/assets/86883781/cf1917de-9186-4862-8049-bd2009c9f01c">


<h2>Ejecución del controlador con su método de acción</h2>
<p>Una vez hayamos hecho uso de call_user_func_array con el controlador y su método de acción que queramos y los parámetros, se ejecuta el método de acción de ese controlador y ya pasamos al fichero por ejemplo con el controlador home y su método de acción saludar con el parámetro $nombre.</p>
<p>El código del controlador home.php para un TODO LIST en PHP sería este:</p>
<img width="451" alt="image" src="https://github.com/hoxuro/Framework-PHP-usando-MVC/assets/86883781/f481443e-0fc2-4ef9-9516-1956bbdfd480">

<h1>Conexión a  bases de datos con PDO</h1>
<p>Para implementar la base de datos en nuestro MVC vamos a usar PDO.</p>

<h2>Config.php</h2>
<p>Recordemos que en config.php vamos a definir constantes que tendrán los datos necesarios para realizar una conexión con PDO.</p>

<img width="931" alt="image" src="https://github.com/hoxuro/Framework-PHP-usando-MVC/assets/86883781/b145d798-5ab0-49ad-9ca9-449d15d710fc">

<h2>Database.php</h2>
<p>Database.php nos va a permitir crear una conexión con PDO a nuestra base de datos, además los parámetros los definiremos como constantes en config.php.</p>

<h3>Traits</h3>
<p>Un trait y una class son parecidos solo que un trait a diferencia de una clase no se puede instanciar debe ser usado con use. Esto nos permitirá más adelante en los modelos usar la base de datos sin gastar el extends por si nos hiciera falta.</p>
<img width="644" alt="image" src="https://github.com/hoxuro/Framework-PHP-usando-MVC/assets/86883781/f715f795-c667-4aa2-bdac-ca2d6a244d6f">
<img width="627" alt="image" src="https://github.com/hoxuro/Framework-PHP-usando-MVC/assets/86883781/9886ed75-b9dd-4add-8302-ae1b3ba434ab">
<img width="621" alt="image" src="https://github.com/hoxuro/Framework-PHP-usando-MVC/assets/86883781/7a3d56a8-5f72-49f5-8baa-6ffec4d8456d">

<h2>Conectando con la Base de Datos</h2>
<p>Tenemos que crear la base de datos, yo usaré MSQL en phpmyadmin, pero podemos usar el gestor de bases de datos que más nos guste.</p>
<img width="629" alt="image" src="https://github.com/hoxuro/Framework-PHP-usando-MVC/assets/86883781/cbcc3f0e-4995-424a-b35d-d6afafb9ebda">

<h2>Base de datos en acción</h2>
<p>Ahora nos vamos al controlador de home.php en el que, gracias a la herencia que recibe de Controller.php, vamos a crear una instancia del modelo que queramos usar y vamos a realizar una serie de operaciones cuyo resultado final mostraremos a través de una vista.</p>
<img width="561" alt="image" src="https://github.com/hoxuro/Framework-PHP-usando-MVC/assets/86883781/5cb025f6-3ab9-4989-91a5-84f0a81cf714">

<h2>¿Qué hace el código de arriba?</h2>
<ol>
  <li>Instancia un nuevo modelo Model.php</li>
  <li>Si $_POST tiene establecido add quiere decir que se han pasado los datos para crear un nuevo TODO</li>
  <li>Invoca el método addTodo</li>
  <li>Invoca el método refreshTodo para actualizar los todos de esa instancia de Modelo</li>
  <li>Finalmente muestra el resultado al usuario usando la vista index.php en la carpeta home dentro de la carpeta views. <b>Esta dirección no tiene nada que ver con el ruteo de URL que hemos hecho antes</b>.</li>
</ol>

<h1>FIN</h1>
<p>Y esto ha sido todo, cómo crear un framework PHP que hace uso del modelo vista controlador y con un ruteo. Podéis descargar el código fuente en caso de que queráis realizar vuestros propios proyectos. Nos vemos!</p>









