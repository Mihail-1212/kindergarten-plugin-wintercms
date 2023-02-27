<?php namespace Militarymi\Kindergarten\Components;


// use Militarymi\Kindergarten\Models\Service as ServiceModel;
use Cms\Classes\ComponentBase;

class StaticPageMenu extends ComponentBase
{
    public function componentDetails()
    {
        return [
          'name' => 'Static page menu snippet',
          'description' => 'Snippet of static page menu for static page components'
        ];
    }

    public function defineProperties() {
      return [
      	'menu' => [
      		'title' => 'Menu item',
            'description' => 'Menu item to show',
            'default' => '',
            'type' => 'dropdown'
      	],
      	'partial' => [
      		'title' => 'Partial to render',
            'description' => 'Menu item to show',
            'default' => 'staticMenu',
            'type' => 'dropdown'
      	]

        // 'needBlend' => [
        //     'title' => 'Need blend services',
        //     'description' => 'Blend services',
        //     'default' => false,
        //     'type' => 'checkbox',
        // ],
        // 'outputCount' => [
        //     'title' => 'Count of output services',
        //     'description' => 'Set "0" to disable',
        //     'default' => 0,
        //     'type' => 'string',
        // ],
      ];
    }

    public function init()
	{
		$menu = $this->property('menu');
    	$partial = $this->property('partial');

	    $this->addComponent(\Winter\Pages\Components\StaticMenu::class, $partial, [
	    	'code' => $menu
	    ]);
	}

    public function onRun()
    {
    	$this->page["menu"] = $menu = $this->property('menu');
    	$this->page["partial"] = $partial = $this->property('partial');

    	// [Winter\Pages\Components\StaticMenu staticMenu]
		// code = "{{ menu }}"
    }

    // Copy from Winter\Pages\Components\StaticMenu::getCodeOptions
    function getMenuOptions() {
		$result = [];

	    $theme = \Cms\Classes\Theme::getEditTheme();
	    $menus = \Winter\Pages\Classes\Menu::listInTheme($theme, true);

	    foreach ($menus as $menu) {
	        $result[$menu->code] = $menu->name;
	    }

	    return $result;
	}

	function getPartialOptions() {
		$result = [
			'staticMenu' => 'Default menu',
			'staticMenuTiles' => 'Tile menu',
		];

		return $result;
	}
}
