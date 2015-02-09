<?php
class Nat_Quantity_Block_Product_List extends Mage_Catalog_Block_Product_List {
    /**
     * Get default qty - either as preconfigured, or as 1.
     * Also restricts it by minimal qty.
     *
     * @param null|Mage_Catalog_Model_Product
     *
     * @return int|float
     */
    public function getProductDefaultQty($product)
    {
        $qty = $this->getMinimalQty($product);
        $config = $product->getPreconfiguredValues();
        $configQty = $config->getQty();
        if ($configQty > $qty) {
            $qty = $configQty;
        }

        return $qty;
    }
}