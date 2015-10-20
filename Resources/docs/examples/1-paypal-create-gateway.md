# 1. Paypal. Create Gateway. 

```php
<?php

use Payum\Paypal\ExpressCheckout\PaypalExpressCheckoutGatewayFactory;

$factory = new PaypalExpressCheckoutGatewayFactory();

$gateway = $factory->create(array(
    'username' => 'aUsername',
    'password' => 'aPassword',
    'signature' => 'aSignature',
    'sandbox' => true,
));
```

Back to [examples](examples/index.md).
Back to [index](https://github.com/Payum/Core/tree/master/Resources/docs/index.md).
