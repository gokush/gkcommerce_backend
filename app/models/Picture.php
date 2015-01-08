<?php
/**
 * Created by PhpStorm.
 * User: goku
 * Date: 1/8/15
 * Time: 2:28 PM
 */

class Picture extends Eloquent
{
    protected $table = "pictures";

    protected $fillable = array("url", "foreign_id", "type", "description");
}