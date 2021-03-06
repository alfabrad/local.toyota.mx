<?php

namespace Toyota\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Toyota\Http\Requests;
use Toyota\Http\Controllers\Controller;

use Toyota\Http\Requests\TitleSliderFeaturesRequest;

class TitleSliderFeaturesController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index( $id )
  {
    $title          = "Slider de fotos";
    $brand          = \Toyota\Brands::findOrFail( $id )->title;
    $toReturn       = '/admin/' . $id;
    $home           = \Toyota\SliderFeature::where( 'brands_id', $id )
                                               ->get( );
    $id             = $id;
    $elements       = $home;
    $controllerName = 'TitleSliderFeatures';

    return view( 'admin.table', compact( 'title', 'brand', 'toReturn', 'home', 'id', 'elements', 'controllerName' ) );
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create( $id )
  {
    $brands       = \Toyota\SliderFeature::findOrFail( $id );
    $typeOfField  = 'Slide';
    $fieldName    = 'Slide';
    $url          = 'admin/' . $id . '/title-slider-features';
    $method       = 'POST';
    $field        = 'title';
    $fieldValue   = "";
    $toReturn     = $url;

    return view( 'admin.newSlide', compact( 'brands', 'typeOfField', 'fieldName', 'url', 'method', 'field', 'fieldValue', 'toReturn' ) );
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store( TitleSliderFeaturesRequest $request, $id )
  {
    $newSlide = [
      'brands_id'   => $id,
      'title'       => $request->title,
      'content'     => $request->content
    ];
    $result   = new \Toyota\SliderFeature( $newSlide );
    $result->save();

    /*
     * Create a response for passing it into the view.
     */
    $message        = ( $result ) ? "Título añadido" : "Hubo un error al actualizar la información. :/";
    $type           = ( $result ) ? "success" : "danger";

    /*
     * Passing the recipe information, categories and domain url to the view.
     */
    return \Redirect::back( )
                    ->withType( $type )
                    ->withMessage( $message );
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show( $id )
  {
    return 'TitleSliderFeaturesController@show';
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit( $id, $slider_features )
  {
    $brands       = \Toyota\SliderFeature::findOrFail( $slider_features );
    $typeOfField  = 'galería de características';
    $fieldName    = 'Título';
    $url          = 'admin/' . $id . '/title-slider-features/' . $id;
    $field        = 'titlesSliderFeatures';
    $fieldValue   = $brands->content;
    $toReturn     = 'admin/' . $id . '/title-slider-features/';

    return view( 'admin.textarea', compact( 'brands', 'typeOfField', 'fieldName', 'url', 'field', 'fieldValue', 'toReturn' ) );
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update( TitleSliderFeaturesRequest $request, $id )
  {
    $brand    = [ 'content' => $request->titlesSliderFeatures ];
    $result   = \Toyota\SliderFeature::where( 'id', $id )
                                         ->update( $brand );

    /*
     * Create a response for passing it into the view.
     */
    $message        = ( $result ) ? "Título actualizado" : "Hubo un error al actualizar la información. :/";
    $type           = ( $result ) ? "success" : "danger";

    /*
     * Passing the recipe information, categories and domain url to the view.
     */
    return \Redirect::back( )
                    ->withType( $type )
                    ->withMessage( $message );
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy( $id, $element_id )
  {
    $result   = \Toyota\SliderFeature::destroy( $element_id );

    /*
     * Create a response for passing it into the view.
     */
    $message        = ( $result ) ? "Título eliminado" : "Hubo un error al actualizar la información. :/";
    $type           = ( $result ) ? "success" : "danger";

    /*
     * Passing the recipe information, categories and domain url to the view.
     */
    return \Redirect::back( )
                    ->withType( $type )
                    ->withMessage( $message );
  }
}
