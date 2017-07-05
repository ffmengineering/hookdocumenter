#Magento 1 observers

Use the following syntax for documenting an observer method

```php
<?php

class Ffm_Dummy_Model_Observers_Order
{

    /**
     * We set a foo variable in the order before savind since every order needs that. Dûh.
     *
     * @param Varien_Event_Observer $observer
     * @event sales_order_save_before
     * @return $this
     */
    public function setAFooVariableBeforeSave(Varien_Event_Observer $observer)
    {
        $order = $observer->getOrder();
        $order->setData('foo', 'bar');

        return $this;
    }
}
```

Output:
- **Event**: sales_order_save_before
- **Location**: Ffm_Dummy::setAFooVariableBeforeSave + a link to the given repo
- **Description**: `We set a foo variable in the order before savind since every order needs that. Dûh.`