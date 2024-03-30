A custom module for [inkifi.com](https://inkifi.com) (Magento 2).

## How to install
```
bin/magento maintenance:enable
rm -rf composer.lock
composer clear-cache
composer require inkifi/core:*
bin/magento setup:upgrade
rm -rf var/di var/generation generated/code && bin/magento setup:di:compile
rm -rf pub/static/* && bin/magento setup:static-content:deploy -f en_US en_GB --area adminhtml --theme Magento/backend && bin/magento setup:static-content:deploy -f en_US en_GB --area frontend --theme Infortis/ultimo
bin/magento maintenance:disable
bin/magento cache:enable
```

## How to upgrade
```
bin/magento maintenance:enable
rm -rf composer.lock
composer clear-cache
composer update inkifi/core
bin/magento setup:upgrade
rm -rf var/di var/generation generated/code && bin/magento setup:di:compile
rm -rf pub/static/* && bin/magento setup:static-content:deploy -f en_US en_GB --area adminhtml --theme Magento/backend && bin/magento setup:static-content:deploy -f en_US en_GB --area frontend --theme Infortis/ultimo
bin/magento maintenance:disable
bin/magento cache:enable
```
