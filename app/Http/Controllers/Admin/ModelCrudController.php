<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ModelRequest;
use App\Models\Model;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ModelCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ModelCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    private function getFieldsData($show = FALSE, $edit = FALSE) {
        $fields = [
            [
                'name'=> 'manufacturer_id',
                'label' => 'Manufacturer',
                'type'=> $show ? 'select' : ($edit ? 'view' : 'select'),
                'view' => 'admin/fields/select_readonly',
                'attribute' => 'name'
            ],
            [
                'name'=> 'name',
                'label' => 'Model',
                'type'=> 'text'
            ],
            [
                'name' => 'image',
                'label' => 'Image',
                'type' => ($show ? 'view' : 'upload'),
                'view' => 'admin/fields/image',
                'upload' => true
            ],
        ];

        return $fields;
    }

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Model::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/model');
        CRUD::setEntityNameStrings('model', 'models');

        CRUD::addFields($this->getFieldsData());
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::set('show.setFromDb', false);
        CRUD::addColumns($this->getFieldsData(TRUE));
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(ModelRequest::class);

        CRUD::set('show.setFromDb', false);
        CRUD::addFields($this->getFieldsData());
    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        CRUD::setValidation(ModelRequest::class);
        CRUD::addFields($this->getFieldsData(FALSE, TRUE));
    }

    protected function setupShowOperation(){
        CRUD::set('show.setFromDb', false);
        CRUD::addColumns($this->getFieldsData(TRUE));
    }
}