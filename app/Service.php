<?php
namespace Zoom;

use Illuminate\Database\Eloquent\Model;

class Service extends Model {
	protected $table = 'services';

    protected $fillable = ['name'];
}

?>