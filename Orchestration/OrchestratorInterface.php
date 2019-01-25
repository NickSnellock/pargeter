<?php

namespace DigiTickets\Orchestration;

interface OrchestratorInterface
{
    public function __construct(array $data, OrchestratorInterface $orchestratorToDecorate = null);

    public function validate(): bool;

    public function execute();

    public function notify();
}