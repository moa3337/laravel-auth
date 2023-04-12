<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'image', 'text'];

    public function getAbstract($max = 40)
    {
        return substr($this->text, 0, $max) . "...";
    }

    public static function generateSlug($title)
    {
        $possible_slug = Str::of($title)->slug('_');
        // toDo: controllare che lo slug sia unico, se no rigeneralo finchè non lo si trova
        $projects = Project::where('slug', $possible_slug)->get();
        $original_slug = $possible_slug;
        $i = 2;
        while (count($projects)) {
            $possible_slug = $original_slug . "." . $i;
            $projects = Project::where('slug', $possible_slug)->get();
            $i++;
        }

        return $possible_slug;
    }
}
