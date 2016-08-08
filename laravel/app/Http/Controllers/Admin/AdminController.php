<?php

namespace Highlander\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Highlander\Http\Requests;
use Highlander\Http\Controllers\Controller;

use Highlander\Http\Requests\BrandUpdatedRequest;

class AdminController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index( )
  {
    $brands = \Highlander\Descriptions::all( );

    return view( 'admin.index' )->withBrands( $brands );
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create( )
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store( Request $request )
  {
    //
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show( $id )
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit( $id )
  {
    $home = \Highlander\Descriptions::findOrFail( $id );

    return view( 'admin.edit' )->withHome( $home );
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update( BrandUpdatedRequest $request, $id )
  {
    $store = [
      'titleH1'                     => $request->titleH1,
      'sliderFeatures'              => base64_encode( serialize( $request->sliderFeatures ) ),
      'titleSliderFeatures'         => base64_encode( serialize( $request->titleSliderFeatures ) ),
      'titleGalleryFancybox'        => $request->titleGalleryFancybox,
      'galleryFancybox'             => base64_encode( serialize( $request->galleryFancybox ) ),
      'descriptionGalleryFancybox'  => $request->descriptionGalleryFancybox,
      'titleVersionsGallery'        => $request->titleVersionsGallery,
      'carsDescriptionsGalleryOne'  => base64_encode( serialize( $request->carsDescriptionsGalleryOne ) ),
      'carsDescriptionsGalleryTwo'  => base64_encode( serialize( $request->carsDescriptionsGalleryTwo ) ),
      'titleDrivingAnimation'       => $request->titleDrivingAnimation,
      'titleFooter'                 => $request->titleFooter,
      'descriptionFooter'           => $request->descriptionFooter,
    ];

    /*
     * Persist the new data into the database.
     */
    $update = \Highlander\Descriptions::where( 'id', $id )
                                      ->update( $store );

    $type     = ( $update ) ? "success" : "danger";
    $message  = ( $update ) ? "Modelo de auto editado" : "Modelo de auto no editado";

    return redirect( '/admin/' )->withType( $type )
                                ->withMessage( $message );
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    return 'destroyed';
  }
}