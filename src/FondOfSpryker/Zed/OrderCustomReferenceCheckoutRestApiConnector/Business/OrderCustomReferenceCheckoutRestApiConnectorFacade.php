<?php

namespace FondOfSpryker\Zed\OrderCustomReferenceCheckoutRestApiConnector\Business;

use FondOfSpryker\Zed\OrderCustomReferenceRestApi\Business\OrderCustomReferenceRestApiFacadeInterface;
use Generated\Shared\Transfer\QuoteTransfer;
use Generated\Shared\Transfer\RestCheckoutRequestAttributesTransfer;
use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method \FondOfSpryker\Zed\OrderCustomReferenceCheckoutRestApiConnector\Business\OrderCustomReferenceCheckoutRestApiConnectorBusinessFactory getFactory()
 */
class OrderCustomReferenceCheckoutRestApiConnectorFacade extends AbstractFacade implements OrderCustomReferenceCheckoutRestApiConnectorFacadeInterface
{

    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\RestCheckoutRequestAttributesTransfer $restCheckoutRequestAttributesTransfer
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return \Generated\Shared\Transfer\QuoteTransfer
     */
    public function mapOrderCustomReferenceToQuote(
        RestCheckoutRequestAttributesTransfer $restCheckoutRequestAttributesTransfer,
        QuoteTransfer $quoteTransfer
    ): QuoteTransfer {
        return $this->getFactory()
            ->createOrderCustomReferenceQuoteMapper()
            ->mapOrderCustomReferenceToQuote($restCheckoutRequestAttributesTransfer, $quoteTransfer);
    }
}
