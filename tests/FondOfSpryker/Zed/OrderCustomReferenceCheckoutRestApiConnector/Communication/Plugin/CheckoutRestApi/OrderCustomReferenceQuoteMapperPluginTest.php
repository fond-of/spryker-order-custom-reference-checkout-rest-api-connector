<?php

namespace FondOfSpryker\Zed\OrderCustomReferenceCheckoutRestApi\Communication\Plugin\CheckoutRestApi;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\OrderCustomReferenceCheckoutRestApiConnector\Business\OrderCustomReferenceCheckoutRestApiConnectorFacade;
use FondOfSpryker\Zed\OrderCustomReferenceCheckoutRestApiConnector\Business\OrderCustomReferenceCheckoutRestApiConnectorFacadeInterface;
use FondOfSpryker\Zed\OrderCustomReferenceCheckoutRestApiConnector\Communication\Plugin\CheckoutRestApi\OrderCustomReferenceQuoteMapperPlugin;
use Generated\Shared\Transfer\QuoteTransfer;
use Generated\Shared\Transfer\RestCheckoutRequestAttributesTransfer;

class OrderCustomReferenceQuoteMapperPluginTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\OrderCustomReferenceCheckoutRestApiConnector\Communication\Plugin\CheckoutRestApi\OrderCustomReferenceQuoteMapperPlugin;
     */
    protected $orderCustomReferenceQuoteMapperPlugin;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\RestCompanyUnitAddressesRequestAttributesTransfer
     */
    protected $restCheckoutRequestAttributesTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\QuoteTransfer
     */
    protected $quoteTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\OrderCustomReferenceCheckoutRestApiConnector\Business\OrderCustomReferenceCheckoutRestApiConnectorFacade
     */
    protected $orderCustomReferenceCheckoutRestApiConnectorFacadeMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->orderCustomReferenceCheckoutRestApiConnectorFacadeMock = $this->getMockBuilder(OrderCustomReferenceCheckoutRestApiConnectorFacade::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->restCheckoutRequestAttributesTransferMock = $this->getMockBuilder(RestCheckoutRequestAttributesTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->quoteTransferMock = $this->getMockBuilder(QuoteTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->orderCustomReferenceQuoteMapperPlugin = new OrderCustomReferenceQuoteMapperPlugin();
        $this->orderCustomReferenceQuoteMapperPlugin->setFacade($this->orderCustomReferenceCheckoutRestApiConnectorFacadeMock);
    }

    /**
     * @return void
     */
    public function testMap(): void
    {
        $this->orderCustomReferenceCheckoutRestApiConnectorFacadeMock->expects($this->atLeastOnce())
            ->method('mapOrderCustomReferenceToQuote')
            ->with(
                $this->restCheckoutRequestAttributesTransferMock,
                $this->quoteTransferMock
            )->willReturn($this->quoteTransferMock);

        $this->assertInstanceOf(
            QuoteTransfer::class,
            $this->orderCustomReferenceQuoteMapperPlugin->map(
                $this->restCheckoutRequestAttributesTransferMock,
                $this->quoteTransferMock
            )
        );
    }
}
