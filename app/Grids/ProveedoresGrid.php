<?php

namespace App\Grids;

use Closure;
use Leantony\Grid\Grid;

class ProveedoresGrid extends Grid implements ProveedoresGridInterface
{
    /**
     * The name of the grid
     *
     * @var string
     */
    protected $name = 'Proveedores';

    /**
     * List of buttons to be generated on the grid
     *
     * @var array
     */
    protected $buttonsToGenerate = [
        'create',
        'view',
        'actulizar',
        'refresh',
        'export'
    ];

    /**
     * Specify if the rows on the table should be clicked to navigate to the record
     *
     * @var bool
     */
    protected $linkableRows = false;

    /**
    * Set the columns to be displayed.
    *
    * @return void
    * @throws \Exception if an error occurs during parsing of the data
    */
    public function setColumns()
    {
        $this->columns = [
		    "id" => [
		        "label" => "ID",
		        "filter" => [
		            "enabled" => true,
		            "operator" => "="
		        ],
		        "styles" => [
		            "column" => "grid-w-10"
		        ]
		    ],
		    "nombre" => [
		        "search" => [
		            "enabled" => true
		        ],
		        "filter" => [
		            "enabled" => true,
		            "operator" => "="
		        ]
		    ],
		    "clave_corta" => [
		        "search" => [
		            "enabled" => true
		        ],
		        "filter" => [
		            "enabled" => true,
		            "operator" => "="
		        ]
		    ],
		    "telefono" => [
		        "search" => [
		            "enabled" => true
		        ],
		        "filter" => [
		            "enabled" => true,
		            "operator" => "="
		        ]
		    ],
		];
    }

    /**
     * Set the links/routes. This are referenced using named routes, for the sake of simplicity
     *
     * @return void
     */
    public function setRoutes()
    {
        // searching, sorting and filtering
        $this->setIndexRouteName('proveedores.index');

        // crud support
        $this->setCreateRouteName('proveedores.create');
        $this->setViewRouteName('proveedores.show');
        $this->setDeleteRouteName('proveedores.destroy');

        // default route parameter
        $this->setDefaultRouteParameter('id');
    }

    /**
    * Return a closure that is executed per row, to render a link that will be clicked on to execute an action
    *
    * @return Closure
    */
    public function getLinkableCallback(): Closure
    {
        return function ($gridName, $item) {
            return route($this->getViewRouteName(), [$gridName => $item->id]);
        };
    }

    /**
    * Configure rendered buttons, or add your own
    *
    * @return void
    */
    public function configureButtons()
    {
        // call `addRowButton` to add a row button
        // call `addToolbarButton` to add a toolbar button
        // call `makeCustomButton` to do either of the above, but passing in the button properties as an array

        // call `editToolbarButton` to edit a toolbar button
        // call `editRowButton` to edit a row button
        // call `editButtonProperties` to do either of the above. All the edit functions accept the properties as an array
        // editing the view button
        // editing the refresh button
        $this->editToolbarButton('refresh', [
            'name' => 'Recargar',
        ]);
        $this->editRowButton('view', [
            'name' => 'Ver',
        ]);
        $this->editToolbarButton('create', [
            'name' => 'Crear',
        ]);
        $this->editToolbarButton('export', [
            'name' => 'Descargar',
        ]);
        $this->makeCustomButton([
            // an icon for the button, as chosen from font-awesome. Defaults to null
            'icon' => 'fa-edit',
            // the name of the button. Defaults to Unknown
            'name' => 'actualizar',
            // css class for the button. Defaults to `btn btn-default`
            'class' => '',
            // function that will be called to determine if the button will be displayed. Defaults to null
            'renderIf' => function() {return true;}, 
            // a link for this button. using the function specified will get an already existing route. Otherwise you can use any of
            // laravel's helper functions to get a url. Defaults to #
            // it accepts both a string and a callbac. See the scenarios below
            'url' => function($gridName, $gridItem) {
                return route('proveedores.update', ['id' => $gridItem->id]);
            },
            // where to the left or right with respect to other buttons would it be displayed. Higher means it will slide over to the far left, 
            // and lower means it will slide over to the far right. Its actually a sort run over the collection of buttons, and this argument
            // passed in the callback as an arg. Defaults to null
            'position' => 99,
            // if an action on it would trigger a PJAX action. Defaults to false
            'pjaxEnabled' => true, 
        ], 'rows');
    }

    /**
    * Returns a closure that will be executed to apply a class for each row on the grid
    * The closure takes two arguments - `name` of grid, and `item` being iterated upon
    *
    * @return Closure
    */
    public function getRowCssStyle(): Closure
    {
        return function ($gridName, $item) {
            // e.g, to add a success class to specific table rows;
            // return $item->id % 2 === 0 ? 'table-success' : '';
            return "";
        };
    }
}