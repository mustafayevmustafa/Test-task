<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Blade;
use Illuminate\View\Component;

class Menu extends Component
{
    public  $items = [];

    public function __construct()
    {
        $this->items = [
            (object) [
                'name' => 'Dashboard',
                'url' => route('products.index'),
                'icon' => 'bi bi-menu-button-wide',
                'permission' => 'generally',
                'has_arrow' => false
            ],
            (object) [
                'name' => 'Products',
                'url' => 'javascript:void(0)',
                'icon' => 'bi bi-chevron-down ms-auto',
                'permission' => 'generally',
                'has_arrow' => true,
                'inner' => [
                    (object) [
                        'name' => 'Products list',
                        'url' => route('products.index'),
                        'icon' => 'mdi-cash',
                        'permission' => 'generally',
                    ],
                    (object) [
                        'name' => 'Product Add',
                        'url' => route('products.create'),
                        'icon' => 'mdi-cash',
                        'permission' => 'generally',
                    ],
                ]
            ],


        ];
    }

    public function render(): string
    {
        return /* @lang Blade */
            <<<'blade'
            <ul  class="sidebar-nav" id="sidebar-nav">
                <li class="nav-item">Menu</li>
                @foreach ($items as $item)
                
                        @php($active = request()->url() == $item->url || request()->segment(2) == strtolower($item->name))
                         <li @class(['active' => $active])>
                            <a href="{{$item->url}}" @class(['waves-effect', 'mm-active' => $active, 'has-arrow' => $item->has_arrow])>
                                <i class="bi {{$item->icon}}"></i>
                                <span>{{$item->name}}</span>
                            </a>
                            @if($item->has_arrow)
                                <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                                    @foreach($item->inner as $inner)
                                        <li><a  class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#" href="{{$inner->url}}">{{$inner->name}}</a></li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                  
                @endforeach
            </ul>
        blade;
    }



}
