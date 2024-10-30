![Alt text](images/recurring_stack_logo-whitebg.png?raw=true "Title")

# recurringstack-php
This repository houses the official php client for the RecurringStack™ API. Create and manage account, subscriptions, products, support tickets, and more.

Documentation for the RecurringStack™ API can be found at https://recurringstack.com/docs.

## Requirements
 PHP 7 or later

 guzzle/guzzle (dependency) 

## Composer
We recommend using Composer to install the bindings.
```bash
composer require recurringstack/recurringstack-php
```
Don't forget to include Composers autoload at the top of your project/script.

```php
require_once 'vendor/autoload.php';
```

## Creating a Client and Authenticating 
```php
$rs = new recurringstack\api([
  'key' => "rs_key_....",
  'user_key' => "rs_user_....",
  'brand_id' => "",
  'response_format' => 'xml', //xml or json
  'response_type' => 'clean' //empty or clean (returns results as object)
]);
```

## Error Handling & Exceptions
The RecurringStack™ API client includes custom error handling methods.
```php
try { 

    # Delete a customer account
    $rs->deleteAccount('8247cf79-9296-4372-b39c-6370c70372ee');

} catch (recurringstack\apiException $e) { 

    /* The following custom error handling functions are available /*

    $debug = debugError(); //Return the exception message, code, request, and the response as an object. Great for debugging!
    $errorObj = $e->errorAsObject(); //Return the code and message in an object
    $errorMesage = getExceptionMessage(); //Return just the message
    $errorCode = getExceptionCode(); //Return just the code

    }
```

## Usage Examples

```php
# List one or multiple customer accounts
$rs->listAccount(array('customer_account_id' => '8247cf79-9296-4372-b39c-6370c70372ee'))
```
```php
# Delete a customer account
$rs->deleteAccount('8247cf79-9296-4372-b39c-6370c70372ee');
```
```php
# Create a new subscription for a customer
$subConfig = array(
  "customer_account_id" => '8247cf79-9296-4372-b39c-6370c70372ee',
  "product_id" => "",
  "auto_pay" => "",
  "override_initial_billing" => ""
);

$rs->createSubscription($subConfig);
```
```php
# Manually create an invoice for a customer
$invoiceConfig = array(
 "attached_items" => '[{"item_name":"Programming Services Base Charge","item_price":"25.00","tax_exempt":"N"},{"item_name":"25 Hours of Programming","item_price":"250.00","tax_exempt":"Y"}]',
 "custom_field_1" => '',
 "custom_field_2" => ''
);

$rs->createInvoice($invoiceConfig);
```

NOTE: We recommend wrapping your code in a try block as all errors returned locally or from the API will be returned as exceptions

## Contributing

Pull requests are welcome. For major changes, please open an issue first
to discuss what you would like to change.

## License

[MIT](https://choosealicense.com/licenses/mit/)