<?php

class Guitars_Controller extends Base_Controller {

	public $restful = true;

//    public function __contruct() {
//        // the 'auth' filter is defined in routes.php
//        // the array lists all actions which need to be secured, i.e. logged in user
//        $this->filter('before', 'auth')->only(array('new', 'edit', 'update', 'destroy'));
//    }

    // "/guitars"
    // display a list of items
	public function get_index()
    {
        $guitars = Guitar::all();

        return View::make('guitars.index')
            ->with('title','Dalton Musicworks - Guitars')
            ->with('navbar_itemName', 'top_navbar_guitars')
            ->with('guitars', $guitars);
    }

    // "/guitars/new"
    // display a form for creating a new item
	public function get_new()
    {
        return View::make('guitars.new')
            ->with('title', 'Dalton Musicworks - Guitars Add New Entry')
            ->with('navbar_itemName', 'top_navbar_guitars');
    }

    // receives form to create a new item
    public function post_new()
    {
        //$validation = Guitar::validate(Input::all());

        //if ($validation->passes()) {

            $guitar = new Guitar;
            $guitar->model = strtolower( e(Input::get('model')) );
            $guitar->prod_id = e(Input::get('prod_id'));
            $guitar->price = e(Input::get('price'));
            $guitar->short_desc = e(Input::get('short_desc'));
            $guitar->save();

            return Redirect::to_route('guitars')->with('message', 'Guitar has been added.');
       // }
       // else {
       //     return Redirect::to_route('create_guitar')->with_errors($validation)->with_input();
       // }

    }

    // "/guitars/:prod_id"
    // display a specific item
	public function get_show($model)
    {
        $model = strtolower($model);
        $guitar = Guitar::where_model($model)->first();

        if ($guitar) {
            return View::make('guitars.guitar_view')
                ->with('title', 'Dalton Musicworks - Guitar ' . $model)
                ->with('navbar_itemName', 'top_navbar_guitars')
                ->with('prod_id', $guitar);
        }
        else {
            return $this->get_index();
        }
    }

    // "/guitars/:prod_id/edit"
    // display a form to edit a specific item
	public function get_edit($model)
    {
        $model = strtolower($model);
        $guitar = Guitar::where_model($model)->first();

        return View::make('guitars.edit')
            ->with('title', 'Dalton Musicworks - Guitars Edit: ' . $guitar->model_friendly)
            ->with('navbar_itemName', 'top_navbar_guitars')
            ->with('guitar', $guitar);
    }

    // update a specific item
	public function put_update()
    {
        $id = Input::get('id');

//		$validation = Guitar::validate(Input::all());

//		if ($validation->passes()) {
			Guitar::update($id, array(
				'model'=> strtolower(Input::get('model')),
                'model_friendly'=> Input::get('model_friendly'),
				'prod_id'=> Input::get('prod_id'),
                'price'=> Input::get('price'),
				'short_desc'=> Input::get('short_desc')
			));

        return Redirect::to_route('guitars')->with('message', 'Guitar has been updated.');
//		} else {
//			return Redirect::to_route('edit_guitar', $prod_id)->with_errors($validation);
//		}
    }

    // "/guitars/:prod_id/delete"
    // delete a specific item
	public function delete_destroy($id)
    {
//        $deleted_item = DB::table('guitars')->where('id', '=', $id)->delete();
        return 'delete a specific item';
    }

}