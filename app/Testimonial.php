<?php
namespace Zoom;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model {
	protected $table = 'testimonials';

    protected $fillable = ['text'];
}

?>