<?php
namespace DigiTickets\Orchestration;

class ContactAddOrchestrator implements OrchestratorInterface
{
    private $orchestratorDecorated;

    public static function build(array $orderData, $orchestrator) {

        $orchestrator = new self($orderData, $orchestrator);

        return $orchestrator;
    }

    public function __construct(array $data, OrchestratorInterface $orchestrator = null)
    {
        $this->orchestratorDecorated = $orchestrator;
    }

    public function validate(): bool
    {
        $this->orchestratorDecorated->validate();
        echo 'validation in contact'.PHP_EOL;
        return true;
    }

    public function execute()
    {
        $this->orchestratorDecorated->execute();
        echo 'execute in contact'.PHP_EOL;
    }

    public function notify()
    {
        $this->orchestratorDecorated->notify();
        echo 'notify in contact'.PHP_EOL;
    }
}
