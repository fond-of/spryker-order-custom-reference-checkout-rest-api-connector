<?php

namespace FondOfSpryker\Zed\OrderCustomReferenceCheckoutRestApiConnector\Business\Mapper;

use Generated\Shared\Transfer\QuoteTransfer;
use Generated\Shared\Transfer\RestCheckoutRequestAttributesTransfer;

class OrderCustomReferenceQuoteMapper implements OrderCustomReferenceQuoteMapperInterface
{
    /**
     * @param \Generated\Shared\Transfer\RestCheckoutRequestAttributesTransfer $restCheckoutRequestAttributesTransfer
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return \Generated\Shared\Transfer\QuoteTransfer
     */
    public function mapOrderCustomReferenceToQuote(
        RestCheckoutRequestAttributesTransfer $restCheckoutRequestAttributesTransfer,
        QuoteTransfer $quoteTransfer
    ): QuoteTransfer {
        $orderCustomReference = $restCheckoutRequestAttributesTransfer->getOrderCustomReference();

        if ($orderCustomReference === null ||  $orderCustomReference === '') {
            return $quoteTransfer;
        }

        $quoteTransfer
            ->setOrderCustomReference($restCheckoutRequestAttributesTransfer->getOrderCustomReference());

        return $quoteTransfer;
    }
}
