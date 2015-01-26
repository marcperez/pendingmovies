<?php

use Codesleeve\Stapler\ORM\StaplerableInterface;
use Codesleeve\Stapler\ORM\EloquentTrait;
use Intervention\Image\ImageManager;

class Movie extends \Eloquent implements StaplerableInterface {
	use EloquentTrait;

	// Add your validation rules here
	public static $rules = [
		'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ['title', 'plot', 'genre', 'released_on', 'imdbRating', 'poster'];

    public function __construct(array $attributes = array()) {
        $this->hasAttachedFile('poster', [
            'styles' => [
            'medium' => '500x300',
            'thumb' => '200x100'
            ],
            'url' => '/uploads/:attachment/:id//:style/:filename'
        ]);

        parent::__construct($attributes);
    }

}