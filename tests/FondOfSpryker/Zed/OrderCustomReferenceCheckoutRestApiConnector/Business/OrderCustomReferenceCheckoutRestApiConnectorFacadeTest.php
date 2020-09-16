<?php

namespace FondOfSpryker\Zed\OrderCustomReferenceCheckoutRestApi\Business;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\OrderCustomReferenceCheckoutRestApiConnector\Business\Mapper\OrderCustomReferenceQuoteMapperInterface;
use FondOfSpryker\Zed\OrderCustomReferenceCheckoutRestApiConnector\Business\OrderCustomReferenceCheckoutRestApiConnectorBusinessFactory;
use FondOfSpryker\Zed\OrderCustomReferenceCheckoutRestApiConnector\Business\OrderCustomReferenceCheckoutRestApiConnectorFacade;
use Generated\Shared\Transfer\QuoteTransfer;
use Generated\Shared\Transfer\RestCheckoutRequestAttributesTransfer;

class OrderCustomReferenceCheckoutRestApiConnectorFacadeTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\OrderCustomReferenceCheckoutRestApiConnector\Business\OrderCustomReferenceCheckoutRestApiConnectorFacade
     */
    protected $orderCustomReferenceCheckoutRestApiConnectorFacade;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\OrderCustomReferenceCheckoutRestApiConnector\Business\OrderCustomReferenceCheckoutRestApiConnectorBusinessFactory
     */
    protected $orderCustomReferenceCheckoutRestApiConnectorRestApiBusinessFactoryMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\OrderCustomReferenceCheckoutRestApiConnector\Business\Mapper\OrderCustomReferenceQuoteMapperInterface
     */
    protected $orderCustomReferenceQuoteMapperMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\RestCompanyUnitAddressesRequestAttributesTransfer
     */
    protected $restCheckoutRequestAttributesTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\QuoteTransfer
     */
    protected $quoteTransferMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->orderCustomReferenceCheckoutRestApiConnectorRestApiBusinessFactoryMock = $this->getMockBuilder(OrderCustomReferenceCheckoutRestApiConnectorBusinessFactory::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->orderCustomReferenceQuoteMapperMock = $this->getMockBuilder(OrderCustomReferenceQuoteMapperInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->restCheckoutRequestAttributesTransferMock = $this->getMockBuilder(RestCheckoutRequestAttributesTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->quoteTransferMock = $this->getMockBuilder(QuoteTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->orderCustomReferenceCheckoutRestApiConnectorFacade = new OrderCustomReferenceCheckoutRestApiConnectorFacade();
        $this->orderCustomReferenceCheckoutRestApiConnectorFacade->setFactory($this->orderCustomReferenceCheckoutRestApiConnectorRestApiBusinessFactoryMock);
    }

    /**
     * @return void
     */
    public function testMapOrderCustomReferenceToQuote(): void
    {
        $this->orderCustomReferenceCheckoutRestApiConnectorRestApiBusinessFactoryMock->expects($this->atLeastOnce())
            ->method('createOrderCustomReferenceQuoteMapper')
            ->willReturn($this->orderCustomReferenceQuoteMapperMock);

        $this->orderCustomReferenceQuoteMapperMock->expects($this->atLeastOnce())
            ->method('mapOrderCustomReferenceToQuote')
            ->with(
                $this->restCheckoutRequestAttributesTransferMock,
                $this->quoteTransferMock
            )
            ->willReturn($this->quoteTransferMock);

        $this->assertInstanceOf(
            QuoteTransfer::class,
            $this->orderCustomReferenceCheckoutRestApiConnectorFacade->mapOrderCustomReferenceToQuote(
                $this->restCheckoutRequestAttributesTransferMock,
                $this->quoteTransferMock
            )
        );
    }
    
}
