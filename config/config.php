<?php

return [

    /*
   |--------------------------------------------------------------------------
   | To augmented collection
   |--------------------------------------------------------------------------
   |
   | This is the place where you can define the fields you want being
   | returned as an search result.
   |
   | Technically we will loop through each result and augment the
   | defined fields by calling `toAugmentedCollection`
   |
   */

    'augmentedCollection' => [
        'title',
        'url',
        'collection',
        'is_entry',
        'taxonomy',
        'is_term',
    ],
];
