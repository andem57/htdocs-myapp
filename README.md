# htdocs-myapp

    👋 Hi, I’m @andem57 Под рукой нет сервера на linux-се только windows 10 Проверял без laravel, работает.

config for nginx

#user nobody; worker_processes 1;

#error_log logs/error.log; #error_log logs/error.log notice; #error_log logs/error.log info;

pid temp/nginx.pid;

events { worker_connections 1024; }

http { include mime.types; default_type application/octet-stream;

log_format  main  '$remote_addr - $remote_user [$time_local] "$request" '
                  '$status $body_bytes_sent "$http_referer" '
                  '"$http_user_agent" "$http_x_forwarded_for"';

#access_log  logs/access.log  main;

sendfile        on;
#tcp_nopush     on;

#keepalive_timeout  0;
keepalive_timeout  65;

client_max_body_size 55m;

#gzip  on;

scgi_temp_path  temp/uwsgi_temp 1 2;
uwsgi_temp_path  temp/uwsgi_temp 1 2;

fastcgi_connect_timeout 1;


server {
	listen   127.0.0.1:80;

	root home/localhost/public_html;
	index index.php index.html;

	log_not_found off;
    charset utf-8;

	access_log  logs/access.log  main;

	location ~ /\. {deny all;}

	location / {

		if ($host ~ ^(www\.)?([a-z0-9\-\.]+)$){
			root home/$2/public_html;
			access_log  logs/$2-access.log  main;
		}

	}

    location ~ \.php$ {

		if ($host ~ ^(www\.)?([a-z0-9\-\.]+)$){
			root home/$2/public_html;
			access_log  logs/$2-access.log  main;
		}

		if (!-e $document_root$document_uri){return 404;}
		fastcgi_pass localhost:9071;
		fastcgi_index index.php;
		fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;

		include fastcgi_params;

    }
}

server {
	listen 127.0.0.1:443;
	include ssl.conf;

	root home/localhost/public_html;
	index index.php index.html;

	log_not_found off;
    charset utf-8;

	access_log  logs/access.log  main;

	location ~ /\. {deny all;}

	location / {

		if ($host ~ ^(www\.)?([a-z0-9\-\.]+)$){
			root home/$2/public_html;
			access_log  logs/$2-access.log  main;
		}

	}

    location ~ \.php$ {

		if ($host ~ ^(www\.)?([a-z0-9\-\.]+)$){
			root home/$2/public_html;
			access_log  logs/$2-access.log  main;
		}

		if (!-e $document_root$document_uri){return 404;}
		fastcgi_pass localhost:9071;
		fastcgi_index index.php;
		fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;

		include fastcgi_params;

    }
}
