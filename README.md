# docker setup by netshops

## Setup

1. Navigate to your projects root
2. Execute ``git clone git@gitlab.netshops-system.com:docker-images/docker-setup.git``
3. Navigate to the created folder with ``cd docker-setup/``
4. Adjust the shopware release url in ``docker-compose.yml``
5. Execute ``docker-compose pull`` to get the newest images
6. Change ``FULL_WIPE_ON_REBOOT`` in ``docker-compose.yml`` to ``"false"`` if you dont need the installation wizard.
7. Execute ``docker-compose up``
8. If needed run your setup and change ``FULL_WIPE_ON_REBOOT`` in ``docker-compose.yml`` to ``"true"`` afterwards. Alternatively you can just import an SQL dump.
9. Open [http://dev.local/](http://dev.local/) in your browser.