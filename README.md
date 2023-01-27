Frame work used : Codeigniter


Installation guide
Clone this repo
take the local url
If needed set the virtual host
<VirtualHost *:80>
    ServerName  machinetest.local
    DocumentRoot /var/www/polus-machine-test
    <Directory "/var/www/polus-machine-test">
        Options FollowSymLinks
        AllowOverRide All
        Require all granted
    </Directory>
</VirtualHost>

Controller 
Invoice

Functions
Index
generateInvoice

View Files
generate_invoice.php
pdf_view.php

Custom js
assets/invoice.js

Library used
dompdf

I have not given importance to styling

AdminLTE template used for html template
