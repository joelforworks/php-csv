# PRUEBA TÉCNICA PHP

## Descripción  
He realizado esta prueba sin frameworks para comprender mejor cómo PHP trabaja con el servidor.

## Configuración del Servidor  

Para iniciar el proyecto, es necesario ejecutarlo en un entorno de servidor, como Apache o cualquier stack como **LAMP, MAMP, XAMPP**, etc.  

En mi caso, he configurado un **Virtual Host** para que `http://projects:8888` apunte a la carpeta donde tengo todos mis proyectos.  

### Configuración de Virtual Hosts en MAMP  

```apache
<VirtualHost *:8888>
    DocumentRoot ".../<ruta_a_mis_proyectos>"
    ServerName projects
    <Directory ".../<ruta_a_mis_proyectos>">
        Options Indexes FollowSymLinks
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
```

### Configuración de Hosts para Redirección a MAMP  

Para redirigir al servidor **MAMP** cuando accedamos desde el navegador a `http://projects:8888`, agrega la siguiente línea en el archivo **hosts** de tu sistema:  

```plaintext
127.0.0.1 projects
```

Tambien bastaria con clonar el projecto en la carpeta de www de cualquir entorno LAMP,MAMP,XAMP...

## SCRIP INICIAL

Despues de haber configurado el server ejecutapos el script para levantar la base datos y las tablas:

```plaintext
php script.php
```

Si no se desea configurar un servidor basta con ejecutar este comando:

```plaintext
php -S localhost:9999 -t ./ 
```


-----------
Estoy realizando un parseo del **CSV**, teniendo en cuenta que no es muy óptimo (guardo todo el texto en una variable porque solo es para este caso).
Se podría abstraer más el proceso para abarcar cualquier tipo de **CSV** de manera más eficiente.

### Estructura del projecto 


```plaintext
📂 assets  // Carpeta para guardar el csv.
├── 📄 naves.csv
📂 db // Carpeta donde se guarda la base de datos y objetos para interactuar con ella.
├── 📂 entities
├── 📄 database.sqlite
📂 public // Carpeta donde guardo los css,html y js.
├── 📂 css
├── 📂 html
├── 📂 js
│ 
📂 utils // Carperta donde estan las clases de ayuda.
├── 📄 CsvParser.php
├ 📄 index.php
├ 📄 README.md
├ 📄 script.php
```

