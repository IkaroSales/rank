Ranking DevOps


Descrição

Este projeto trata-se da implementação de um CRUD simples de Usuarios, cuja finalidade é demonstrar um Ranking DevOps.

A aplicaçao utiliza as seguintes tecnologias: Xampp, MySQL, PHP( Zend framework3), HTML, Composer.



Preparação do ambiente

Este tutorial assume que o local do projeto será no diretório /c/xampp/htdocs

$ git clone https://pb-dc.alm-latam.accenture.com/source/rdo.git



VirtualHost

NameVirtualHost rdo.localhost:8080

<VirtualHost *:8080>
    DocumentRoot C:/xampp/htdocs/rdo/public
    ServerName rdo.localhost:8080
    <Directory "/var/www/zf2-doctrine/public">
        DirectoryIndex index.php
        AllowOverride All
        Order allow,deny
        Allow from all
    </Directory>
</VirtualHost>



Hosts

Configurar um VHOST em seu Apache e reinicie o Apache

127.0.0.1       rdo.localhost >> c: \ windows \ system32 \ drivers \ etc \ hosts



Database

•	Crie uma base de dados com o nome meubanco (recomendado)
•	Importe o arquivo scripts/post.sql para este banco de dados mysql



Monica Padilha : monica.maria.padilha@accenture.com
