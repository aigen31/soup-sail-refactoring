<?php

namespace App\Notifications\Control\Project;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Orchid\Platform\Notifications\DashboardChannel;
use Orchid\Platform\Notifications\DashboardMessage;

class OrchidProjectCreateNotification extends Notification
{
  use Queueable;

  protected $project;

  /**
   * Create a new notification instance.
   */
  public function __construct($project)
  {
    $this->project = $project;
  }

  /**
   * Get the notification's delivery channels.
   *
   * @return array<int, string>
   */
  public function via(object $notifiable): array
  {
    return [DashboardChannel::class];
  }

  public function toDashboard($notifiable)
  {
    return (new DashboardMessage)
      ->title('Project "'.$this->project->name.'" Created')
      ->message('Project "'.$this->project->name.'" Created')
      ->action(url('/'));
  }
}
