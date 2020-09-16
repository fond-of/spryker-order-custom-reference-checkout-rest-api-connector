<?php

namespace FondOfSpryker\Zed\OrderCustomReferenceCheckoutRestApi\Business;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\OrderCustomReferenceCheckoutRestApiConnector\Business\Mapper\OrderCustomReferenceQuoteMapperInterface;
use FondOfSpryker\Zed\OrderCustomReferenceCheckoutRestApiConnector\Business\OrderCustomReferenceCheckoutRestApiConnectorBusinessFactory;

class OrderCustomReferenceCheckoutRestApiConnectorBusinessFactoryTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\OrderCustomReferenceCheckoutRestApiConnector\Business\OrderCustomReferenceCheckoutRestApiConnectorBusinessFactory
     */
    protected $orderCustomReferenceCheckoutRestApiConnectorBusinessFactory;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->orderCustomReferenceCheckoutRestApiConnectorBusinessFactory = new OrderCustomReferenceCheckoutRestApiConnectorBusinessFactory();
    }

    /**
     * @return void
     */
    public function testCreateOrderCustomReferenceQuoteMapper(): void
    {
        $this->assertInstanceOf(
            OrderCustomReferenceQuoteMapperInterface::class,
            $this->orderCustomReferenceCheckoutRestApiConnectorBusinessFactory->createOrderCustomReferenceQuoteMapper()
        );
    }
}
