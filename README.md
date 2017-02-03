# docker setup by netshops

## Installation instructions

### Getting started

1. Navigate to your projects root
2. Execute ``git clone git@gitlab.netshops-system.com:docker-images/docker-setup.git``
3. Navigate to the created folder with ``cd docker-setup/``
4. Adjust the shopware release url in ``docker-compose.yml``
5. Execute ``docker-compose pull`` to get the newest images
6. Change ``FULL_WIPE_ON_REBOOT`` in ``docker-compose.yml`` to ``"false"`` if you dont need the installation wizard.
7. Execute ``docker-compose up``
8. If needed run your setup and change ``FULL_WIPE_ON_REBOOT`` in ``docker-compose.yml`` to ``"true"`` afterwards. Alternatively you can just import an SQL dump.
9. Open [http://dev.local/](http://dev.local/) in your browser.

### Configuring Mailhog

1. Navigate to the Shopware backend
2. Open the Global Settings and search for "Mailer"
3. Apply the following settings:
    - Method: smtp
    - Hostname for message id: mailhog.dev.local
    - Mail hostname: mailhog
    - Port: 1025
    - Prefix:
    - SMTP user: test
    - SMTP password: test
    - Connection auth:
4. Open the [mailhog webinterface](http://may.local:8025/)
5. Send a mail from shopware in the backend

## Docker structure

### Image layers

* datacontainer
    * Image: netshops/dev_data_container_shopware:latest
    * Description: This container holds a fresh installation of Shopware and extracts it on every "up".
* datasync
    * Image: netshops/dev_data_sync:latest
    * Description: This container syncs ``/var/www/src`` into ``/var/www/html`` on "up" and after that constatly with ``inotify`` on file changes.
* webserver
    * Image: nginx:stable
    * Description: Webserver to serve contents. Can be nginx or apache. Just configure it to your needs.
* phpfpm
    * Image: netshops/dev_php_fpm_ioncube
    * Description: PHP 7.0 with IonCube Loader and Xdebug
* db
    * Image: percona:latest (MySQL Fork)
    * Description: A MySQL container. Choose whatever you like (e.g. MySQL, MariaDB, Percona)
* mailfetcher
    * Image: mailhog/mailhog:latest
    * Description: A mail fetcher. Can be opened under [http://dev.local:8025/](http://dev.local/)

### Directory structure
* projectname/
    * docker-setup/
        * services/ _(config files mounted as volumes)_
            * nginx
            * percona
            * phpfpm
        * src/
            * config_dev.php _(copy to ../../src/)_
    * src/ _(changed files that are synced into a fresh shop-installation)_
        * custom/plugins/.../
        * engine/Shopware/Plugins/.../
        * themes/Frontend/YourThemeName/