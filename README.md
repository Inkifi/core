A custom module for [inkifi.com](https://inkifi.com).

## How to install
```
composer require inkifi/core:*
bin/magento setup:upgrade
rm -rf pub/static/* && bin/magento setup:static-content:deploy en_US en_GB
rm -rf var/di var/generation generated/code && bin/magento setup:di:compile
```
If you have problems with these commands, please check the [detailed instruction](https://mage2.pro/t/263).