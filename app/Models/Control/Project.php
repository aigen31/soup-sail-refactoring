<?php

namespace App\Models\Control;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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
	protected $fillable = ['name', 'description'];

	protected $allowedSorts = ['id', 'name', 'created_at', 'updated_at'];

	protected $allowedFilters = [
		'name' => Like::class,
	];
}
