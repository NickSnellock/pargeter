<h1>Instructions for use</H1>

1. Start an interactive php session `php -a` within the pargeter directory.
2. load the autoloader:
    ```include __DIR__.'/vendor/autoload.php';```
3. Create the orchestrator with an 'order' that has a customer account, with a contact and some orderlines:
    ```$orchestrator = NickSnellock\Orchestration\OrderAddOrchestrator::build(['customerAccount'=>['contact'=>[]], 'orderLines'=>[]]);```
4. running `$orchestrator->validate()` will then show the order that the validation occurs in.

You can also use `$orchestrator->execute()` or `$orchestrator->notify()`

