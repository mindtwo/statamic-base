<?php

class StarterKitPostInstall
{
    private $console;
    private $replacements = [];

    public function handle($console)
    {
        $this->console = $console;
        
        // Step 1: Handle replacements
        $this->handleReplacements();
        
        // Step 2: Additional setup tasks
        $this->runAdditionalTasks();
        
        // Step 3: Show completion message
        $this->showCompletionMessage();
    }

    private function handleReplacements()
    {
        $this->collectReplacements();
        $this->applyReplacements();
    }

    private function collectReplacements()
    {
        // Collect domain replacement
        $domain = $this->console->ask('What is your project domain? (e.g., example.com without protocol)');
        if ($domain) {
            $this->replacements['{{DOMAIN}}'] = $domain;
        }

        // Add more replacements here as needed
        // $appName = $this->console->ask('What is your app name?');
        // if ($appName) {
        //     $this->replacements['{{APP_NAME}}'] = $appName;
        // }
    }

    private function applyReplacements()
    {
        if (empty($this->replacements)) {
            return;
        }

        $filesToProcess = [
            'Envoy.config.php',
            // Add more files here as needed
        ];

        foreach ($filesToProcess as $file) {
            if (file_exists($file)) {
                $this->processFile($file);
            }
        }
    }

    private function processFile($filePath)
    {
        $content = file_get_contents($filePath);
        $originalContent = $content;

        foreach ($this->replacements as $placeholder => $replacement) {
            $content = str_replace($placeholder, $replacement, $content);
        }

        if ($content !== $originalContent) {
            file_put_contents($filePath, $content);
            $this->console->line("✓ Updated placeholders in {$filePath}");
        }
    }

    private function runAdditionalTasks()
    {
        // Future: Additional setup tasks can go here
        // $this->setupDatabase();
        // $this->configureServices();
        // $this->optimizeFiles();
    }

    private function showCompletionMessage()
    {
        $this->console->line('');
        $this->console->line('🎉 <info>mindtwo Statamic Base installed successfully!</info>');
        $this->console->line('');
        $this->console->line('Next steps:');
        $this->console->line('1. Configure your .env file with database credentials');
        
        if ($this->hasEloquentDriver()) {
            $this->console->line('2. Run: <comment>php artisan migrate</comment>');
            $this->console->line('3. Run: <comment>php artisan statamic:eloquent:import-all</comment>');
            $this->console->line('4. Install frontend dependencies: <comment>npm install</comment>');
            $this->console->line('5. Create admin user: <comment>php artisan statamic:user:create</comment>');
        } else {
            $this->console->line('2. Install frontend dependencies: <comment>npm install</comment>');
            $this->console->line('3. Create admin user: <comment>php artisan statamic:user:create</comment>');
        }
        
        $this->console->line('6. Start development: <comment>npm run dev</comment>');
        $this->console->line('');
        $this->console->line('Happy coding! 🚀');
    }

    private function hasEloquentDriver(): bool
    {
        return file_exists('config/statamic/eloquent-driver.php');
    }
}