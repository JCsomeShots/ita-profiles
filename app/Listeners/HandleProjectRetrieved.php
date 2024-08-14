<?php

namespace App\Listeners;

use App\Events\ProjectRetrieved;
use App\Service\Project\GitHubProjectsService;
use App\Service\Project\ProcessedProjectsService;
use App\Service\Resume\ResumeService;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Log;

class HandleProjectRetrieved
{
    private GitHubProjectsService $gitHubProjectsService;
    private ProcessedProjectsService $processedProjectsService;
    private ResumeService $resumeService;

    // Create the event listener.
    public function __construct(GitHubProjectsService $gitHubProjectsService, ResumeService $resumeService)
    {
        $this->gitHubProjectsService = $gitHubProjectsService;
        $this->resumeService = $resumeService;
    }

    // Handle the event.
    public function handle(ProjectRetrieved $event): void
    {
        $project = $event->project;

        try {
            // We don't want to process the project if updated_at is less than 1 hour ago
            $resume = $this->resumeService->getResumeByProjectId($project->id);
            $minutesBetweenUpdates = 60;
            if ($resume->updated_at->diffInMinutes(now()) < $minutesBetweenUpdates) {
                Log::info("Resume ID: {$resume->id} skipped because it was updated less than {$minutesBetweenUpdates} minutes ago.");
                return;
            }
        } catch (Exception $e) {
            Log::error("Error retrieving Resume: º" . $e->getMessage());
        }

        try {
            $gitHubUsername = $this->gitHubProjectsService->getGitHubUsername($project);
        } catch (Exception $e) {
            Log::error("Error retrieving GitHub username: " . $e->getMessage());
            return;
        }

        try {
            $repos = $this->gitHubProjectsService->fetchGitHubRepos($gitHubUsername);
            Log::info("GitHub Repos fetched for: " . $gitHubUsername);
            $projects = $this->gitHubProjectsService->saveRepositoriesAsProjects($repos);
            Log::info("Projects saved for: " . $gitHubUsername);
            $this->resumeService->saveProjectsInResume($projects, $gitHubUsername);
            Log::info("Projects saved in Resume for: " . $gitHubUsername);
        } catch (Exception $e) {
            Log::error("Error executing Logic: " . $e->getMessage());
        }
    }

}
