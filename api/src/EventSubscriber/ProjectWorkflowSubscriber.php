<?php
// api/src/EventSubscriber/BookMailSubscriber.php

namespace App\EventSubscriber;

use ApiPlatform\Symfony\EventListener\EventPriorities;
use App\Entity\Project;
use App\Entity\Workflow;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use Symfony\Component\HttpKernel\KernelEvents;

final class ProjectWorkflowSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::VIEW => ['addWorkflow', EventPriorities::PRE_WRITE],
        ];
    }

    public function addWorkflow(ViewEvent $event): void
    {
        $project = $event->getControllerResult();
        $method = $event->getRequest()->getMethod();
        if (!$project instanceof Project || Request::METHOD_POST !== $method) {
            return;
        }

        $workflow = new Workflow();
        $workflow->setKind('internet');
        $project->setWorkflow($workflow);
        $event->setControllerResult($project);
    }
}