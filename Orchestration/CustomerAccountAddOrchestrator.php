<?php
namespace NickSnellock\Orchestration;

class CustomerAccountAddOrchestrator implements OrchestratorInterface
{
    private $orchestratorDecorated;

    public static function build(array $orderData, $orchestrator) {

        $orchestrator = new self($orderData, $orchestrator);

        if (isset($orderData['contact'])) {
            $orchestrator = ContactAddOrchestrator::build($orderData['contact'], $orchestrator);
        }

        return $orchestrator;
    }

    public function __construct(array $data, OrchestratorInterface $orchestrator = null)
    {
        $this->orchestratorDecorated = $orchestrator;
    }

    public function validate(): bool
    {
        $this->orchestratorDecorated->validate();
        echo 'validation in customerAccount'.PHP_EOL;
        return true;
    }

    public function execute()
    {
        $this->orchestratorDecorated->execute();
        echo 'execute in customerAccount'.PHP_EOL;
    }

    public function notify()
    {
        $this->orchestratorDecorated->notify();
        echo 'notify in customerAccount'.PHP_EOL;
    }
}