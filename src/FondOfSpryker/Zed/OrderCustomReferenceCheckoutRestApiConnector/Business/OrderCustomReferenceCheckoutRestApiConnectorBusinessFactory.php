<?php

namespace FondOfSpryker\Zed\OrderCustomReferenceCheckoutRestApiConnector\Business;

use FondOfSpryker\Zed\OrderCustomReferenceCheckoutRestApiConnector\Business\Mapper\OrderCustomReferenceQuoteMapper;
use FondOfSpryker\Zed\OrderCustomReferenceCheckoutRestApiConnector\Business\Mapper\OrderCustomReferenceQuoteMapperInterface;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

class OrderCustomReferenceCheckoutRestApiConnectorBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @return \FondOfSpryker\Zed\OrderCustomReferenceCheckoutRestApiConnector\Business\Mapper\OrderCustomReferenceQuoteMapperInterface
     */
    public function createOrderCustomReferenceQuoteMapper(): OrderCustomReferenceQuoteMapperInterface
    {
        return new OrderCustomReferenceQuoteMapper();
    }
}
