<?php
namespace Inkifi\Core\Plugin\Payment\Model\Method;
// 2018-07-05
final class Free {
	/**
	 * 2018-07-05
	 * Set the «Payment Complete» status to the orders paid by a discount code:
	 * https://github.com/inkifi/core/issues/1
	 * @see \Magento\Payment\Model\Method\Free::getConfigPaymentAction():
	 * 		return $this->getConfigData('order_status') == 'pending' ? null : parent::getConfigPaymentAction();
	 * https://github.com/magento/magento2/blob/2.2.0/app/code/Magento/Payment/Model/Method/Free.php#L121-L129   
	 * @used-by \Magento\Sales\Model\Order\Payment::place():
	 *	if ($action) {
	 *		if ($methodInstance->isInitializeNeeded()) {
	 *			<...>
	 *		}
	 *		else {
	 *			$orderState = Order::STATE_PROCESSING;
	 *			$this->processAction($action, $order);
	 *			$orderState = $order->getState() ? $order->getState() : $orderState;
	 *			$orderStatus = $order->getStatus() ? $order->getStatus() : $orderStatus;
	 *		}
	 *	}
	 * https://github.com/magento/magento2/blob/2.2.0/app/code/Magento/Sales/Model/Order/Payment.php#L354-L372
	 * @see \Magento\Sales\Model\Order\Payment::processAction():
	 *	switch ($action) {
	 *		case \Magento\Payment\Model\Method\AbstractMethod::ACTION_ORDER:
	 *			<...>
	 *		case \Magento\Payment\Model\Method\AbstractMethod::ACTION_AUTHORIZE:
	 *			<...>
	 *		case \Magento\Payment\Model\Method\AbstractMethod::ACTION_AUTHORIZE_CAPTURE:
	 *			<...>
	 *		default:
	 *			break;
	 *	}
	 * https://github.com/magento/magento2/blob/2.2.0/app/code/Magento/Sales/Model/Order/Payment.php#L424-L453
	 * We return an arbitrary non-standard value to pass the control flow to the `default` case
	 * of the `switch` in the @see \Magento\Sales\Model\Order\Payment::processAction() method.
	 * @return string
	 */
	function afterGetConfigPaymentAction() {return 'a non-standard value';}
}