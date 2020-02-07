### KUMPULAN script utk automated testing
# copas script yang diperlukan

# drop database testing
## php artisan --env=testing migrate:fresh --env=testing

### individual unit test
## php artisan --env=testing db:seed --class=MasterunitTableSeeder
## ./vendor/bin/codecept run unit tests/Unit/Model_UnitTest.php

## php artisan --env=testing db:seed --class=UserTableSeeder
## ./vendor/bin/codecept run unit tests/Unit/Model_UserTest.php
