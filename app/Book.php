<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model {
	protected $table = 'books';
	protected $fillable = array('name', 'description', 'publisher', 'author', 'edition', 'pages', 'published', 'posted', 'language', 'bookformat', 'booksize', 'image', 'book_fl');
}
