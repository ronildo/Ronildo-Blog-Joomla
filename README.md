## Instrunctions to run it locally

1 - Downalod the [Zip](https://github.com/ronildo/Ronildo-Blog-Joomla/archive/master.zip) or clone this [repository](https://github.com/ronildo/Ronildo-Blog-Joomla).

2 - Create a MySQL database

3 - Change the configuration.php
  Change the following variables
  $log_path
  $tmp_path
  $host
  $user
  $db
  $password

4 - The last step is change the .htaccess, setting the
```bash
  # RewriteBase /blog
```

to

```bash
RewriteBase /~roni/testes/blog-ronildo
```