<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Kyslik\ColumnSortable\Sortable;

class Book extends Model
{

    //sita kodo eilute nera butina, priklauso nuo ar modelis sia eilute turi,
    //pagal numatytus nustatymus sita eilute jau yra modelyje
    protected $table = 'books';

    use Sortable;

    // galima redaguoti tiktai varda ir pavarde, ID neredeguojame
    protected $fillable = ['title', 'isbn', 'pages', 'about', 'author_id'];

    // rikiuoti galime pagal id, varda, pavarde
    public $sortable = ['id', 'title', 'isbn', 'pages', 'about', 'author_id'];

    public function bookAuthor()
    {

        return $this->belongsTo(Author::class, 'author_id', 'id');
    }
}
