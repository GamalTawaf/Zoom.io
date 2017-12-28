<?php
namespace Zoom;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model {
	protected $table = 'contacts';

    protected $fillable = ['message'];
    public function service(){
    	return $this->belongsTo('Zoom\Service', 'serviceId', 'id');
    } 
}

?>