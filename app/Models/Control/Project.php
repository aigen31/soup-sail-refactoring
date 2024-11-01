<?php

namespace App\Models\Control;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use LogicException;
use Orchid\Filters\Filterable;
use Orchid\Filters\Types\Like;
use Orchid\Screen\AsSource;

class Project extends Model
{
  use HasFactory, AsSource, Filterable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = ['name', 'description', 'user_id', 'status_id', 'assistant_id'];

  protected $allowedSorts = ['id', 'name', 'created_at', 'updated_at'];

  protected $allowedFilters = [
    'name' => Like::class,
  ];

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function status()
  {
    return $this->hasMany(ProjectStatus::class);
  }

  public function validateStatus()
  {
    if ($this->status_id == 2) {
      throw new LogicException('This project is inactive');
    }
  }

  public function assistants()
  {
    return $this->belongsToMany(User::class, 'project_assistant', 'project_id', 'assistant_id');
  }
}
