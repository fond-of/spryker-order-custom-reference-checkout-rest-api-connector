<?php

namespace FondOfSpryker\Zed\OrderCustomReferenceCheckoutRestApiConnector\Business;

use FondOfSpryker\Zed\OrderCustomReferenceCheckoutRestApiConnector\Business\Mapper\OrderCustomReferenceQuoteMapper;
use FondOfSpryker\Zed\OrderCustomReferenceCheckoutRestApiConnector\Business\Mapper\OrderCustomReferenceQuoteMapperInterface;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

class OrderCustomReferenceCheckoutRestApiConnectorRestApiBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @return \FondOfSpryker\Zed\OrderCustomReferenceRestApi\Business\Mapper\OrderCustomReferenceQuoteMapperInterface
     */
    public function createOrderCustomReferenceQuoteMapper(): OrderCustomReferenceQuoteMapperInterface
    {
        return new OrderCustomReferenceQuoteMapper();
    }
}
