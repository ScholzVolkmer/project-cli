<?php

return [
    new \Chriha\ProjectCLI\Commands\Docker\ComposeCommand(),
    new \Chriha\ProjectCLI\Commands\Docker\DownCommand(),
    new \Chriha\ProjectCLI\Commands\Docker\ExecCommand(),
    new \Chriha\ProjectCLI\Commands\Docker\LogsCommand(),
    new \Chriha\ProjectCLI\Commands\Docker\RestartCommand(),
    new \Chriha\ProjectCLI\Commands\Docker\ShellCommand(),
    new \Chriha\ProjectCLI\Commands\Docker\StatusCommand(),
    new \Chriha\ProjectCLI\Commands\Docker\TopCommand(),
    new \Chriha\ProjectCLI\Commands\Docker\UpCommand(),
    new \Chriha\ProjectCLI\Commands\Logs\ClearCommand(),
    new \Chriha\ProjectCLI\Commands\Logs\TailCommand(),
    new \Chriha\ProjectCLI\Commands\Make\CommandCommand(),
    new \Chriha\ProjectCLI\Commands\Make\PluginCommand(),
    new \Chriha\ProjectCLI\Commands\Make\ReleaseCommand(),
    new \Chriha\ProjectCLI\Commands\Node\NodeCommand(),
    new \Chriha\ProjectCLI\Commands\Node\NpmCommand(),
    new \Chriha\ProjectCLI\Commands\Php\CheckPackageSecurityCommand(),
    new \Chriha\ProjectCLI\Commands\Php\ComposerCommand(),
    new \Chriha\ProjectCLI\Commands\Php\PhpCommand(),
    new \Chriha\ProjectCLI\Commands\Php\TestCommand(),
    new \Chriha\ProjectCLI\Commands\Php\XdebugCommand(),
    new \Chriha\ProjectCLI\Commands\Plugins\InstallCommand(),
    new \Chriha\ProjectCLI\Commands\Plugins\ListCommand(),
    new \Chriha\ProjectCLI\Commands\Plugins\SearchCommand(),
    new \Chriha\ProjectCLI\Commands\Plugins\UninstallCommand(),
    new \Chriha\ProjectCLI\Commands\Plugins\UpdateCommand(),
    new \Chriha\ProjectCLI\Commands\ProjectCLI\CloneCommand(),
    new \Chriha\ProjectCLI\Commands\ProjectCLI\ConfigCommand(),
    new \Chriha\ProjectCLI\Commands\ProjectCLI\HostsCommand(),
    new \Chriha\ProjectCLI\Commands\ProjectCLI\CreateCommand(),
    new \Chriha\ProjectCLI\Commands\ProjectCLI\SelfUpdateCommand(),
    new \Chriha\ProjectCLI\Commands\ProjectCLI\VersionCommand(),
    new \Chriha\ProjectCLI\Commands\Ssh\ConfigCommand(),
];
