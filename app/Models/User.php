<?php

namespace App\Models;

use App\Models\Control\Project;
use App\Models\Control\Role;
use App\Orchid\Presenters\UserPresenter;
use App\Traits\Control\Permissions\HasPermissionsTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use Orchid\Filters\Filterable;
use Orchid\Filters\Types\Like;
use Orchid\Filters\Types\Where;
use Orchid\Filters\Types\WhereDateStartEnd;
use Orchid\Metrics\Chartable;
use Orchid\Platform\Models\User as Authenticatable;
use Orchid\Screen\AsSource;

class User extends Authenticatable
{
  use AsSource, Chartable, Filterable, HasFactory, Notifiable, HasPermissionsTrait, HasApiTokens;

  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'users';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'name',
    'email',
    'password',
    'assistant_id',
    // 'permissions',
  ];

  /**
   * The attributes excluded from the model's JSON form.
   *
   * @var array
   */
  protected $hidden = [
    'password',
    'remember_token',
    // 'permissions',
  ];

  /**
   * The attributes that should be cast to native types.
   *
   * @var array
   */
  protected $casts = [
    // 'permissions'          => 'array',
    'email_verified_at'    => 'datetime',
  ];

  /**
   * The attributes for which you can use filters in url.
   *
   * @var array
   */
  protected $allowedFilters = [
    'id'         => Where::class,
    'name'       => Like::class,
    'email'      => Like::class,
    'updated_at' => WhereDateStartEnd::class,
    'created_at' => WhereDateStartEnd::class,
  ];

  /**
   * The attributes for which can use sort in url.
   *
   * @var array
   */
  protected $allowedSorts = [
    'id',
    'name',
    'email',
    'updated_at',
    'created_at',
  ];

  /**
   * Throw an exception if email already exists, create admin user.
   *
   * @throws \Throwable
   */
  public static function createAdmin(string $name, string $email, string $password): void
  {
    throw_if(static::where('email', $email)->exists(), 'User exists');

    static::create([
      'name'        => $name,
      'email'       => $email,
      'password'    => Hash::make($password),
      // 'permissions' => new Dashboard::getAllowAllPermission(),
    ]);
  }

  /**
   * @return UserPresenter
   */
  public function presenter()
  {
    return new UserPresenter($this);
  }

  public function role()
  {
    return $this->belongsTo(Role::class, 'role_id');
  }

  public function projects() {
    return $this->hasMany(Project::class);
  }

  public function assistantProject() {
    return $this->belongsToMany(Project::class, 'project_assistant', 'assistant_id', 'project_id');
  }
}
