<?php
use Carbon\Carbon;
use App\Model\One;
use App\Model\Article;
function getarticle($article_id)
{
    $row = Article::find($article_id);
    return $row->title;  
}