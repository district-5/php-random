/**
* JetBrains Space Automation
* This Kotlin-script file lets you automate build activities
* For more info, see https://www.jetbrains.com/help/space/automation.html
*/

job("PHPUnit") {
    container("php:7.1.33-cli") {
        shellScript {
            content = """
                DEBIAN_FRONTEND=noninteractive apt-get update
                DEBIAN_FRONTEND=noninteractive apt-get install git zip unzip curl -y
                curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
                composer install
                ./vendor/bin/phpunit
            """
        }
    }
}
