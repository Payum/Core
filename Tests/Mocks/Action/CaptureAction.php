<?php
namespace Payum\Core\Tests\Mocks\Action;

use Payum\Core\Action\PaymentAwareAction;
use Payum\Core\Tests\Mocks\Model\AuthorizeRequiredModel;
use Payum\Core\Request\Capture;
use Payum\Core\Tests\Mocks\Request\AuthorizeRequest;

class CaptureAction extends PaymentAwareAction
{
    /**
     * {@inheritdoc}
     */
    public function execute($request)
    {   
        /** @var $request Capture */
        if ($request->getModel() instanceof AuthorizeRequiredModel) {
            $this->payment->execute(new AuthorizeRequest);
        }
        
        //sell code here.
    }

    /**
     * {@inheritdoc}
     */
    public function supports($request)
    {
        return $request instanceof Capture;
    }
}
