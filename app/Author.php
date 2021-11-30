<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Kyslik\ColumnSortable\Sortable;

class Author extends Model
{

    //sita kodo eilute nera butina, priklauso nuo ar modelis sia eilute turi,
    //pagal numatytus nustatymus sita eilute jau yra modelyje
    protected $table = 'authors';

    use Sortable;

    // galima redaguoti tiktai varda ir pavarde, ID neredeguojame
    protected $fillable = ['name', 'surname'];

    // rikiuoti galime pagal id, varda, pavarde
    public $sortable = ['id', 'name', 'surname'];


    public function authorBooks()
    {
        return $this->hasMany(Book::class, 'author_id', 'id');
    }
}
