<?php

return [
    'api_key'=> env('PEXELS_API_KEY'),
    'per_page'=> 15, //number of results, max: 80
    'orientation'=> 'landscape', // landscape, portrait, square
    'size'=> 'small', // large, medium, small
    'locale'=> 'en-US'
];
