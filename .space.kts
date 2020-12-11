/**
* JetBrains Space Automation
* This Kotlin-script file lets you automate build activities
* For more info, see https://www.jetbrains.com/help/space/automation.html
*/

job("PHPUnit") {
    container("ubuntu") {
        shellScript {
            content = """
                DEBIAN_FRONTEND=noninteractive
                DEBIAN_FRONTEND=noninteractive apt-get update
                DEBIAN_FRONTEND=noninteractive apt-get install git zip unzip php-cli php-xml php-mbstring curl -y
                curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
                composer install
                ./vendor/bin/phpunit
            """
        }
    }
}
