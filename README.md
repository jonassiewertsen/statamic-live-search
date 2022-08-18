<!-- statamic:hide -->
# Statamic Live Search
![Statamic 3.0+](https://img.shields.io/badge/Statamic-3.0+-FF269E?style=for-the-badge&link=https://statamic.com)
[![Latest Version on Packagist](https://img.shields.io/packagist/v/jonassiewertsen/statamic-live-search.svg?style=for-the-badge)](https://packagist.org/packages/jonassiewertsen/statamic-live-search)
<!-- /statamic:hide -->

> A Statamic Live Search realised with [Laravel Livewire](https://laravel-livewire.com/).

It's fast to implement, hooks into the Statamic 3 core search and updates search results as you type. 

<img src="https://github.com/jonassiewertsen/statamic-live-search/blob/main/statamic-live-serach.gif?raw=true" alt="Statamic Live Search">

This Package extends my third-party [Statamic 3 Livewire integration](https://github.com/jonassiewertsen/statamic-livewire).

## No need for live search?

Check out my [Statamic 3 Livewire integration](https://github.com/jonassiewertsen/statamic-livewire).

## Installation
Pull in the package with composer
```bash
composer require jonassiewertsen/statamic-live-search
```

## Requirements
- PHP 7.4 or 8.0
- Laravel 7 or 8
- Statamic 3

## Set up Livewire
The option to create your first search provides a quick-start example to get you going.

As the statamic-live-search extends the statamic-livewire addon, the setup is exactly the same and a deeper understanding might be useful. See the link below for more information.

[Statamic 3 Livewire integration Docs](https://github.com/jonassiewertsen/statamic-livewire#general-documentation)

## Create your first search

Add the `livewire:search` component to one of your templates and define your template.

```html
<!-- 
### If using Antlers ###
-->
<html>
<head>
    ...
    {{ livewire:styles }}
</head>
<body>
    {{ livewire:search }}
   
    <!-- Your stuff goes here -->

    ...
    {{ livewire:scripts }}
</body>
</html>

<!-- 
### If using Blade ###
-->
<html>
<head>
    ...
    @livewireStyles
</head>
<body>
    <livewire:search />
    
    <!-- Your stuff goes here -->

    ...
    @livewireScripts
</body>
</html>

```

## Setup the template

### Use the default dropdown layout

To get you started as fast as possible, we provide a default template. You can publish it and edit it according to your needs. 

```bash
php artisan vendor:publish --tag=live-search:views
```

After publishing, you will find the template inside `resources/views/vendor/live-search/dropdown.blade.php`. It can be edited as you like.

### Use your own template

Create your own template and put it anywhere you like. Define the template in the tag and you are ready to go.

If you need augmented values - as in the case of images - it's easiest to use Antlers, so you don't need to worry about it.


```html
<!-- If using Antlers -->
{{ livewire:search template='partials.your-own-search-template' }}

<!-- If using Blade -->
<livewire:search :template='partials.your-own-search-template' />
```

If the template name is `partials.search`, the template is expected at `resources\views\partials\search.blade.php` or `resources\views\partials\search.antlers.php`.

This might be a solid starting point for your own template:

#### Blade

```html
<div>
    <input wire:model="q" type="search">

    <ul>
        @forelse($results as $result)
            <li>{{ $result['title'] }}</li>
        @empty
            No matches found
        @endforelse
    </ul>
</div>
```

#### Antlers
```html
<div>
    <input wire:model="q" type="search">

    <ul>
        {{ results }}
            <li>{{ title }}</li>
        {{ /results }}
    </ul>
</div>
```

## Configure your index

This is the best bit. This addon hooks into Statamic core search. Just configure your indexes in the `config/statamic/search.php` file. 

If you don't provide an index we will search everything. That's great for smaller sites. 

A more specific search could look something like this:

```php
'blog' => [
     'driver' => 'local',
     'searchables' => 'collection:blog',
     'fields' => ['title'],
 ],
```

Remember to define the index in your component:

```html
<!-- If using Antlers -->
{{ livewire:search template='partials.search' index='blog' }}

<!-- If using Blade -->
<livewire:search :template='partials.search' :index='blog' />
```

To update your indexes run `php please search:update` [More information](https://statamic.dev/search#updating-indexes)

[See the Statamic docs for more information](https://statamic.dev/search#searchables)


## Customize the search logic

The parts we have provided have been built in a modular fashion so you can easily extend them if you wish. 

### Extend the Search Class

#### 1. Create your own Livewire Controller
`php artisan make:livewire YourCustomLivewireController`

#### 2. Extend the Search class
```php
namespace App\Your\Namespace;

use Jonassiewertsen\LiveSearch\Http\Livewire\Search;

class YourCustomLivewireController extends Search
{
    public $template;
    public $index;

    public function mount(string $template, string $index = null)
    {
        // You can pass these as parameters or they can be hardcoded. 
        $this->template = $template;
        $this->index = $index;
    }

    public function render()
    {
        // Do your stuff here. 
    
        return view($this->template, [
            'results' => $this->search($this->q, $this->index),
        ]);
    }
}
```

#### 2. Use the SearchFacade Controller

It might be that you want to customize the name of the query string or that you want to use multiple filters. 

You can import the SearchFacade trait and write a complete Livewire Controller as you need it. 

`use Jonassiewertsen\LiveSearch\Traits\SearchFacade;`

The method we have provided expects the following parameters:
`search($query, ?string $index = null, ?int $limit = 10)`

Have fun customizing. 

## Credits

Thanks to:
- [Caleb](https://github.com/calebporzio) and the community for building [Livewire](https://laravel-livewire.com/)
- [Austenc](https://github.com/austenc) for the marketplace preview image

## Support
I love to share with the community. Nevertheless, it does take a lot of work, time and effort. 

[Sponsor me on GitHub](https://github.com/sponsors/jonassiewertsen/) to support my work and this addon.

## License 
This plugin is published under the MIT license. Feel free to use it and remember to spread the love.

