<?php

namespace App\Model\Article;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'article';
    protected $primaryKey = 'article_id';

    protected $fillable = [
        'article_id', 'title', 'description', 'status', 'created_by', 'updated_by', 'publish_date', 'attach_file'
    ];


    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
