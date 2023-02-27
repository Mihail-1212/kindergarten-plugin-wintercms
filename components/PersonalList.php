<?php namespace Militarymi\Kindergarten\Components;


use Militarymi\Kindergarten\Models\Personal as PersonalModel;
use Cms\Classes\ComponentBase;

class PersonalList extends ComponentBase
{
    public function componentDetails()
    {
        return [
          'name' => 'Personal list component',
          'description' => 'Displays a collection of services.'
        ];
    }

    public function defineProperties() {
      return [
        'useManagement' => [
            'title' => 'Use management personal',
            'description' => 'Property to display management of organization',
            'default' => false,
            'type' => 'checkbox',
        ]
      ];
    }

    public function onRun()
    {
      if ($this->property('useManagement')) {
        $this->page['personal_list'] = PersonalModel::getManagement();
      } else {
        $this->page['personal_list'] = PersonalModel::all();
      }

      // $this->page["service_list"] = ServiceModel::all();
        // $slideShowId = $this->property('slide_show_id');
        // $slideShows = SlideShows::where('id', '=', $slideShowId)->first();
        // if ($slideShows !== null && $slideShows->attributes['include_jquery']) {
        //     $this->addJs('assets/jquery-3.1.1.min.js');
        // }
        // $this->addJs('assets/slick/slick.min.js');
        // $this->addCss('assets/slick/slick.css');
        // $this->addCss('assets/slick/slick-theme.css');
    }

}
