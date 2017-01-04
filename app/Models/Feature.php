<?php

namespace Cars\Models;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{

    public $fillable = ['name'];

    public static function filterNewFeatures($features)
    {
        $features = array_filter($features, function($value){
            return !is_numeric($value); // es verdaderos solo aquellos valores no numericos
        });

        $features = array_map('trim', $features); // hace lo mismo que la siguiente

        /*
         * array_walk($features, function(&$value) {
            $value = trim($value);
        }); // primero quita los espacios en blanco
         */


        $features = array_unique($features); // luego verifica si todos son valores unicos

        $features = array_filter($features, function($value) {
            return strlen($value) >=2;
        });

        $existingFeatures = static::whereIn('name',$features)->pluck('name')->toArray();

        return array_diff($features, $existingFeatures);
    }
    public static function addNewFeatures($features)
    {
        $newFeatures = static::filterNewFeatures($features);

        foreach ($newFeatures as $feature){
            static::create(['name' => $feature]);
         }
    }
}
