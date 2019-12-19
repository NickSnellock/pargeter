<?php
namespace NickSnellock\Orchestration;


class OrderAddOrchestrator implements OrchestratorInterface
{
    private $orderData;

    public static function build(array $orderData) {

        $orchestrator = new OrderAddOrchestrator($orderData);

        if (isset($orderData['customerAccount'])) {
            $orchestrator = CustomerAccountAddOrchestrator::build($orderData['customerAccount'], $orchestrator);
        }

        if (isset($orderData['orderLines'])) {
            $orchestrator = OrderLinesAddOrchestrator::build($orderData['orderLines'], $orchestrator);
        }

        return $orchestrator;
    }

    public function __construct(array $orderData, OrchestratorInterface $orchestratorToDecorate = null) {
        $this->orderData = $orderData;
    }

    public function validate(): bool
    {
        echo 'Validating in order orchestrator'.PHP_EOL;
        return true;
    }

    public function execute()
    {
        echo 'execute in order orchestrator'.PHP_EOL;
    }

    public function notify()
    {
        echo 'notify in order orchestrator'.PHP_EOL;
    }

    /**
     * @return array
     */
    public function getOrderData(): array
    {
        return $this->orderData;
    }
}
