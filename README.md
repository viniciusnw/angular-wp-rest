# angular_Wp_Rest
Blog in angular with WordPress rest api

# Aditional Host
# WP REST
<VirtualHost *:80>
ServerAdmin webmaster@vsh-api
    DocumentRoot "/Users/quartel/Documents/www/wp_rest/wp"
    ServerName wp-api
    ServerAlias www.wp-api
    ErrorLog "logs/wp-api-error_log"
    CustomLog "logs/wp-api-access_log" common

   <directory "/Users/quartel/Documents/www/wp_rest/wp">
        Options All
        Order allow,deny
        Allow from all
        XSendFilePath "/Users/quartel/Documents/www/wp_rest/wp"
   </directory>
</VirtualHost>
