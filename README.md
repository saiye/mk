## about mk

```text
mk 是基于php+markedjs+jquery-treeview开发，可以在线浏览Markdown文档的工具
README.md
目前只支持三层目录，更深层目录暂不支持

```

```text

Mk is developed based on PHP +markedjs+jquery-treeview, which can browse Markdown documents online
The README. Md
Currently only three levels of directory support, deeper directory temporarily not supported

```

## install

```text

git clone git@github.com:saiye/mk.git



在App/CCOntroller/Index
指定md目录
Specify md directory
$dir = '/mnt/web/mk';


nginx:

因为项目是单入口，nginx 需要配置

Because the project is a single entry, nginx needs to be configured

 location / {
          try_files $uri $uri/ /index.php?$query_string;
 }

demo 


server
    {
        listen 80;
        server_name  www.mk.com;
        index index.html index.htm index.php;
        root  /mnt/web/mk/public;

        include enable-php.conf;

	     
	  location / {
          try_files $uri $uri/ /index.php?$query_string;
        }

        location /nginx_status
        {
            stub_status on;
            access_log   off;
        }

        location ~ /\.
        {
            deny all;
        }
}


```

```text
Apache:
Options +FollowSymLinks -Indexes
RewriteEngine On

RewriteCond %{HTTP:Authorization} .
RewriteRule .* - [E=HTTP_AUTHORIZATION:%{HTTP:Authorization}]

RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule ^ index.php [L]
```

## 效果图  effect picture
![avatar](https://www.kfcp.cn/1.png)
![avatar](https://www.kfcp.cn/3.png)