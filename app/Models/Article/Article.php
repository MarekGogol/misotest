<?php

namespace App\Models\Article;

use Admin\Eloquent\AdminModel;
use Admin\Fields\Group;

class Article extends AdminModel
{
    /*
     * Model created date, for ordering tables in database and in user interface
     */
    protected $migration_date = '2020-11-09 17:04:46';

    /*
     * Template name
     */
    protected $name = 'Clanky';

    protected $sluggable = 'name';

    /*
     * Automatic form and database generator by fields list
     * :name - field name
     * :type - field type (string/text/editor/select/integer/decimal/file/password/date/datetime/time/checkbox/radio)
     * ... other validation methods from laravel
     */
    public function fields()
    {
        return [
            'name' => 'name:Názov|placeholder:Zadajte názov článku|required|max:90',
            'content' => 'name:Obsah článku|type:editor|required',
            'image' => 'name:Obrázok|type:file|image|required',
        ];
    }
}