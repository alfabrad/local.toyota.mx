x<?php

use Illuminate\Database\Seeder;

class BrandsTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    /** Toyota Highlander */
    DB::table( 'brands' )->insert( [
      'title'                             => 'Highlander 2016',
      'description'                       => '',
      'name'                              => 'Highlander <span> 2016 </span>',
      'slogan'                            => 'Haremos de tus viajes, <br />los mejores momentos',
      'title_h1'                          => '<h2 class="animated">Desde cualquier ángulo te parecerá espectacular.</h2>',
      'title_gallery_fancybox'            => '<h2 class="animated">CADA PARTE DE ELLA TIENE UN PROPÓSITO.</h2>',
      'description_gallery_fancybox'      => '<p>Cada espacio diseñado en <span> Highlander </span> está pensado con un propósito, ya sea comodidad, seguridad o lujo, pero todo tiene una razón de ser.</p>',
      'title_versions_gallery'            => '<h2 class="animated">CADA UNA TIENE DETALLES QUE TE CONQUISTARÁN.</h2>',
      'title_driving_animation'           => '<h2 class="animated">CONÓCELA A FONDO Y NO BUSQUES MÁS.</h2>',

      'title_footer'                      => '<h1>HIGHLANDER LA CAMIONETA QUE TÚ Y TU FAMILIA ESTABAN ESPERANDO.</h1>',
      'description_footer'                => '<p>La solución ideal para los que buscan mejor rendimiento de combustible.</p>',
      'slug'                              => 'highlander'
    ] );

    /** Toyota Sienna */
    DB::table( 'brands' )->insert( [
      'title'                             => 'Sienna 2017',
      'description'                       => '',
      'name'                              => 'Sienna <span> 2017 </span>',
      'slogan'                            => 'Sienna 2017, elegancia, lujo y <br />espacio para toda la familia.',
      'title_h1'                          => '<h2 class="animated">Imponente para cualquier camino.</h2>',
      'title_gallery_fancybox'            => '<h2 class="animated">En cada detalle refleja su estética y personalidad.</h2>',
      'description_gallery_fancybox'      => '<p><span>Sienna</span> 2017 es una combinación de comodidad, espacio y lujo. Es ideal para salir de paseo con la familia o amigos, es muy segura y con la potencia que necesitas.</p>',
      'title_versions_gallery'            => '<h2 class="animated">Confort, seguridad y todo el estilo que mereces.</h2>',
      'title_driving_animation'           => '<h2 class="animated">Sienna 2017, elegancia, lujo y espacio para toda la familia.</h2>',
      'title_footer'                      => '<h1>Ya sea en la ciudad o carretera,  Sienna es perfecta para ti y tu familia.</h1>',
      'description_footer'                => '<p>Sienna es sinónimo de elegancia, lujo y espacio. Conócela y compruébalo.</p>',
      'slug'                              => 'sienna'
    ] );
  }
}
