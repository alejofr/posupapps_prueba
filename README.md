#para desplegar el produccion, debe apuntar a la carpeta public/

#en caso contrario agrega la siguiente linea

# php -- BEGIN cPanel-generated handler, do not edit
# Set the “ea-php81” package as the default “PHP” programming language.
<IfModule mime_module>
  AddHandler application/x-httpd-ea-php81___lsphp .php .php8 .phtml
</IfModule>
# php -- END cPanel-generated handler, do not edit

RewriteEngine on
RewriteCond %{REQUEST_URI} !^public
RewriteRule ^(.*)$ public/$1 [L]
