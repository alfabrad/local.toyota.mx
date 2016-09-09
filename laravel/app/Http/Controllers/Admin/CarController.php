<?php

namespace Highlander\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Highlander\Http\Requests;
use Highlander\Http\Controllers\Controller;
use Illuminate\Support\Str;

use Highlander\Http\Requests\CarRequest;

use Highlander\Events\UploadImages;
use Highlander\Events\UploadFiles;

class CarController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function index( $id )
  {
    $title          = "Galería de modelos";
    $toReturn       = '/admin/' . $id;
    $home           = \Highlander\Car::where( 'brands_id', $id )
                                     ->firstOrFail( );
    $brand          = $home->brands->name;
    $id             = $id;
    $elements       = $home;
    $controllerName = 'Car';

    return view( 'admin.table', compact( 'title', 'brand', 'toReturn', 'home', 'id', 'elements', 'controllerName' ) );
  }

  /**
   * Show the form for creating a new resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function create( $id )
  {
    $brandName  = \Highlander\Car::where( 'brands_id', $id )
                                 ->get( )
                                 ->first()->brands->name;

    return view( 'admin.newCar', compact( 'id', 'brandName' ) );
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  Highlander\Http\Requests\CarRequest  $request
   * @param  int                                  $id
   * @param  int                                  $element_id
   * @return \Illuminate\Http\Response
   */
  public function store( CarRequest $request, $id, $element_id )
  {
    $technicalImages      = [ 'UrlMotor', 'UrlAuto' ];
    $technicalImagesPath  = 'assets/images/datos/';
    Event::fire( new UploadImages( $technicalImages, $technicalImagesPath ) );

    $carImages      = [ 'UrlInterior' ];
    $carImagesPath  = 'assets/images/datos/';
    Event::fire( new UploadImages( $carImages, $carImagesPath ) );

    $carTechnicalSpecificationsFile = [ 'Download' ];
    $carTechnicalSpecificationsPath = 'assets/technical-specifications/';
    Event::fire( new UploadFiles( $carTechnicalSpecificationsFile, $carTechnicalSpecificationsPath ) );

    $technicalSpecifications  = [
      'description' => base64_encode(
        serialize( [
          'Motor'     => [
            'Capacidad' => $request->Capacidad,
            'Potencia'  => $request->Potencia,
            'Cilindros' => $request->Cilindros,
            'Valvulas'  => $request->Valvulas
          ],
          'Frenos'    => $request->Frenos,
          'Rines'     => $request->Rines,
          'UrlMotor'  => $technicalImagesPath . $request->UrlMotor->getClientOriginalName(),
          'UrlAuto'   => $request->UrlAuto->getClientOriginalName()
        ] )
      )
    ];

    $externalSpecifications   = [
      'description' => base64_encode(
        serialize( [
          'Faros'             => $request->Faros,
          'SeguridadExterior' => $request->SeguridadExterior,
          'Visibilidad'       => [
            'Cristales'         => $request->Cristales,
            'EspejosLaterales'  => $request->EspejosLaterales
          ],
          'Techo'             => $request->Techo,
          'UrlInterior'       => $carImagesPath . $request->UrlInterior->getClientOriginalName(),
        ] )
      )
    ];

    $internalSpecifications   = [
      'description' => base64_encode(
        serialize( [
          'AcabadosInteriores'    => $request->AcabadosInteriores,
          'Asientos'              => $request->Asientos,
          'SistemaAudio'          => $request->SistemaAudio,
          'Confort'               => $request->Confort,
          'CinturonesSeguridad'   => $request->CinturonesSeguridad,
          'SeguridadInterior'     => $request->SeguridadInterior,
          'Download'              => $carTechnicalSpecificationsPath . $request->Download->getClientOriginalName()
        ] )
      )
    ];

    $saveTechnicalSpecificationsResult  = new \Highlander\TechnicalSpecification( $technicalSpecifications );
    $saveTechnicalSpecificationsResult->save( );

    $saveExternalSpecificationsResult   = new \Highlander\ExternalSpecification( $externalSpecifications );
    $saveExternalSpecificationsResult->save( );

    $saveInternalSpecificationsResult   = new \Highlander\InternalSpecification( $internalSpecifications );
    $saveInternalSpecificationsResult->save( );

    $carImages      = [ 'thumbnail' ];
    $carImagesPath  = 'assets/images/versiones/';
    Event::fire( new UploadImages( $carImages, $carImagesPath ) );

    $car                      = [
      'brands_id'                   => $id,
      'technical_specifications_id' => 2,
      'external_specifications_id'  => 2,
      'internal_specifications_id'  => 2,
      'title'                       => $request->title,
      'name'                        => $request->name,
      'thumbnail'                   => $carImagesPath . $request->thumbnail,
      'price'                       => $request->price,
      'description'                 => $request->description,
      'slug'                        => \Str::slug( $request->name )
    ];

    $saveCarResult            = new \Highlander\Car( $car );
    $saveCarResult->save( );

    /*
     * Create a response for passing it into the view.
     */
    $type           = ( $saveCarResult ) ? "success" : "danger";
    $message        = ( $saveCarResult ) ? "Campo actualizado" : "Hubo un error al actualizar la información. :/";

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
   * @param  int  $element_id
   * @return \Illuminate\Http\Response
   */
  public function show( $id, $element_id )
  {
    return 'CarController@show';
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @param  int  $element_id
   * @return \Illuminate\Http\Response
   */
  public function edit( $id, $element_id )
  {
    $model      = \Highlander\Car::findOrFail( $id );
    $brandName  = $model->title;

    return view( 'admin.editCar', compact( 'id', 'element_id', 'brandName', 'model' ) );
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request   $request
   * @param  int                        $id
   * @param  int                        $element_id
   * @return \Illuminate\Http\Response
   */
  public function update( CarRequest $request, $id, $element_id )
  {
    $technicalSpecifications  = [
      'description' => base64_encode(
        serialize( [
          'Motor'     => [
            'Capacidad' => $request->Capacidad,
            'Potencia'  => $request->Potencia,
            'Cilindros' => $request->Cilindros,
            'Valvulas'  => $request->Valvulas
          ],
          'Frenos'    => $request->Frenos,
          'Rines'     => $request->Rines,
          'UrlMotor'  => $request->UrlMotor,
          'UrlAuto'   => $request->UrlAuto
        ] )
      )
    ];

    $externalSpecifications   = [
      'description' => base64_encode(
        serialize( [
          'Faros'             => $request->Faros,
          'SeguridadExterior' => $request->SeguridadExterior,
          'Visibilidad'       => [
            'Cristales'         => $request->Cristales,
            'EspejosLaterales'  => $request->EspejosLaterales
          ],
          'Techo'             => $request->Techo,
          'UrlInterior'       => $request->UrlInterior,
        ] )
      )
    ];

    $internalSpecifications   = [
      'description' => base64_encode(
        serialize( [
          'AcabadosInteriores'    => $request->AcabadosInteriores,
          'Asientos'              => $request->Asientos,
          'SistemaAudio'          => $request->SistemaAudio,
          'Confort'               => $request->Confort,
          'CinturonesSeguridad'   => $request->CinturonesSeguridad,
          'SeguridadInterior'     => $request->SeguridadInterior,
          'Download'              => $request->Download
        ] )
      )
    ];

    $saveTechnicalSpecificationsResult  = \Highlander\TechnicalSpecification::where( 'id', $element_id )
                                                                            ->update( $technicalSpecifications );

    $saveExternalSpecificationsResult   = \Highlander\ExternalSpecification::where( 'id', $element_id )
                                                                           ->update( $externalSpecifications );

    $saveInternalSpecificationsResult   = \Highlander\InternalSpecification::where( 'id', $element_id )
                                                                           ->update( $internalSpecifications );

    $car                      = [
      'title'                       => $request->title,
      'name'                        => $request->name,
      'thumbnail'                   => $request->thumbnail,
      'price'                       => $request->price,
      'description'                 => $request->description,
      'slug'                        => \Str::slug( $request->name )
    ];

    $saveCarResult                      = \Highlander\Car::where( 'id', $element_id )
                                                         ->update( $car );

    /*
     * Create a response for passing it into the view.
     */
    $type           = ( $saveCarResult ) ? "success" : "danger";
    $message        = ( $saveCarResult ) ? "Campo actualizado" : "Hubo un error al actualizar la información. :/";

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
   * @param  int  $element_id
   * @return \Illuminate\Http\Response
   */
  public function destroy( $id, $element_id )
  {
    $car = \Highlander\Car::findOrFail( $id );
    $car->destroy();

    /*
     * Create a response for passing it into the view.
     */
    $type           = ( $car ) ? "success" : "danger";
    $message        = ( $car ) ? "Campo actualizado" : "Hubo un error al actualizar la información. :/";

    /*
     * Passing the recipe information, categories and domain url to the view.
     */
    return \Redirect::back( )
                    ->withType( $type )
                    ->withMessage( $message );
  }
}
