## Questions

1. In ​registration.php​, what types are allowed? 
    In vendor/magento/framework/Component/ComponentRegistrar.php
    there is a method validateType($type)
    ```
    /**#@+
     * Different types of components
     */
    const MODULE = 'module';
    const LIBRARY = 'library';
    const THEME = 'theme';
    const LANGUAGE = 'language';
    const SETUP = 'setup';
    /**#@- */


      private static function validateType($type)
        {
            if (!isset(self::$paths[$type])) {
                throw new \LogicException('\'' . $type . '\' is not a valid component type');
            }
        }

        
    ```
    
2. What happens if two modules have the same component name?
    in registration.php we use ComponentRegistrar::register(ComponentRegistrar::MODULE, 'Sacsi_Notes', __DIR__);
    so 1st check if it is a valid type and next it that module_name exist trow a new LogicException

    ```
        public static function register($type, $componentName, $path)
        {
            self::validateType($type);
            if (isset(self::$paths[$type][$componentName])) {
                throw new \LogicException(
                    ucfirst($type) . ' \'' . $componentName . '\' from \'' . $path . '\' '
                    . 'has been already defined in \'' . self::$paths[$type][$componentName] . '\'.'
                );
            }
            self::$paths[$type][$componentName] = str_replace('\\', '/', $path);
        }
    ```
3. What file contains this command -> bin/magento setup:upgrade
    searching by the string "setup:upgrade" at root level 

    ```
        grep -rin "setup:upgrade" --exclude-dir=*Test* --include=*.php

        setup/src/Magento/Setup/Console/Command/DbStatusCommand.php
        setup/src/Magento/Setup/Console/Command/ModuleConfigStatusCommand.php
        setup/src/Magento/Setup/Console/Command/AbstractModuleManageCommand.php
        [here] setup/src/Magento/Setup/Console/Command/UpgradeCommand.php
        vendor/magento/magento2-base/setup/src/Magento/Setup/Console/Command/DbStatusCommand.php
        vendor/magento/magento2-base/setup/src/Magento/Setup/Console/Command/ModuleConfigStatusCommand.php
        vendor/magento/magento2-base/setup/src/Magento/Setup/Console/Command/AbstractModuleManageCommand.php
        [here] vendor/magento/magento2-base/setup/src/Magento/Setup/Console/Command/UpgradeCommand.php
        vendor/magento/module-config/Console/Command/ConfigSetCommand.php
        vendor/magento/module-deploy/Console/Command/App/ConfigStatusCommand.php
        vendor/magento/module-deploy/Console/Command/App/SensitiveConfigSetCommand.php
        vendor/magento/module-deploy/Model/Plugin/ConfigChangeDetector.php
        vendor/magento/framework/Module/Plugin/DbStatusValidator.php

    ```


4. What file contains this command -> bin/magento setup:upgrade
    searching by the string "setup:upgrade" at root level 
    ```
        grep -rin "module.xml" --include=*.php --exclude-dir=*Test* --exclude-dir=*tests*

        vendor/magento/magento-composer-installer/src/MagentoHackathon/Composer/Magento/Deploystrategy/DeploystrategyAbstract.php
        vendor/magento/magento2-base/setup/src/Magento/Setup/Console/Command/DependenciesShowFrameworkCommand.php
        [here] vendor/magento/framework/Module/ModuleList/Loader.php
    ```