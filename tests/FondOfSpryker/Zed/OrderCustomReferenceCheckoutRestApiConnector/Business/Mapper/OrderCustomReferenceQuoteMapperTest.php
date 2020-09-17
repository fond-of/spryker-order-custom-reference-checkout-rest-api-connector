<?php

namespace FondOfSpryker\Zed\CompanyUnitAddressesRestApiConnector\Business\CompanyUnitAddress;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\OrderCustomReferenceCheckoutRestApiConnector\Business\Mapper\OrderCustomReferenceQuoteMapper;
use FondOfSpryker\Zed\OrderCustomReferenceCheckoutRestApiConnector\Business\Mapper\OrderCustomReferenceQuoteMapperInterface;
use Generated\Shared\Transfer\QuoteTransfer;
use Generated\Shared\Transfer\RestCheckoutRequestAttributesTransfer;

class OrderCustomReferenceQuoteMapperTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\OrderCustomReferenceCheckoutRestApiConnector\Business\Mapper\OrderCustomReferenceQuoteMapper
     */
    protected $orderCustomReferenceQuoteMapper;

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
        $this->restCheckoutRequestAttributesTransferMock = $this->getMockBuilder(RestCheckoutRequestAttributesTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->restCompanyUnitAddressesRequestAttributesTransferMock = $this->getMockBuilder(RestCompanyUnitAddressesRequestAttributesTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->quoteTransferMock = $this->getMockBuilder(QuoteTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->orderCustomReferenceQuoteMapper = new OrderCustomReferenceQuoteMapper();
    }

    /**
     * @return void
     */
    public function testMapOrderCustomReferenceToQuote(): void
    {
        $orderCustomReference = 'custom reference';
        $this->restCheckoutRequestAttributesTransferMock->expects($this->atLeastOnce())
            ->method('getOrderCustomReference')
            ->willReturn($orderCustomReference);

        $this->assertInstanceOf(
            QuoteTransfer::class,
            $this->orderCustomReferenceQuoteMapper->mapOrderCustomReferenceToQuote(
                $this->restCheckoutRequestAttributesTransferMock,
                $this->quoteTransferMock
            )
        );
    }
}
