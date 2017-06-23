<?php

namespace ITOportunidades;

use Illuminate\Database\Eloquent\Model;

class ApplicationStatus extends Model
{
    protected $table = "application_status";

    protected $fillable = ['code','name'];
}
