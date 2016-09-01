<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CarTest extends TestCase
{
  use DatabaseTransactions;

  /**
   * Car model's gallery depends of the given parameter.
   *
   * @return void
   */
  public function testOpenCarBrandOption()
  {
    $user = factory( Highlander\User::class )->create();

    $this->actingAs( $user )
         ->visit( env( 'APP_URL' ) . "admin/" )
         ->assertResponseOk( )
         ->seePageIs( env( 'APP_URL' ) . "admin/" )
         ->see( 'Highlander' )
         ->click( 'Editar' )
         ->assertResponseOk();

    $response = $this->call( 'GET', '/receta/slug-de-prueba' );

    $this->assertEquals( 404, $response->status() );
  }

  /**
   * Test for delete car model
   * @return void
   */
  public function testDeleteCarBrandOption()
  {
    $user = factory( Highlander\User::class )->create();

    $this->actingAs( $user )
         ->visit( env( 'APP_URL' ) . "admin/" )
         ->assertResponseOk( )
         ->seePageIs( env( 'APP_URL' ) . "admin/" )
         ->see( 'Highlander' )
         ->press( 'Eliminar' )
         ->assertResponseOk()
         ->seePageIs( env( 'APP_URL' ) . 'admin' );
  }

  /**
   * Test for edit brand title
   * @return void
   */
  public function testEditBrandTitle()
  {
    $user = factory( Highlander\User::class )->create();

    $this->actingAs( $user )
         ->visit( env( 'APP_URL' ) . 'admin/brand/1/edit' )
         ->type( 'Highlander 2016', 'name' )
         ->press( 'Actualizar' )
         ->seePageIs( env( 'APP_URL' ) . 'admin/brand/1/edit' )
         ->seeInDatabase( 'Brands', [
            'name' => 'Highlander 2016'
          ] );
  }

  /**
   * Test for edit brand title
   * @return void
   */
  public function testEditSlogan()
  {
    $user = factory( Highlander\User::class )->create();

    $this->actingAs( $user )
         ->visit( env( 'APP_URL' ) . 'admin/slogan/1/edit' )
         ->type( 'Haremos de tus viajes, los mejores momentos', 'slogan' )
         ->press( 'Actualizar' )
         ->seePageIs( env( 'APP_URL' ) . 'admin/slogan/1/edit' )
         ->seeInDatabase( 'Brands', [
            'slogan' => 'Haremos de tus viajes, los mejores momentos'
          ] );
  }

  /**
   * Test for edit title h1
   * @return void
   */
  public function testEditTitleH1()
  {
    $user = factory( Highlander\User::class )->create();

    $this->actingAs( $user )
         ->visit( env( 'APP_URL' ) . 'admin/title_h1/1/edit' )
         ->type( 'Desde cualquier ángulo te parecerá espectacular.', 'title_h1' )
         ->press( 'Actualizar' )
         ->seePageIs( env( 'APP_URL' ) . 'admin/title_h1/1/edit' )
         ->seeInDatabase( 'Brands', [
            'title_h1' => 'Desde cualquier ángulo te parecerá espectacular.'
          ] );
  }

  /**
   * Test for edit gallery fancybox's title
   * @return void
   */
  public function testEditTitleGalleryFancybox()
  {
    $user = factory( Highlander\User::class )->create();

    $this->actingAs( $user )
         ->visit( env( 'APP_URL' ) . 'admin/title_gallery_fancybox/1/edit' )
         ->type( 'CADA PARTE DE ELLA TIENE UN PROPÓSITO.', 'title_gallery_fancybox' )
         ->press( 'Actualizar' )
         ->seePageIs( env( 'APP_URL' ) . 'admin/title_gallery_fancybox/1/edit' )
         ->seeInDatabase( 'Brands', [
            'title_gallery_fancybox' => 'CADA PARTE DE ELLA TIENE UN PROPÓSITO.'
          ] );
  }

  /**
   * Test for edit the description of the fancybox gallery
   * @return [type] [description]
   */
  public function testEditDescriptionGalleryFancybox()
  {
    $user = factory( Highlander\User::class )->create();

    $this->actingAs( $user )
         ->visit( env( 'APP_URL' ) . 'admin/description_gallery_fancybox/1/edit' )
         ->type( 'Cada espacio diseñado en Highlander está pensado con un propósito, ya sea comodidad, seguridad o lujo, pero todo tiene una razón de ser.', 'description_gallery_fancybox' )
         ->press( 'Actualizar' )
         ->seePageIs( env( 'APP_URL' ) . 'admin/description_gallery_fancybox/1/edit' )
         ->seeInDatabase( 'Brands', [
            'description_gallery_fancybox' => 'Cada espacio diseñado en Highlander está pensado con un propósito, ya sea comodidad, seguridad o lujo, pero todo tiene una razón de ser.'
          ] );
  }

  /**
   * Test for edit title versions gallery
   * @return void
   */
  public function testEditTitlteVersionsGallery()
  {
    $user = factory( Highlander\User::class )->create();

    $this->actingAs( $user )
         ->visit( env( 'APP_URL' ) . 'admin/title_versions_gallery/1/edit' )
         ->type( 'CADA UNA TIENE DETALLES QUE TE CONQUISTARÁN.', 'title_versions_gallery' )
         ->press( 'Actualizar' )
         ->seePageIs( env( 'APP_URL' ) . 'admin/title_versions_gallery/1/edit' )
         ->seeInDatabase( 'Brands', [
            'title_versions_gallery' => 'CADA UNA TIENE DETALLES QUE TE CONQUISTARÁN.'
          ] );
  }

  /**
   * Test for edit title driving animation
   * @return void
   */
  public function testEditTitleDrivingAnimation()
  {
    $user = factory( Highlander\User::class )->create();

    $this->actingAs( $user )
         ->visit( env( 'APP_URL' ) . 'admin/title_driving_animation/1/edit' )
         ->type( 'CONÓCELA A FONDO Y NO BUSQUES MÁS.', 'title_driving_animation' )
         ->press( 'Actualizar' )
         ->seePageIs( env( 'APP_URL' ) . 'admin/title_driving_animation/1/edit' )
         ->seeInDatabase( 'Brands', [
            'title_driving_animation' => 'CONÓCELA A FONDO Y NO BUSQUES MÁS.'
          ] );
  }

  /**
   * Test for edit title of footer
   * @return void
   */
  public function testEditTitleFooter()
  {
    $user = factory( Highlander\User::class )->create();

    $this->actingAs( $user )
         ->visit( env( 'APP_URL' ) . 'admin/title_footer/1/edit' )
         ->type( 'HIGHLANDER LA CAMIONETA QUE TÚ Y TU FAMILIA ESTABAN ESPERANDO.', 'title_footer' )
         ->press( 'Actualizar' )
         ->seePageIs( env( 'APP_URL' ) . 'admin/title_footer/1/edit' )
         ->seeInDatabase( 'Brands', [
            'title_footer' => 'HIGHLANDER LA CAMIONETA QUE TÚ Y TU FAMILIA ESTABAN ESPERANDO.'
          ] );
  }

  /**
   * Test for edit description in footer
   * @return void
   */
  public function testEditDescriptionFooter()
  {
    $user = factory( Highlander\User::class )->create();

    $this->actingAs( $user )
         ->visit( env( 'APP_URL' ) . 'admin/description_footer/1/edit' )
         ->type( 'La solución ideal para los que buscan mejor rendimiento de combustible.', 'description_footer' )
         ->press( 'Actualizar' )
         ->seePageIs( env( 'APP_URL' ) . 'admin/description_footer/1/edit' )
         ->seeInDatabase( 'Brands', [
            'description_footer' => 'La solución ideal para los que buscan mejor rendimiento de combustible.'
          ] );
  }
}
