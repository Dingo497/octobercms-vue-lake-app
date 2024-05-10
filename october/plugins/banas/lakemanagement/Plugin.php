<?php namespace Banas\LakeManagement;

use Backend;
use System\Classes\PluginBase;

/**
 * Plugin Information File
 *
 * @link https://docs.octobercms.com/3.x/extend/system/plugins.html
 */
class Plugin extends PluginBase
{
    /**
     * pluginDetails about this plugin.
     */
    public function pluginDetails()
    {
        return [
            'name' => 'LakeManagement',
            'description' => 'No description provided yet...',
            'author' => 'Banas',
            'icon' => 'icon-leaf'
        ];
    }

    /**
     * register method, called when the plugin is first registered.
     */
    public function register()
    {
        // $this->registerSeeder('Banas\LakeManagement\Updates\Seeders');
    }

    /**
     * boot method, called right before the request route.
     */
    public function boot()
    {
        //
    }

    /**
     * registerComponents used by the frontend.
     */
    public function registerComponents()
    {
        return []; // Remove this line to activate

        return [
            'Banas\LakeManagement\Components\MyComponent' => 'myComponent',
        ];
    }

    /**
     * registerPermissions used by the backend.
     */
    public function registerPermissions()
    {
        return []; // Remove this line to activate

        return [
            'banas.lakemanagement.some_permission' => [
                'tab' => 'LakeManagement',
                'label' => 'Some permission'
            ],
        ];
    }

    /**
     * registerNavigation used by the backend.
     */
    public function registerNavigation()
    {
        
        return [
            'lakemanagement' => [
                'label' => 'Manažment jazier',
                'url' => Backend::url('banas/lakemanagement/lakes'),
                'icon' => 'icon-tree',
                'permissions' => ['banas.lakemanagement.*'],
                'order' => 500,
    
                'sideMenu' => [
                    'lakes' => [
                        'label' => 'Jazerá',
                        'icon' => 'icon-tree',
                        'url' => Backend::url('banas/lakemanagement/lakes'),
                        'permissions' => ['banas.lakemanagement.*'],
                    ],
                ]
            ]
        ];

    }
}
