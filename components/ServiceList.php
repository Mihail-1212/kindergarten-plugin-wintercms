<?php namespace Militarymi\Kindergarten\Components;


use Militarymi\Kindergarten\Models\Service as ServiceModel;
use Cms\Classes\ComponentBase;

class ServiceList extends ComponentBase
{
    public function componentDetails()
    {
        return [
          'name' => 'Service list component',
          'description' => 'Displays a collection of services.'
        ];
        // $slideShows = SlideShows::all();
        // if (count($slideShows) > 0) {
        //     return [
        //         'name' => 'Slider',
        //         'description' => 'Displays a slider chosen from the dropdown'
        //     ];
        // } else {
        //     return [
        //         'name' => 'Slider',
        //         'description' => 'Please create a slideshow in the "Slideshow" menu'
        //     ];
        // }
    }

    public function defineProperties() {
      return [
        'needBlend' => [
            'title' => 'Need blend services',
            'description' => 'Blend services',
            'default' => false,
            'type' => 'checkbox',
        ],
        'outputCount' => [
            'title' => 'Count of output services',
            'description' => 'Set "0" to disable',
            'default' => 0,
            'type' => 'string',
        ],
      ];
    }

    // public function defineProperties()
    // {
    //   return [
    //     'maxItems' => [
    //         'title' => 'Max items',
    //         'description' => 'The most amount of todo items allowed',
    //         'default' => 10,
    //         'type' => 'string',
    //         'validationPattern' => '^[0-9]+$',
    //         'validationMessage' => 'The Max Items property can contain only numeric symbols'
    //     ]
    //   ];
    //     // $slideShows = SlideShows::all();
    //     // if (count($slideShows) > 0) {
    //     //     $optionsArray =  array();
    //     //     foreach ($slideShows as $slideShow) {
    //     //         $optionsArray[$slideShow->attributes['id']] = $slideShow->attributes['slide_show_title'];
    //     //     }
    //     //     return [
    //     //         'slide_show_id' => [
    //     //             'title'       => 'Slideshow',
    //     //             'type'        => 'dropdown',
    //     //             'default'     => $slideShows->first()->attributes['id'],
    //     //             'placeholder' => 'Select slideshow',
    //     //             'options'     => $optionsArray
    //     //         ]
    //     //     ];
    //     // } else {
    //     //     return [
    //     //     ];
    //     // }
    // }

    public function onRun()
    {
      $this->page["need_blend"] = $needBlend = $this->property('needBlend');
      $this->page["output_count"] = $outputCount = $this->property('outputCount');

      $serviceList = null;

      if ($needBlend) {
        $serviceList = ServiceModel::inRandomOrder()->get();
      } else {
        $serviceList = ServiceModel::all();
      }

      if ($outputCount != 0) {
        $serviceList = $serviceList->take($outputCount);
      }

      $this->page["service_list"] = $serviceList;
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
